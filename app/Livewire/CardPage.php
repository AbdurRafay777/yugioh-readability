<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CardPage extends Component
{
    public $card;
    public $api = 'https://db.ygoprodeck.com/api/v7/cardinfo.php';
    public $cardEffectFound = false;
    public $isPendulum = false;
    public $leadingText;
    public $improvedMainEffects;
    public $improvedPendulumEffects;

    public function mount($card_id)
    {
        $url      = $this->api . '?id=' . $card_id;
        $response = Http::get($url);

        if ($response->successful()) {
            $data = collect($response->json()['data'][0]);

            $images = $data->pull('card_images')[0];

            $cardData = $data->except(['card_sets', 'card_prices'])->toArray();

            $cardData['image_full']    = $images['image_url'];
            $cardData['image_small']   = $images['image_url_small'];
            $cardData['image_cropped'] = $images['image_url_cropped'];

            $this->card = $cardData;

            $effects = collect($this->getEffects($this->card['name']));

            $this->combineImprovedEffects($effects);

        } else {
            abort(404);
        }
    }

    public function getEffects($card_name)
    {
        try {
            $json    = Storage::get('effects.json');
            $effects = collect(json_decode($json, true));

            return $effects->firstWhere('name', $card_name);
        }
        catch (\Exception $e) {
            Log::error("Failed to get effects for card: $card_name", ['exception' => $e]);
            return collect();
        }
    }

    public function combineImprovedEffects($effects)
    {
        if ($effects->isNotEmpty()) {

            $this->cardEffectFound = true;
            $this->leadingText     = $effects['leadingText'];

            $mainEffects     = collect($effects->get('effects', []))->pluck('mainEffect');
            $pendulumEffects = collect($effects->get('pendulumEffects', []))->pluck('mainEffect');
            $trailingText    = implode(collect($effects->get('effects', []))->pluck('trailingText')->all());

            $this->isPendulum = $trailingText !== "" ? true : false;

            $this->improvedMainEffects     = $mainEffects->implode('');
            $this->improvedPendulumEffects = $pendulumEffects->implode('');

            if (! $this->isPendulum) {
                $this->improvedMainEffects = implode(array_merge($mainEffects->all(), $pendulumEffects->all()));
            }
        }
    }
    public function render()
    {
        return view('livewire.card-page')->layout('components.layouts.app')->title($this->card['name']);
    }
}
