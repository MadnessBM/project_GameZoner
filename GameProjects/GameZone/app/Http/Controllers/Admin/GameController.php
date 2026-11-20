<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::orderBy('id', 'desc')->get();

        return view('admin.games.index', compact('games'));
    }

    public function create()
    {
        return view('admin.games.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|alpha_dash|unique:games,slug',
            'genre' => 'required|string|max:100',
            'description' => 'required|string|max:1000',
            'details' => 'required|string',
            'emoji' => 'nullable|string|max:20',
            'color' => 'required|in:purple,green,orange,blue,pink,red',
            'year' => 'nullable|integer|min:1950|max:2100',
        ]);

        Game::create($data);

        return redirect()
            ->route('admin.games.index')
            ->with('success', 'Игра успешно добавлена!');
    }

    public function edit(Game $game)
    {
        return view('admin.games.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => [
                'required',
                'string',
                'max:255',
                'alpha_dash',
                Rule::unique('games', 'slug')->ignore($game->id),
            ],
            'genre' => 'required|string|max:100',
            'description' => 'required|string|max:1000',
            'details' => 'required|string',
            'emoji' => 'nullable|string|max:20',
            'color' => 'required|in:purple,green,orange,blue,pink,red',
            'year' => 'nullable|integer|min:1950|max:2100',
        ]);

        $game->update($data);

        return redirect()
            ->route('admin.games.index')
            ->with('success', 'Игра успешно обновлена!');
    }

    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()
            ->route('admin.games.index')
            ->with('success', 'Игра удалена!');
    }
}
