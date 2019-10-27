<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Worker extends Authenticatable
{
    use Notifiable;

    protected $guard = 'worker';
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
