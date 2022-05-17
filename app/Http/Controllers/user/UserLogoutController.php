<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;


class UserLogoutController extends Controller
{
    public function logout(){
        if(auth('customer')->check()){
            auth('customer')->logout();
            return redirect()->route('client.login.index');
        }
        else{
            return redirect()->route('client.login.index');
        }
        
     }
}