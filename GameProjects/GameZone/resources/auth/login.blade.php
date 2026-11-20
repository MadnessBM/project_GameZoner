<?php

use Illuminate\Support\Facades\Route;
use App\Models\Game;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Auth\LoginController;

// Главная страница
Route::get('/', function () {
    $games = Game::all();

    return view('home', compact('games'));
});

// Страница отдельной игры
Route::get('/games/{slug}', function (string $slug) {
    $game = Game::where('slug', $slug)->firstOrFail();

    return view('game', compact('game'));
})->name('games.show');

// Авторизация
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])
        ->name('login');

    Route::post('/login', [LoginController::class, 'login'])
        ->name('login.post');
});

// Выход
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Админ-панель
Route::prefix('admin')
    ->name('admin.')
    ->middleware('admin')
    ->group(function () {
        Route::resource('games', GameController::class)
            ->except(['show']);
    });
