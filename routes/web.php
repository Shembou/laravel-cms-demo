<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Home',[
    'currentRoute' => '/'
])->name('home');

Route::post('/contact', [HomeController::class, 'post']);

Route::get('/{slug}', [PageController::class, 'show']);