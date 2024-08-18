<?php

namespace App\Models;

use App\Models\Sport;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = ['discount','start_date','end_date','usage_limit','sport_id'];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    public function sports()
    {
        return $this->hasMany(Sport::class);
    }


}
