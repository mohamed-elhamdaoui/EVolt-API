<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    /**
     * Get all reservations linked to this station.
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * Get all charging sessions that occurred at this station.
     */
    public function sessions()
    {
        return $this->hasMany(ChargingSession::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
