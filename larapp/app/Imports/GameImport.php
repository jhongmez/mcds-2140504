<?php

namespace App\Imports;

use App\Game;
use App\User;

use Maatwebsite\Excel\Concerns\ToModel;

class GameImport implements ToModel
{
    public function model(array $row)
    {
        return new Game([
            'name'  	   => $row[0],
            'description'  => $row[1],
            'slider'       => $row[2],
            'price' 	   => $row[3]
        ]);
    }
}
