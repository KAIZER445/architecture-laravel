<?php

use App\Livewire\Home;
use App\Livewire\Test;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('home'));
});

Route::get('test', Test::class)->name('test');
Route::get('home', Home::class)->name('home');