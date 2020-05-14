<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'email', 'phone',
    ];

    /**
     * The roles that belong to the user.
     */
    public function contacts()
    {
        return $this->belongsToMany('App\Contact');
    }
}
