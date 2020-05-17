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
        'name', 'data',
    ];

    public function length()
    {
    	return count(file($this->data));
    }
}
