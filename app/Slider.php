<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $fillable = [
        'title',
        'image',
        'sub_title',
        'description',
        'button_text',
        'button_link',
        'priority'
    ];
}
