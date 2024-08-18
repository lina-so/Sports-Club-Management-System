<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilitySport extends Model
{
    use HasFactory;
    protected $fillable = ['sport_id','facility_id'];

}
