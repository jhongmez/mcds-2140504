<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'image', 
        'description',
        'user_id',
        'category_id',
        'slider',
        'price'
    ];

    // !Relacion de un usuario puede tener muchos juegos
    public function user() {
        
        return $this->belongsTo('App\User');

    }

    // !Relacion de una categoria puede tener muchos juego
    public function category() {
        
        return $this->belongsTo('App\Category');

    }

}
