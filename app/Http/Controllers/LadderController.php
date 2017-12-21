<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateLadder;
use App\Events\PositionUpdated;
use App\Ladder;
use Validator;
use Session;
use DB;

class LadderController extends Controller
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
        //$cards = Card::inRandomOrder()->take(3)->get();
        //return view('home', compact('cards'));

        $teams = Ladder::orderBy('name', 'asc')->get();

        return view('home', compact('teams'));
    }

    /**
     * Store the location form in the database.
     *
     * @param \App\Http\Requests\UpdateLadder
     * @return \Illuminate\Http\Response
     */
	public function update(UpdateLadder $request)
	{
	    $this->validate($request, [
	        "team.*" => "required|integer|distinct|between:1,10",
	    ]);

	    $teams = $request->input('team');

	    foreach ($teams as $id => $position)
	    {
	    	Ladder::where('id', '=', $id)->update(['position' => $position]);
	    }

	    Session::flash('flash_message', 'Ladder successfully updated.');

	    $ladder = Ladder::get();

	    event(new PositionUpdated($ladder));

	    return redirect()->back();
	}

	/**
     * Return al team positions from the ladder.
     *
     * @return \Illuminate\Http\Response
     */
	public function liveladder ()
	{
    	return Ladder::all(['id', 'name', 'position']);
    }
}
