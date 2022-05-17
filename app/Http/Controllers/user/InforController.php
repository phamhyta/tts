<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\News;
use Illuminate\Http\Request;

class InforController extends Controller
{
    public function index(){
        if(auth('customer')->check()){
            $full_name = Customer::where('id', '=', auth('customer')-> id()) -> get();
            //dd($full_name[0]);
            return view('front-end.contents.customer.info', ['full_name' => $full_name]);
        }
        else{
            return redirect()->route('client.login.index');
        }
    }
    public function change(){
        if(auth('customer')->check()){
            $full_name = Customer::where('id', '=', auth('customer')-> id()) -> get();
            //dd($user);
            return view('front-end.contents.customer.change_info', ['full_name' => $full_name]);
        }
        else{
            return redirect()->route('client.login.index');
        }
    }
    public function update(Request $request){
        $request->validate([
            'full_name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|string|email|unique:cus|max:255',
        ]);
        $id_cus = auth('customer')->id();
        $data = [
            'full_name' => $request->full_name,
            'username' => $request->username,
            'email' => $request -> email,
        ];
        //dd($id_cus);
        Customer::where('id', '=', $id_cus) -> update($data);
        session()->flash('success', 'Bạn đã sửa thành công.');
        return redirect()->route('client.info.index');
    }
    
}
