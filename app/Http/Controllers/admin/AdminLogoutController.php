<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
session_start();
use Illuminate\Support\Facades\Session;

class AdminLogoutController extends Controller
{
     public function logout(){
        if(auth('admin')->check()){
            auth('admin')->logout();
            return redirect()->route('admin.login.index');
        }
        else
        {
            return redirect()->route('admin.login.index');
        }
        
     }
}