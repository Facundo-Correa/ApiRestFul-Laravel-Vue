<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FirebaseUserToken extends Model
{
    //
    protected $table = 'firebase_user_token';
    protected $fillable = ['token','user_id'];

    public function scopeToken($query,$token){
        return $query->where('token',$token);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function getToken()
    {
        return $this->token;
    }

}
