<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;
use App\Models\Game;
use App\Http\Controllers\Admin\GameController;

Route::get('/admin/login', [LoginController::class, 'show'])
    ->name('admin.login');

Route::post('/admin/login', [LoginController::class, 'login'])
    ->name('admin.login.submit');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/', function () {
    $games = Game::all();

    return view('home', compact('games'));
});

Route::get('/games/{slug}', function (string $slug) {
    $game = Game::where('slug', $slug)->firstOrFail();

    return view('game', compact('game'));
})->name('games.show');

// Админ-панель
Route::prefix('admin')
    ->name('admin.')
    ->middleware(\App\Http\Middleware\AdminMiddleware::class)
    ->group(function () {
        Route::resource('games', GameController::class)
            ->except(['show']);
    });
