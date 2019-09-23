<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;

class Stages extends Model
{
    protected $table = 'stages';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
    protected $fillable = ['id', 'icon', 'description', 'start_date', 'end_date'];
}
