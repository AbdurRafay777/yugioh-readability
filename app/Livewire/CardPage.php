<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;
use Livewire\Component;

class CardPage extends Component
{
    public $card;
    public $api = 'https://db.ygoprodeck.com/api/v7/cardinfo.php';

    public function mount($card_id)
    {
        $url      = $this->api . '?id=' . $card_id;
        $response = Http::get($url);
        if ($response->successful()) {

            $data     = $response->json();
            $cardData = $data['data'][0];
            $images   = $cardData['card_images'][0];

            Arr::pull($cardData, 'card_images');
            Arr::pull($cardData, 'card_sets');
            Arr::pull($cardData, 'card_prices');

            $cardData['image_full']    = $images['image_url'];
            $cardData['image_small']   = $images['image_url_small'];
            $cardData['image_cropped'] = $images['image_url_cropped'];

            $this->card = $cardData;
            // dd($this->card);
        } else {
            abort(404);
        }
    }

    public function render()
    {
        return view('livewire.card-page')->layout('components.layouts.app')->title($this->card['name']);
    }
}
