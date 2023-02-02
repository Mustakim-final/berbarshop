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
        'date',

    ];
