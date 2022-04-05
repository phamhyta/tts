<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\News;
use Illuminate\Http\Request;

class MyNewsController extends Controller
{
    public function index(){
        if(auth('customer')->check()){
            $full_name = Customer::where('id', '=', auth('customer')-> id()) -> get();
            $new = News::where('id_cus','=',auth('customer') -> id()) -> get();
            //dd($full_name[0]);
            return view('front-end.contents.home.newList', ['full_name' => $full_name, 'news' => $new]);
        }
        else
        {
            return redirect()->route('client.login.index');
        }
    }
    public function edit($id){
        //dd($id);
        if(auth('customer')->check()){
            $full_name = Customer::where('id', '=', auth('customer')-> id()) -> get();
            $news = News::where('id', '=', $id) -> get();
            //dd($full_name);
            //dd($news);
            return view('front-end.contents.customer.edit_new', ['full_name' => $full_name, 'new' => $news]);
        }
        else
        {
            return redirect()->route('client.login.index');
        }
    }
    public function update(Request $request, $id){
        $id_cus = auth('customer')->id();
        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'id_cus' => $id_cus
        ];
        //dd($id_cus);
        News::where('id', '=', $id) -> update($data);
        session()->flash('success', 'Bạn đã sửa thành công.');
        return redirect()->route('client.newlist');
    }
    public function delete($id){
        News::where('id', '=', $id) -> delete();
        session()->flash('success', 'Bạn đã xóa thành công.');
        return redirect()->route('client.newlist');
    }
    public function search(Request $request){
        $full_name = null;
        if(auth('customer')->check()){
            $full_name = Customer::where('id', '=', auth('customer')-> id()) -> get();
        }
        $keywords = $request-> keyword_submit;
        $search_new = News::where('id_cus', '=', auth('customer')-> id()) ->where('title','like', '%' . $keywords . '%') -> orwhere('content','like', '%' . $keywords . '%') ->get();
        //dd($search_cus);
        return view('front-end.contents.home.newList',['full_name' => $full_name, 'news' => $search_new]);
    }
    
}
