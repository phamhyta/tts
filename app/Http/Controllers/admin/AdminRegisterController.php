<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Events\AdminRegister;
class AdminRegisterController extends Controller
{
    public function index(){
        return view('back-end.contents.admin.register');
    }

    public function store(Request $request){
        $request->validate([
            'full_name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|string|email|unique:admin|max:255',
            'password' => 'required|confirmed|min:6',
        ]);
        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ];
        //dd($data);
        $admin = new Admin($data);
        $admin->save();
        auth('admin')->attempt($request->only('username', 'password'));
        return redirect()->route('admin.cus.index');
    }
}
