<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;
use App\Models\Client\ResultsQuest;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $id = Auth::user()->id;
        $points = ResultsQuest::where('id_user', '=', $id)->value('user_points');

        if(Auth::user()->is_admin==0)
        {
            return view('users.client', compact('points'));
        }
        else
        {
            return view('users.admin');
        }
    }

    public function results_of_quest()
    {
        $user_id = Auth::user()->id;
        $points = ResultsQuest::select('user_answer')->where('id_user', '=', $user_id)->get();

        /*$flights = App\Flight::where('active', 1)
                   ->orderBy('name', 'desc')
                   ->take(10)
                   ->get();*/
       return $points;
    }
}
