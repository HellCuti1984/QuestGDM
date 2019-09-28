<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;

class AllResultsModel extends Model
{
    protected $table = 'all_results_models';

    protected $fillable = ['id_user', 'stage_1', 'stage_2', 'stage_3', 'stage_4', 'stage_5', 'stage_6', 'stage_7',];
}
