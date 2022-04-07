<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\News;

class AdminHomeController extends Controller
{
    public function Auth_Login(){
        
    }
    public function manager(){
        if(auth('admin')->check() != true){
            return redirect()->route('admin.login.index');
        }
        else{
            $customer = Customer::limit(12)->get();
            $news = News::limit(12)->get();
            $full_name = Admin::where('id', '=', auth('admin')-> id()) -> get();
            //dd($full_name[0] -> full_name);
            return view('back-end.contents.home.manager', ['customers' => $customer, 'full_name' => $full_name, 'news' => $news]);
        }   
    }
    public function search(Request $request){
        if(auth('admin')->check() != true){
            return redirect()->route('admin.login.index');
        }
        else{
            $news = News::limit(12)->get();
            $full_name = Admin::where('id', '=', auth('admin')-> id()) -> get();
            $keywords = $request-> keyword_submit;
            $search_cus = Customer::where('full_name','like', '%' . $keywords . '%') ->get();
            //dd($search_cus);
            return view('back-end.contents.home.manager',['customers'=> $search_cus, 'full_name' => $full_name, 'news' => $news]);
        }
    }
}
