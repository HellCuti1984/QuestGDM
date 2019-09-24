<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Models\Client\Stages;
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
        $DB = new DB();
        $ResultsQuest = new ResultsQuest();

        $id_user = Auth::user()->id;
        $date = date('y-m-d');

        $id_stage = Stages::where('start_date', '<', $date)->max('id');

        $points = $ResultsQuest::where('id_user', $id_user)->where('id_stage', $id_stage)->value('user_points');
        $all_points = $ResultsQuest::where('id_user', $id_user)->sum('user_points');

        $stages = Stages::all()->where('id', $id_stage);

        $data = Stages::all()->where('id', $id_stage);
        if(Auth::user()->is_admin==0)
        {
            return view('users.client', compact('id_stage', 'points', 'all_points',  'data'));
        }
        else
        {
            return view('users.admin', compact('stages', 'id_stage'));
        }
    }
}
