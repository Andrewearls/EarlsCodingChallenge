<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\ContactSaved;

class Contact extends Model
{
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'saved' => ContactSaved::class,
    ];

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
