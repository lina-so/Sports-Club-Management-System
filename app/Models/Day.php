<?php

namespace App\Models;

use App\Models\Sport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Day extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function sports()
    {
        return $this->belongsToMany(Sport::class,'day_sport');
    }
}
