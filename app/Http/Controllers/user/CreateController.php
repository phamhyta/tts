<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\News;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    
    public function index(){
        $news = News::limit(12)->get();
        if(auth('customer')->check()){
            $full_name = Customer::where('id', '=', auth('customer')-> id()) -> get();
            //dd($user);
            return view('front-end.contents.home.create', ['news' => $news, 'full_name' => $full_name]);
        }
        else{
            return redirect()->route('client.login.index');
        }
    }
    public function store(Request $request){
        $id_cus = auth('customer')->id();
        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'id_cus' => $id_cus
        ];
        $news = new News($data);
        $news->save();
        return redirect()->route('client.newlist');
    }
    
}
