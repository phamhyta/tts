<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\News;

class AdminEditController extends Controller
{
    public function index_cus($id)
    {
        $customer = Customer::where('id', '=', $id)->get();
        //dd($customer);
        if(auth('admin')->check()){
            $full_name = Admin::where('id', '=', auth('admin')-> id()) -> get();
            //dd($full_name);
            return view('back-end.contents.home.edit_cus', ['full_name' => $full_name, 'customer' => $customer[0]]);
        }
        else
        {
            return redirect()->route('admin.login.index');
        }
    }
    public function index_news($id)
    {
        $new = News::where('id', '=', $id)->get();
        //dd($new);
        if(auth('admin')->check()){
            $full_name = Admin::where('id', '=', auth('admin')-> id()) -> get();
            //dd($full_name);
            return view('back-end.contents.home.edit_new', ['full_name' => $full_name, 'new' => $new[0]]);
        }
        else
        {
            return redirect()->route('admin.login.index');
        }
    }
    public function edit_cus(Request $request, $id){
        $data = [
            'full_name' => $request -> full_name,
            'username' => $request -> username,
            'email' => $request -> email,
        ];
        Customer::where('id', '=', $id) -> update($data);
        session()->flash('success', 'Bạn đã sửa thành công.');
        //dd($data);
        return redirect()->route('admin.cus.index');
    }
    public function edit_news(Request $request, $id){
        $data = [
            'title' => $request -> title,
            'content' => $request -> content,
        ];
        News::where('id', '=', $id) -> update($data);
        session()->flash('success', 'Bạn đã sửa thành công.');
        //dd($data);
        return redirect()->route('admin.cus.index');
    }
    public function del_cus($id){
        $data = [
            'id_cus' => '5',
        ];
        News::where('id_cus', '=', $id) -> update($data);
        Customer::where('id', '=', $id) -> delete();
        session()->flash('success', 'Bạn đã xóa thành công.');
        return redirect()->route('admin.cus.index');
    }
    public function del_news($id){
        News::where('id', '=', $id) -> delete();
        session()->flash('success', 'Bạn đã xóa thành công.');
        return redirect()->route('admin.cus.index');
    }
}
