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
     * The users that can access the contact.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
