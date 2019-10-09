<?php

namespace App\Models;

use App\MOdels\Bus;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'employee_type', 'photo', 'phone_number'
    ];

    public function buses()
    {
        return $this->hasMany(Bus::class);
    }
}
