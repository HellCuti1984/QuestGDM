<?php

namespace App\Http\Controllers\View;

use App\Models\Client\AllResultsModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Controller;
use App\Models\Client\ResultsQuest;

class ViewController extends Controller
{
    public function index()
    {
        $data = AllResultsModel::all()->where('')->take(5);
        return view('index', compact('data'));
    }
}
