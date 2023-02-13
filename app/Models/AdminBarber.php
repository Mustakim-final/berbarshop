<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminBarber extends Model
{
    protected $fillable = [
        'name',
        'b_id',
        'time',
        'end_time',
        'date',
        'duration',

    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id','b_id');
    }
}
