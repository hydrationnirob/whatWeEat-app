<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requests extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'name',
        'bar_code',
        'description',
    ];
}