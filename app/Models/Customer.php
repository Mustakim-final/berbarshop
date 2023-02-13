<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_id',
        'b_id',
        'schedul_id',
        's_time',
        'e_time',
        'date',
    ];
}
