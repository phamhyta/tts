<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserLoginController extends Controller
{
    public function index(){
        // if(auth('customer') -> check()){
        //     return redirect()->back();
        // }
        return view('front-end.contents.customer.login');
    }
    public function store(Request $request){
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        $input = $request->all();
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (auth('customer')->attempt(array($fieldType => $input['username'], 'password' => $input['password']))) {
            $request->session()->regenerate();
            return redirect()->route('home'); 
        }
        return back()->withErrors([
            'username' => 'Sai tên đăng nhập hoặc mật khẩu',
        ]);
    }
}
