<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaySport extends Model
{
    use HasFactory;
    protected $fillable = ['sport_id','day_id'];

}
