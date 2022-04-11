<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\News;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    
    public function index(){
        $full_name = null;
        if(auth('customer')->check()){
            //dd(auth('customer')-> id());
            $full_name = Customer::where('id', '=', auth('customer')-> id()) -> get();
        }
        $news = News::limit(12) -> join('cus','id_cus', "=", 'cus.id') ->get();
        //dd($news);
        return view('front-end.contents.home.news', ['news' => $news, 'full_name' => $full_name]);
    }
    
    public function search(Request $request){
        $full_name = null;
        if(auth('customer')->check()){
            $full_name = Customer::where('id', '=', auth('customer')-> id()) -> get();
        }
        $keywords = $request-> keyword_submit;
        $search_new = News::where('title','like', '%' . $keywords . '%') -> orwhere('content','like', '%' . $keywords . '%') ->get();
        //dd($search_cus);
        return view('front-end.contents.home.news',['full_name' => $full_name, 'news' => $search_new]);
    }
}
