<?php

use Illuminate\Support\Facades\Route;
use \Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('Helloworld', function() {
    return "hola";
});

Route::get('users', function() {
    dd(App\User::all());
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('challenge', function () {
    foreach (App\User::all()->take(10) as $user) {
        $years = Carbon::createFromDate($user->birthdate)->diff()->format('%y years old');
        $since = Carbon::parse($user->created_at);
        $rs[] = $user->fullname." - ".$years." - created ".$since->diffForHumans();
    }
    return view('challenge', ['rs' => $rs]);
});

Route::get('examples', function() {
    return view('examples');
});