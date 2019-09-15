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

    /** ОБЯЗАТЕЛЬНО УДАЛИ ЭТОТ МЕТОД И РОУТ ИЗ ФАЙЛА РОУТИНГА! ЭТО НЕБЕЗОПАСНО! И ТОЛЬКО ДЛЯ РАЗРАБОТКИ! */
    public function dropTable()
    {
        Schema::dropIfExists('users');
        return redirect('/');
    }
}
