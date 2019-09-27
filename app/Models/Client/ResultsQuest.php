<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;

class ResultsQuest extends Model
{
    protected $table = 'results_quests';

    protected $guarded = ['id'];
    protected $fillable = ['id_stage', 'id_user','user_answer', 'user_points'];
}
