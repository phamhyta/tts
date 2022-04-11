<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Events\AdminRegister;
class AdminRegisterController extends Controller
{
    public function rindex(){
        return view('back-end.contents.admin.register');
    }

    public function rstore(Request $request){
        $request->validate([
            'full_name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|string|email|unique:cus|max:255',
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

        $data_client = [
            'id' => $admin->id,
            'username' => $request->username,
        ];

        event(new AdminRegister($data_client));

        auth('admin')->attempt($request->only('username', 'password'));

        return redirect()->route('admin.cus.index');
    }
}
