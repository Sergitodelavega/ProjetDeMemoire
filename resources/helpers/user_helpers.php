<?php 

use App\Models\User;

if(!function_exists("getUserByEmail")){
    function getUserByEmail($email){
        $user = User::where('email', $email)->first();
        if($user){
            return $user;
        } else{
            return false;
        }
    }
}










?>