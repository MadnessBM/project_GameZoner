<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        $games = [
            [
                'slug' => 'cyberpunk-2077',
                'title' => 'Cyberpunk 2077',
                'genre' => 'RPG',
                'description' => 'Футуристический мир Найт-Сити.',
                'details' => 'Ролевая игра с открытым миром и большим количеством заданий.',
                'emoji' => '🌆',
                'color' => 'purple',
                'year' => 2020,
            ],
            [
                'slug' => 'minecraft',
                'title' => 'Minecraft',
                'genre' => 'Песочница',
                'description' => 'Создавай собственный мир.',
                'details' => 'Исследуй мир, собирай ресурсы и строй сооружения.',
                'emoji' => '⛏️',
                'color' => 'green',
                'year' => 2011,
            ],
            [
                'slug' => 'counter-strike-2',
                'title' => 'Counter-Strike 2',
                'genre' => 'Шутер',
                'description' => 'Командные матчи и соревнования.',
                'details' => 'Командная соревновательная игра.',
                'emoji' => '🎯',
                'color' => 'orange',
                'year' => 2023,
            ],
            [
                'slug' => 'the-witcher-3',
                'title' => 'The Witcher 3',
                'genre' => 'RPG',
                'description' => 'Приключение в фэнтезийном мире.',
                'details' => 'История ведьмака Геральта в большом открытом мире.',
                'emoji' => '🐺',
                'color' => 'blue',
                'year' => 2015,
            ],
            [
                'slug' => 'forza-horizon-5',
                'title' => 'Forza Horizon 5',
                'genre' => 'Гонки',
                'description' => 'Открытый мир и автомобильные гонки.',
                'details' => 'Гоночная игра с большим выбором автомобилей.',
                'emoji' => '🏎️',
                'color' => 'pink',
                'year' => 2021,
            ],
            [
                'slug' => 'gta-v',
                'title' => 'GTA V',
                'genre' => 'Экшен',
                'description' => 'Исследуй город Los Santos.',
                'details' => 'Приключенческая игра с открытым миром.',
                'emoji' => '🚘',
                'color' => 'red',
                'year' => 2013,
            ],
        ];

        foreach ($games as $game) {
            Game::updateOrCreate(
                ['slug' => $game['slug']],
                $game
            );
        }
    }
}
