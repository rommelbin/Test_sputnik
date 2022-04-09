<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LuckyTicket extends Model
{
    protected $table = "lucky_tickets";
    protected $fillable = [
        'ticket'
    ];
}
