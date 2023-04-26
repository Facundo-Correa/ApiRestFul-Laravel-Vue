<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable = [
        'active',
        'image_mobile',
        'image_desktop',
        'cdn',
        'position'
    ];

    public function getImageMobileAttribute($value)
    {
        return ( substr($value,0,4) == 'http' || substr($value,0,1) == '/' ) ? $value : url('storage').'/'.$value;
    }

    public function getImageDesktopAttribute($value)
    {
        return ( substr($value,0,4) == 'http' || substr($value,0,1) == '/' ) ? $value : url('storage').'/'.$value;
    }

}
