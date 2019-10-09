<?php

namespace App\MOdels;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number', 'bus_to', 'bus_from', 'bus_arr_time', 'bus_dep_time', 'pickup_location'
    ];

    public function user()
    {
        return $this->belongsTo(Employee::class);
    }
}