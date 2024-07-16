<?php

use App\Livewire\CardPage;
use App\Livewire\CardSearch;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('card-search');
});

Route::get('/card_search', CardSearch::class)->name('card-search');

Route::get('/card/{card_id}', CardPage::class)->name('card-page');
