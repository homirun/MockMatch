<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Lunch extends Model
{
    use Notifiable;

    protected $fillable = [
        'reserve_date', 'user_id', 'lunch_group_id', 'start_time', 'end_time'
    ];
}
