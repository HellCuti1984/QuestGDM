<?php

namespace App\Http\Controllers\View;

use App\Models\Client\AllResultsModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Controller;
use App\Models\Client\Stages;
use App\Models\Client\ResultsQuest;

class ViewController extends Controller
{
    public function index()
    {
        $id_stage = Stages::where('start_date', '<', date('y-m-d'))->where('end_date', '>', date('y-m-d'))->value('id');

        $stages = DB::table('stages')->where('id', $id_stage)->value('preview_description');
        $icon = DB::table('stages')->where('id', $id_stage)->value('icon');
        $data = DB::select('select * from all_results_models, users where all_results_models.id_user = users.id order by results DESC LIMIT 5 ');
        return view('index', compact('data', 'stages', 'icon'));
    }
}
