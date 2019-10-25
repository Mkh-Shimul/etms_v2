<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'phone',
        'password',
        'staff_type',
        'photo'
    ];

    public function buses()
    {
        return $this->hasMany(Worker::class);
    }
}