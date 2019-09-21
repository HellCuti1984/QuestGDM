<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;
use App\Models\Client\ResultsQuest;
use App\Models\Client\Stages;
use Carbon\Carbon;

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
        $Carbon = new Carbon();
        $Stages = new Stages();
        $ResultsQuest = new ResultsQuest();

        $id_user = Auth::user()->id;
        $date = date('y-m-d');

        $id_stage = $DB::table('stages')->where('start_date', '<', $date)->max('id');
        $all_points = $ResultsQuest::where('id_user', '=', $id_user)->sum('user_points');

        $data = $DB::select('select * from users, results_quests, stages where results_quests.id_user = users.id AND results_quests.id_stage = stages.id AND users.id = ? AND stages.id = ?', array($id_user, $id_stage));
        if(Auth::user()->is_admin==0)
        {
            return view('users.client', compact('all_points', 'id_stage', 'data'));
        }
        else
        {
            return view('users.admin');
        }
    }
}
