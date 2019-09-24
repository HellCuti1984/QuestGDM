<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;

class Stages extends Model
{
    protected $table = 'stages';

    protected $primaryKey = 'id';

    protected $fillable = ['icon', 'title', 'preview_description', 'full_description', 'quest_file', 'start_date', 'end_date'];
}
