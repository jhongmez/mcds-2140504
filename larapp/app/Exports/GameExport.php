<?php

namespace App\Exports;

use App\Game;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class GameExport implements FromView
{
    public function view(): View
    {
        return view('games.excel', [
            'games' => Game::all()
        ]);
    }
}
