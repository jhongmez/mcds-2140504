<?php

use Illuminate\Database\Seeder;
use App\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $game = new Game;
        $game->name         = 'Halo Infinite';
        $game->description  = 'Juego de FPS para nueva generación';
        $game->user_id      = 1;
        $game->category_id  = 1;
        $game->price        = 60;
        $game->created_at   = now();
        $game->save();

        $game = new Game;
        $game->name         = 'Animal Crossing';
        $game->description  = 'Juego de Nintendo Switch';
        $game->user_id      = 1;
        $game->category_id  = 2;
        $game->price        = 50;
        $game->save();

    }
}
