<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Livewire\Component;

class CardSearch extends Component
{
    public $search;

    public $api = 'https://db.ygoprodeck.com/api/v7/cardinfo.php';

    public $results = [];

    public function searchCards()
    {
        if (Str::of($this->search)->trim()->isNotEmpty()) {
            $url      = $this->api . '?fname=' . $this->search;
            $response = Http::get($url);
            if ($response->successful()) {
                $data          = $response->json();
                $this->results = $data['data'];
            }
        }
    }

    #[Title('Search Cards')]
    public function render()
    {
        return view('livewire.card-search')->layout('components.layouts.app');
    }
}
