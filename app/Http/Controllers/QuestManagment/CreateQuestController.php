<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class CreateQuestController extends Controller
{
    public function CreateQuest()
    {
        if(Auth::user()->is_admin == 1) {
            return view('quest_managment.quest_managment');
        }
        else
        {
            return redirect('home');
        }
    }
}
