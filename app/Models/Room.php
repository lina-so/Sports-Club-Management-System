<?php

namespace App\Models;

use App\Models\Sport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','room_capacity','status','sport_id'];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function scopeUnavailable(Builder $query ,$room_ids)
    {
        return $query->whereIn('id',$room_ids)->where('status','disable');
    }

}
