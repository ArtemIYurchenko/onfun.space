<?php

namespace App\Http\Controllers;
use DB;
use Cookie;
use Illuminate\Http\Request;

class Page extends Controller
{
	public function construct() {
        parent::construct();
    }
	
	public function reg()
    {
        return view('pages.registration');
    }
	
	
    public function index()
    {
		
		$table = DB::table('merchandise')->orderBy('id','asc')->paginate(4);
		
		
		
        return view('pages.home', compact('table'));
    }
	
	public function login()
    {
        return view('pages.login');
    }
    
	 public function find($id)
    {
		
		$table = DB::table('merchandise')->where('tags', $id)->orderBy('id','asc')->paginate(4);
		
        return view('pages.home', compact('table'));
    }

    public function userme()
    {
        return view('pages.userme');
    }
	
	public function bye($id)
    {
		if(Cookie::get('basket')== null){
			Cookie::queue('basket', $id, 360);
		}else{
		$value = Cookie::get('basket');
		$value.=",".$id;		
		Cookie::queue('basket', $value, 360);
		}    
	   return redirect('/');
    }


public function basket_del($id)
    {
		$value = Cookie::get('basket');
		$array=explode(",",$value);
		foreach($array as $key => $arr_id){
			if($id==$arr_id){
				unset($array[$key]);
				break;
			}
		}	
		$value=implode(",",$array);
		Cookie::queue('basket', $value, 360);
	   return redirect('/basket');
    }

	public function confirm_order(Request $request)
    {
		DB::table('Orders')->insert(
		['telephone' =>$request['telephone'] , 'location' =>$request['location'],'basket' =>Cookie::get('basket')]
		);
		Cookie::queue('basket', '', 1);
		return redirect('/basket');
    }

	public function basket(){
		$value = Cookie::get('basket');
		$array=explode(",",$value);
		
		foreach($array as $id){
			$table = DB::table('merchandise')->whereIn('id', $array )->orderBy('id','asc')->paginate(10);
		
		}	
		
		return view('pages.basket',compact('table','array'));
		
	}



}
