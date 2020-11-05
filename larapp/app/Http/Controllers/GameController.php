<?php

namespace App\Http\Controllers;

use App\Game;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\GameRequest;


class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();
        return view('games.index')->with('games', $games);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Vista para crear un juego y solo sean los admin
        $users  = User::where('role', 'Admin')->get();
        $cats   = Category::all();
        
        return view('games.create')->with('users', $users)->with('cats', $cats);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameRequest $request)
    {
        //dd($request->all());
        $game               = new Game;
        $game->name         = $request->name;
        $game->description  = $request->description;
        $game->user_id      = $request->user_id;
        $game->category_id  = $request->category_id;
        $game->slider       = $request->slider;
        $game->price        = $request->price;

        // SI hay alguna imagen el nombre image cambia dependiendo el nombre en la tabla
        if ($request->hasFile('image')) {
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('imgs'), $file);
            $game->image = 'imgs/'.$file;
        }

        // Guardar usuario y mostrar mensaje
        if($game->save()) {
            return redirect('games')->with('message', 'El juego: '.$game->name.' fue adicionado con exito!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
        $users   = User::all();
        $cats   = Category::all();
        return view('games.show')->with('game', $game)->with('users', $users)->with('cats', $cats);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
        $users  = User::where('role', 'Admin')->get();
        $cats   = Category::all();
        return view('games.edit')->with('game', $game)->with('users', $users)->with('cats', $cats);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
