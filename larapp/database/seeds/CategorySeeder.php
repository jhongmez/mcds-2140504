<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $cat = new Category;
        $cat->name = 'Xbox Serie X';
        $cat->description = 'Nueva consola de microsoft';
        $cat->created_at = now();
        $cat->save();

        $cat = new Category;
        $cat->name = 'Nintendo Switch';
        $cat->description = 'Consola de Nintendo';
        $cat->created_at = now();
        $cat->save();

    }
}
