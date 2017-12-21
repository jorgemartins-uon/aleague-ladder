<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;

class HomeController extends Controller
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
     * Show the application ladder.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Ladder::orderBy('name', 'asc')->get();

        return view('home', compact('teams'));
    }
}
