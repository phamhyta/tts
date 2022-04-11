<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use App\Events\ClientRegister;
class UserRegisterController extends Controller
{
    public function rindex(){
        return view('front-end.contents.customer.register');
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
        $customer = new Customer($data);

        $customer->save();

        $data_client = [
            'id' => $customer->id,
            'username' => $request->username,
        ];

        event(new ClientRegister($data_client));

        auth('customer')->attempt($request->only('username', 'password'));
        return redirect()->route('home');
    }

}
