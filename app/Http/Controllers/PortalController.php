<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oex_portal;
use Validator;
use Session;
class PortalController extends Controller
{
    public function portal_signup(){
        if(Session::get('portal_session')){
            return redirect('portal/dashboard');
        }
    	return view('portal.signup');
    }
    public function signup_sub(Request $request){
    	$validator = Validator::make($request->all(),['name'=>'required','email'=>'required','no'=>'required','pwd'=>'required']);
    	if($validator->passes()){
    	$check = Oex_portal::where('email',$request->email)->get()->toArray();
    	if(!$check){
    		$add_portal = new Oex_portal();
    		$add_portal->name = $request->name;
    		$add_portal->email = $request->email;
    		$add_portal->mobile_no = $request->no;
    		$add_portal->password = $request->pwd;
    		$add_portal->save();
    		$arr = array('status'=>'true','reload'=>url('portal/login'));
    	}else{
    		$arr = array('status'=>'false','message'=>'E-mail already Exists.');
    	}
    	
    	}else{
    	$arr = array('status'=>'false','message'=>$validator->errors()->all());
    	}
    	echo json_encode($arr);

    }
    public function login(){
        if(Session::get('portal_session')){
            return redirect('portal/dashboard');
        }
    	return view('portal.login');
    }
    public function login_sub(Request $request){
    	$validator = Validator::make($request->all(),['email'=>'required','pwd'=>'required']);
    	if($validator->passes()){
    		$check_portal = Oex_portal::where('email',$request->email)->where('password',$request->pwd)->get()->toArray();
    		if($check_portal){
    			if($check_portal[0]['status'] == 1){
    				$request->session()->put('portal_session',$check_portal[0]['id']);
    			$arr = array('status'=>'true','reload'=>url('portal/dashboard'));
    			}else{
    				$arr = array('status'=>'false','message'=>'Your Account is Deactivated.');
    			}
    		}else{
    			$arr = array('status'=>'false','message'=>'Enter Valid Email And Password.');
    		}
    	}else{
    		$arr = array('status'=>'false','message'=>$validator->errors()->all());
    	}
    	
    	echo json_encode($arr);
    }
    
}
