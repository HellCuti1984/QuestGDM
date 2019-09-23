<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;

class ResultsQuest extends Model
{
    protected $table = 'results_quests';

    protected $guarded = ['id'];
    protected $fillable = ['user_answer', 'user_points'];
}
