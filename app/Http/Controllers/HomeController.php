<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Client\ResultsQuest;
use App\Models\Client\Stages;
use Illuminate\Http\Request;

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
        $id_user = Auth::user()->id;
        $date = date('y-m-d');

        $id_stage = Stages::where('start_date', '<', $date)->where('end_date', '>', $date)->value('id');

        $points = ResultsQuest::where('id_user', $id_user)->where('id_stage', $id_stage)->value('user_points');
        $all_points = ResultsQuest::where('id_user', $id_user)->sum('user_points');
        $user_answer = ResultsQuest::where('id_user', Auth::user()->id)->where('id_stage', $id_stage)->value('user_answer');


        $stages = Stages::all();

        $data = Stages::all()->where('id', $id_stage);
        if(Auth::user()->is_admin==0)
        {
            return view('users.client', compact('id_stage', 'points', 'all_points',  'data', 'user_answer'));
        }
        else
        {
            return view('users.admin', compact('stages', 'id_stage'));
        }
    }
}
