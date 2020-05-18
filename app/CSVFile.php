<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\CsvFileRecieved;

class CsvFile extends Model
{
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'saved' => CsvFileRecieved::class,
    ];

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
