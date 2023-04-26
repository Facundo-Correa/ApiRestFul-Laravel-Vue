<?php
namespace App\Traits;

trait HasVerification {

    public function verifyLink(){
        return url('verify/'.$this->verify_token);
    }
    public function verify(){
        $this->active = true;
        $this->verify_token = null;
        $this->save();
    }
    public static function generateVerifyToken(){
        $token = md5(rand(0,9999999));

        if (self::where('verify_token',$token)->first())
            $token = self::generateVerifyToken();

        return $token;
    }
}
