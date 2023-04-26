<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        '',
        ''
    ];

    public function personas(){
        return $this->belongsTo(Personas::class);
    }
}
