<?php

namespace App\Http\Controllers\View;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Controller;

class ViewController extends Controller
{
    public function index()
    {
        return view('index');
    }
}
