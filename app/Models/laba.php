<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laba extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'user_id', 'name', 'description', 'json'];
}
