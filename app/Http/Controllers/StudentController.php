<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Oex_students;
use Session;
class StudentController extends Controller
{
    public function login(){
    	if(Session::get('id')){
    		return redirect(url('student/dashboard'));
    	}
    	return view('student.login');
    }
    public function login_sub(Request $request){
    	$validator = Validator::make($request->all(),['email'=>'required','pwd'=>'required']);
    	if($validator->passes()){
    		$check_student = Oex_students::where('email',$request->email)->where('password',$request->pwd)->get()->toArray();
    		if($check_student){
    			if($check_student[0]['status'] == 1){
    				$request->session()->put('id',$check_student[0]['id']);
    			$arr = array('status'=>'true','reload'=>url('student/dashboard'));
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
