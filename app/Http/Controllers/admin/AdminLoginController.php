<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\News;
class AdminLoginController extends Controller
{
    protected $redirectTo = '/admin';

    public function index(){
        if(auth('admin') -> check()){
            return redirect()->route('admin.cus.index');
        }
        return view('back-end.contents.admin.login');
    }
    public function store(Request $request){
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        $input = $request->all();
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (auth('admin')->attempt(array($fieldType => $input['username'], 'password' => $input['password']))) {
            $request->session()->regenerate();
            return redirect()->route('admin.cus.index'); 
        }
        return back()->withErrors([
            'username' => 'Sai tên đăng nhập hoặc mật khẩu',
        ]);
    }
}
