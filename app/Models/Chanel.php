<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chanel extends Model
{
    use HasFactory;
    protected $fillable = [
        'user1_id',
        'user2_id',
        'name',
    ];
}
