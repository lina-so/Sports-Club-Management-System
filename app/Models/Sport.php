<?php

namespace App\Models;

use App\Models\Day;
use App\Models\Room;
use App\Models\User;
use App\Models\Offer;
use App\Models\Payment;
use App\Models\Facility;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sport extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','status','Duration','price','club_id'];


    protected static function boot()
    {
        parent::boot();
        // Attach the shared facilities to the sport

        static::created(function ($sport) {
            $sharedFacilities = Facility::whereIn('name', ['LockerRoom', 'Restroom'])->pluck('id')->toArray();
            $sport->facilities()->attach($sharedFacilities);

        });

        static::updating(function ($sport) {
            $sharedFacilities = Facility::whereIn('name', ['LockerRoom', 'Restroom'])
                ->pluck('id')
                ->toArray();

            $sport->facilities()->sync($sharedFacilities);
        });
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function days()
    {
        return $this->belongsToMany(Day::class,'day_sport');
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}
