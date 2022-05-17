<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
class UserLoginController extends Controller
{
    public function index(){
        if(auth('customer') -> check()){
            return redirect()->route('home');
        }
        return view('front-end.contents.customer.login');
    }
    public function store(Request $request){
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        $input = $request->all();
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        //dd($input);

        if (auth('customer')->attempt(array($fieldType => $input['username'], 'password' => $input['password']))) {
            $request->session()->regenerate();
            //dd($request);
            return redirect()->route('home'); 
        }
        return back()->withErrors([
            'username' => 'Sai tên đăng nhập hoặc mật khẩu',
        ]);
    }
    // public function store(Request $request){
    //     $input = $request->all();
    //     $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    //     //dd($fieldType);
    //     //$result = DDB::table('cus') -> where($fieldType, $input['username']) -> where('password', $input['password']) -> first();
    //     $test = "SELECT * FROM cus WHERE username = $input['username'] AND password = $input['password']";

    //     $result = $request->query('key', 'default')
    //     dd($result);
    //     if($result){
    //         auth('customer')->attempt(array($fieldType => $input['username'], 'password' => $input['password']));
    //         $request->session()->regenerate();
    //         dd(auth('customer') -> id());
    //         Session::put('full_name', $result -> username);
    //         Session::put('id_cus', $result -> id_cus);
    //         return redirect::to('/');
    //     }
    //     return back()->withErrors([
    //         'username' => 'Sai tên đăng nhập hoặc mật khẩu',
    //     ]);
    // }
}
