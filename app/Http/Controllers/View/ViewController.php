<?php

namespace App\Http\Controllers\View;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Controller;
use App\Models\Client\ResultsQuest;

class ViewController extends Controller
{
    public function index()
    {
        //stage_days = DB::Select('select DATEDIFF(start_date, end_date) FROM stages');
        return view('index');
    }
}
