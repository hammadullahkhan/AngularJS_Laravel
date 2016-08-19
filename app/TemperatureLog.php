<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemperatureLog extends Model
{

    protected $table = 'temperaturelog';
    protected $fillable = ['fahrenheit', 'celsius'];
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;


}
