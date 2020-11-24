<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 
        'email', 
        'phone', 
        'birthdate',
        'gender',
        'address',
        'photo',
        'password',
        'role',
        'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array 
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function games() {
        
        return $this->hasMany('App\Game');

    }

    public function scopeNames($users, $q) {
        
        if (trim($q)) {
            $users->where('fullname','LIKE',"%$q%")
                  ->orWhere('email','LIKE',"%$q%");
        }

    }


    // Usando tinker
    // Entrar a tinker -> php artisan tinker

    // Crear un usuario con tinker
    /*

        $user = new User;
        $user->fullname = 'Pedro';
        $user->save();
     
    */

    //Buscar con tinker
    /*
        $user->all() Buscar todo
        $user = User::find(12) Buscar un usuario
        $user = User::all()->max('birthdate')
        $user = User::where('active', 1)->get(); Mostrar usuarios que tengan active 1
        $user = User::where('active', 1)->find(12); Mostrar al usuario 12 que tenga active 1;
        $user = User::where('role', 'Customer')->orderBy('birthdate','desc')->get();
    */

    //Modificar
    // !Primero se debe encontrar y luego modificar
    /*
        $user = User::find(12);
        $user->fullname = 'Pepe'
        $user->address = 'Chao'
        $user->save();
    
    */

    //Eliminar
    // !Primero se debe encontrar y luego eliminar
    /*
        $user = User::find(12);
        $user->delete();
    
    */

}
