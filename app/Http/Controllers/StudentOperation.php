<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Oex_exam_master;
use App\Oex_students;
use App\Oex_exam_question_master;
class StudentOperation extends Controller
{
    public function dashboard(){
    	if(!Session::get('id')){
    		return redirect(url('student/login'));
    	}
    	return view('student.dashboard');
    }
    public function logout(Request $request){
    	$request->session()->forget('id');
    	return redirect(url('student/login'));
    }
    public function exams(){
    	$data['exams'] = Oex_students::select('Oex_students.*','Oex_exam_masters.title as exam_name','Oex_exam_masters.exam_date as exam_date')
    	->join('Oex_exam_masters','Oex_students.exam','=','Oex_exam_masters.id')
    	->where('Oex_students.id',Session::get('id'))->get()->toArray();
    	return view('student.exams',$data);
    }
    public function join_exam($exam_id){
    	$question = Oex_exam_question_master::where('exam_id',$exam_id)->get()->toArray();
    	return view('student.join_exam',['question'=>$question]);
    }
}
