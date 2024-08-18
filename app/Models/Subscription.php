<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Offer;
use App\Models\Sport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'sport_id',
        'offer_id',
        'plan',
        'price',
        'discount',
        'start_date',
        'end_date',
        'status',
        'suspension_reason',
        'rejection_reason',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($subscription) {
            // $subscription->user_id = Auth::guard('sanctum')->id();

            if ($subscription->sport_id) {
                $sport = $subscription->sport;
                if ($sport) {
                    $subscription->price = $sport->price;
                }
            }

            if ($subscription->offer_id) {
                $offer = $subscription->offer;
                if ($offer) {
                    $subscription->discount = ($offer->discount / 100) * $sport->price;
                }
            }

            if ($subscription->start_date) {
                $startDate = Carbon::parse($subscription->start_date);
                if ($subscription->plan == 'monthly') {
                    $subscription->end_date = $startDate->copy()->addMonths(1);
                } elseif ($subscription->plan == 'annual') {
                    $subscription->end_date = $startDate->copy()->addYears(1);
                } else {
                    $subscription->end_date = $startDate->copy()->addMonths(6);
                }
            }

        });

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }


}
