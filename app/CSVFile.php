<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CsvFile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'data', 'user_id',
    ];

    public function length()
    {
    	return count(file($this->data));
    }

    /**
     * The users that own the csv file.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
