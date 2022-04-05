<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class ForgetPassController extends Controller
{
    public function forgetPass(){
        return view('front-end.contents.customer.forget-pass');
    }
    public function forgetPassStore(Request $request){
        //$id = Auth::user()->id;
        //dd($request);
        $request->validate([
            'email' => 'required|exists:cus'
        ],[
            'email.required' => 'Vui lòng nhập email hợp lệ',
            'email.exists' => 'Email này không tồn tại trong hệ thống'
        ]);
        $token = strtoupper(Str::random(10));
        $data = [
            'token' => $request->token
        ];
        
        $data['token'] = $token;
        //dd($data, $token);
        Customer::where('email','=', $request->email)->update($data);
        
        $cus = Customer::where('email','=', $request->email) ->first();
        //dd($token, $cus);
        try {
            Mail::send('front-end.email.email-check-forgetpass', compact('cus'), function($email) use($cus) {
                $email -> subject('TranXuanHuong.Com - Lấy lại mật khẩu tài khoản');
                $email -> to($cus-> email, $cus -> full_name);
            });
        } catch (\Throwable $th) {
            return redirect() -> back() -> with('no', 'abc');
        }
        return redirect() -> back() -> with('yes', 'Vui lòng check mail để thực hiện thay đổi mật khẩu');
    }
    public function getPass(int $id, $token){
        $cus = Customer::where('id', $id) -> first();
        if($cus->token == $token){
            return view('front-end.contents.customer.getPass');
        }
        return abort(404);
    }
    public function getPassStore(int $id, $token, Request $request){
        $request -> validate([
            'password' => 'required|min:6',
            'confirmpass' => 'required|same:password',
        ]);
        $data = [
            'password' => $request -> password,
            'token' => $token
        ];
        $data['password'] = Hash::make($request -> password);
        //$data['password'] = $request -> password;
        $data['token'] = null;
        //dd($data);
        Customer::where('id', $id)->update($data);
        return redirect() -> route('client.info.index') -> with('yes', 'Đổi mật khẩu thành công');
    }
}
