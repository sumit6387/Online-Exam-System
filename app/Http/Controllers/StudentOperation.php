<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Oex_exam_master;
use App\Oex_students;
use App\Oex_exam_question_master;
use App\Oex_result;
use App\http\Middleware\StudentMiddleware;
class StudentOperation extends Controller
{
    public function dashboard(){
    	$data['stud_info'] = Oex_students::where('id',Session::get('id'))->get()->first();
    	return view('student.dashboard',$data);
    }
    public function logout(Request $request){
    	$request->session()->forget('id');
    	return redirect(url('student/login'));
    }
    public function exams(){
    	$data['exams'] = Oex_students::select('Oex_students.*','Oex_exam_masters.title as exam_name','Oex_exam_masters.exam_date as exam_date')
    	->join('Oex_exam_masters','Oex_students.exam','=','Oex_exam_masters.id')
    	->where('Oex_students.id',Session::get('id'))->get()->toArray();
        $exam_id = $data['exams'][0]['exam'];
        $data['exam_info'] = Oex_result::where('exam_id',$exam_id)->where('user_id',Session::get('id'))->get()->first();
    	return view('student.exams',$data);
    }
    public function join_exam($exam_id){
    	$question = Oex_exam_question_master::where('exam_id',$exam_id)->get()->toArray();
    	$exam_date = Oex_exam_master::where('id',$exam_id)->get()->first()->exam_date;
    	return view('student.join_exam',['question'=>$question,'exam_date'=>$exam_date]);
    }
    public function submit_answer(Request $request){
        $data = $request->all();
        $yes_ans = 0;
        $no_ans = 0;
        $result = array();
        for ($i=1; $i <= $request->index; $i++) { 
            if(isset($data['question'.$i])){
                $questions = Oex_exam_question_master::where('id',$data['question'.$i])->get()->first();
                if($questions->ans == $data['ans'.$i]){
                    $result[$data['question'.$i]]='YES';
                    $yes_ans++;
                }else{
                    $result[$data['question'.$i]]='NO';
                    $no_ans++;
                }
            }
        }
        
            $res = new Oex_result();
            $res->exam_id = $request->exam_id;
            $res->user_id = Session::get('id');
            $res->yes_ans = $yes_ans;
            $res->no_ans = $no_ans;
            $res->question_json = json_encode($result);
            $res->save();
            return redirect(url('student/result/'.$res->id));
        
        
    }
    public function result($id){
        $data['result_info'] = Oex_result::select(['oex_results.*','oex_exam_masters.title as exam_title'])
        ->join('oex_exam_masters','oex_exam_masters.id','=','oex_results.exam_id')
        ->where('oex_results.id',$id)->get()->toArray();
        $user_id = $data['result_info'][0]['user_id'];
        $data['user_info'] = Oex_students::where('id',$user_id)->get()->first();
        return view('student.result',$data);
    }
    public function test(){
        return redirect(url('student/login'));
    }
}
