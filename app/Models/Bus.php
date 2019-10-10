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
        'number', 'bus_to', 'bus_from', 'bus_start_time', 'bus_reach_time', 'pickup_location', 'emp_id'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
