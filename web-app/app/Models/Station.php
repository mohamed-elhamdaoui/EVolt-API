<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Station extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'name',
        'latitude',
        'longitude',
        'address',
        'connector_type',
        'power_kw',
        'status',
        'user_id',
    ];



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
