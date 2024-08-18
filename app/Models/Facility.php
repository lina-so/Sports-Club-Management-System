<?php

namespace App\Models;

use App\Models\Sport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facility extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','status'];


    public function sports()
    {
        return $this->belongsToMany(Sport::class,'facility_sport');
    }
}
