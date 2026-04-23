<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CellSchedule extends Model
    {
        protected $fillable = ['cell_group_name', 'meeting_date', 'meeting_time', 'location', 'wa_link', 'leader_phone'];
    }
