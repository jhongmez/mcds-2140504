<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;

use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{

    public function model(array $row)
    {
        return new User([
            'fullname'  => $row[0],
            'email'     => $row[1],
            'phone'     => $row[2],
            'birthdate' => $row[3],
            'gender'    => $row[4],
            'address'   => $row[5],
            'password'  => Hash::make($row[6])
        ]);
    }
}
