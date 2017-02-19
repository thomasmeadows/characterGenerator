<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Character;
use GuzzleHttp\Client;

class RandomCharacterController extends Controller
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
      $timeStamp = strval(time());
      $hash = md5($timeStamp . env("MARVEL_PRIVATE_KEY", NULL) . env("MARVEL_PUBLIC_KEY", NULL));
      $randomOffset = rand(0, 1490);

      $client = new Client();
      $res = $client->request('GET', 'https://gateway.marvel.com:443/v1/public/characters?limit=1&offset=' . $randomOffset . '&apikey=f09876ff6fa410ad9840d2e512767d23&ts=' . $timeStamp . '&hash=' . $hash);
      return $res;
    }
}
