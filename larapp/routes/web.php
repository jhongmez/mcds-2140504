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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@welcome');

Auth::routes();

// Grupo middleware para Admin
Route::group(['middleware' => 'admin'], function() {
     Route::resources([
        'users'         => 'UserController',
        'categories'    => 'CategoryController',
        'games'         => 'GameController',
    ]); 
});

// Route::get('/home', 'HomeController@index')->name('home');


Route::get('challenge', function () {
    foreach (App\User::all()->take(10) as $user) {
        $years = Carbon::createFromDate($user->birthdate)->diff()->format('%y years old');
        $since = Carbon::parse($user->created_at);
        $rs[] = $user->fullname." - ".$years." - created ".$since->diffForHumans();
    }
    return view('challenge', ['rs' => $rs]);
});


// Exports PDF
Route::get('generate/pdf/users', 'UserController@pdf');
Route::get('generate/pdf/games', 'GameController@pdf');

// Exports EXCEL
Route::get('generate/excel/users', 'UserController@excel');
Route::get('generate/excel/games', 'GameController@excel');

// Import EXCEL
Route::post('import/excel/users', 'UserController@importExcel');
Route::post('import/excel/games', 'GameController@importExcel');

// Search scope
Route::post('users/search', 'UserController@search');
Route::post('games/search', 'GameController@search');

// Middleware
Route::get('locale/{locale}', 'LocaleController@index');