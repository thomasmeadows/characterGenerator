<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Character;

class CreateCharacterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('create-character');
    }

    public function save(Request $request)
    {
        $character = new Character;
        $character->name = $request->input('name');
        $character->user_id = Auth::id();
        $character->race = $request->input('race');
        $character->gender = $request->input('gender');
        $character->class = $request->input('class');
        $character->str = $request->input('_str');
        $character->dex = $request->input('_dex');
        $character->con = $request->input('_con');
        $character->int = $request->input('_int');
        $character->wis = $request->input('_wis');
        $character->cha = $request->input('_cha');
        $character->image = $request->input('_image');
        $character->save();

        $characters = Character::where('user_id', '=', Auth::id())->get();
        return view('home', ['characters' => $characters]);
    }
}
