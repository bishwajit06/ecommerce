<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $fillable = [
        'name',
        'image',
        'priority',
        'short_name',
        'no',
        'type',
    ];


    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
