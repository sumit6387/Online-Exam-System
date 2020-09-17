<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oex_category;
use App\Oex_exam_master;
use App\Oex_students;
use App\Oex_portal;
use App\Oex_exam_question_master;      
use App\Oex_result;
use Validator;
use Session;
class Admin extends Controller
{
    public function index(){
        $no_category = Oex_category::all();
        $data['cat'] = count($no_category);
        $stud = Oex_students::all();
        $data['student'] = count($stud);
        $exam = Oex_exam_master::all();
        $data['exam'] = count($exam);
        $port = Oex_portal::all();
        $data['port'] = count($port);
        return view('admin.dashboard',$data);
    }
    public function exam_category(){
    	$data['category'] = Oex_category::orderBy('id','desc')->get()->toArray();
    	return view('admin.exam_category',$data);
    }
    public function add_new_category(Request $request){
    	$validator = Validator::make($request->all(),['category_name'=>'required']);
    	if($validator->passes()){
    		$insert = new Oex_category();
    	$insert->name = $request->category_name;
    	$insert->status = 1;
    	$insert->save();
    		$arr = array('status'=>'true','message'=>'Category Inserted successfully.' ,'reload'=>url('admin/exam_category'));

    	}else{
    		$arr = array('status'=>'false','message'=>$validator->errors()->all());
    	}
    	echo json_encode($arr);
    	
    }
    public function delete_category($id){
    	$cat = Oex_category::where('id',$id)->get()->first();
    	if($cat){
    		$cat->delete();
    		return redirect(url('admin/exam_category'));
    	}
    }
    public function edit_category($id){
    	$category = Oex_category::where('id',$id)->get()->first();
    	return view('admin.edit_category',['category'=>$category]);
    }

    public function edit_new_category(Request $request){
    	$new_cat = Oex_category::where('id',$request->id)->get()->first();
    	$new_cat->name = $request->category_name;
    	$new_cat->update();
    	echo json_encode(array('status'=>'true','message'=>'Category successdfully updated.','reload'=>url('admin/exam_category')));
    }
    public function category_status($id){
        $status = Oex_category::where('id',$id)->get()->first();
        if($status->status == 1){
            $status->status=0;
        }else{
            $status->status=1;
        }
        $status->update();
        $arr= array('status'=>'true','message'=>'Status changed successfully.','reload'=>url('admin/exam_category'));
        echo json_encode($arr);
        
    }
    public function manage_exam(){
        $data['category'] = Oex_category::orderBy('id','desc')->where('status','1')->get()->toArray();
        $data['exams'] = Oex_exam_master::select(['oex_exam_masters.*','oex_categories.name as cat_name'])->orderBy('id','desc')->join('oex_categories','oex_exam_masters.category','=','oex_categories.id')->get()->toArray();
        return view('admin.manage_exam',$data);
    }
    public function add_new_exam(Request $request){
        $validator = Validator::make($request->all(),['title'=>'required','exam_date'=>'required','exam_category'=>'required']);
        $exam = new Oex_exam_master();
        if($validator->passes()){
            $exam->title = $request->title;
            $exam->category = $request->exam_category;
            $exam->exam_date = $request->exam_date;
            $exam->status =1;
            $exam->save();
            $arr=array('status'=>'true','message'=>'Exam Added successfully.','reload'=>url('admin/manage_exam'));
        }else{
            $arr=array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);

    }
    public function edit_exam($id){
        $data['category'] = Oex_category::where('status','1')->get()->toArray();
        $data['exams'] = Oex_exam_master::where('id',$id)->get()->first();
        return view('admin.edit_exam',$data);
    }
    public function exam_status($id){
        $exam_status = Oex_exam_master::where('id',$id)->get()->first();
        if($exam_status->status == 1){
            $exam_status->status=0;
        }else{
            $exam_status->status=1;
        }
        $exam_status->update();
        $arr= array('status'=>'true','message'=>'Status changed successfully.','reload'=>url('admin/manage_exam'));
        echo json_encode($arr);
    }
    public function edit_new_Exam(Request $request){
        $update_exam = Oex_exam_master::where('id',$request->id)->get()->first();
        $update_exam->title = $request->exam_title;
        $update_exam->category = $request->exam_category;
        $update_exam->exam_date = $request->exam_date;
        $update_exam->update();
        $arr= array('status'=>'true','message'=>'Exam Edited successfully.','reload'=>url('admin/manage_exam'));
        echo json_encode($arr);
    }

    public function delete_exam($id){
        $delete_exam = Oex_exam_master::where('id',$id)->get()->first();
        $delete_exam->delete();
        return redirect(url('admin/manage_exam'));
    }
    public function manage_students(){
        $data['exams'] = Oex_exam_master::where('status','1')->get()->toarray();
        $data['students'] = Oex_students::select(['oex_students.*','oex_exam_masters.title as ex_name','oex_exam_masters.exam_date as ex_date'])
        ->join('oex_exam_masters','oex_students.exam','=','oex_exam_masters.id')
        ->orderBy('id','desc')->get()->toArray();
        $data['result'] = Oex_result::get()->toArray();
        return view('admin.students',$data);
    }
    public function add_student(Request $request){
        $validator = Validator::make($request->all(),['name'=>'required','email'=>'required','no'=>'required','exam'=>'required','pwd'=>'required']);
        if($validator->passes()){

                $student = new Oex_students();
                $student->name = $request->name;
                $student->email = $request->email;
                $student->mobile_no = $request->no;
                $student->dob = $request->dob;
                $student->exam = $request->exam;
                $student->password = $request->pwd;
                $student->status = "1";
                $student->save();
                $arr= array('status'=>'true','message'=>'Student Added successfully.','reload'=>url('admin/manage_students'));
        }else{
            $arr= array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);

    }
    public function delete_student($id){
        $delete_student = Oex_students::where('id',$id)->get()->first();
        $delete_student->delete();
        return redirect(url('admin/manage_students'));
    }
    public function edit_student($id){
        $data['student'] = Oex_students::where('id',$id)->get()->first();
        $data['exams'] = Oex_exam_master::where('status','1')->get()->toarray();
        return view('admin.edit_student',$data);
    }

    public function Student_status($id){
        $student_status = Oex_students::where('id',$id)->get()->first();
        if($student_status->status == 1){
            $student_status->status=0;
        }else{
            $student_status->status=1;
        }
        $student_status->update();
        $arr= array('status'=>'true','message'=>'Status changed successfully.','reload'=>url('admin/manage_students'));
        echo json_encode($arr);
    }
    public function edit_new_student(Request $request){
                $student = Oex_students::where('id',$request->id)->get()->first();
                $student->name = $request->name;
                $student->email = $request->email;
                $student->mobile_no = $request->no;
                $student->dob = $request->dob;
                $student->exam = $request->exam;
                if(!$request->pwd){
                    $student->password = $request->pwd;
                }
                $student->update();
              echo json_encode(array('status'=>'true','message'=>'Student information updated successfully.','reload'=>url('admin/manage_students')));
    }
    public function manage_portal(){
        $data['portals'] = Oex_portal::orderBy('id','desc')->get()->toArray();
        return view('admin.manage_portal',$data);
    }
    public function add_portal(Request $request){
        $validator = Validator::make($request->all(),['name'=>'required','email'=>'required','no'=>'required','pwd'=>'required']);
        if($validator->passes()){
            $p =new Oex_portal();
            $p->name = $request->name;
            $p->email = $request->email;
            $p->mobile_no = $request->no;
            $p->password = $request->pwd;
            $p->status = 1;
            $p->save();
            $arr = array('status'=>'true','message'=>'Portal Added successfully','reload'=>url('admin/manage_portal'));
        }else{
            $arr = array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }
    public function delete_portal($id){
        $portal = Oex_portal::where('id',$id)->get()->first();
        $portal->delete();
        return redirect(url('admin/manage_portal'));
    }
    public function portal_status($id){
        $status = Oex_portal::where('id',$id)->get()->first();
        if($status->status == 1){
            $status->status=0;
        }else{
            $status->status=1;
        }
        $status->update();
        $arr= array('status'=>'true','message'=>'Status changed successfully.','reload'=>url('admin/manage_portal'));
        echo json_encode($arr);
    }
    public function edit_portal($id){
        $data['portal_info'] = Oex_portal::where('id',$id)->get()->first();
        return view('admin.edit_portal',$data);
    }
    public function edit_new_portal(Request $request){
        $portal = Oex_portal::where('id',$request->id)->get()->first();
        $portal->name = $request->name;
        $portal->email = $request->email;
        $portal->password = $request->no;
        if($request->pwd != ''){
            $portal->password = $request->pwd;
        }
        $portal->update();
        echo json_encode(array('status'=>'true','message'=>'Portal Information Updated successfully.' , 'reload'=>url('admin/manage_portal')));
    }
    public function add_question($id){
        $data['questions'] = Oex_exam_question_master::where('exam_id',$id)->orderBy('id','desc')->get()->toArray();
        return view('admin.add_question',$data);
    }
    public function add_new_question(Request $request){
        $validator = Validator::make($request->all(),['question'=>'required','option1'=>'required','option2'=>'required','option3'=>'required','option4'=>'required','ans'=>'required']);
        if($validator->passes()){
            $add_question = new Oex_exam_question_master();
            $add_question->exam_id = $request->exam_id;
            $add_question->question = $request->question;
            $add_question->ans = $request->ans;
            $add_question->status = 1;
            $add_question->options = json_encode(array('option1'=>$request->option1,'option2'=>$request->option2,'option3'=>$request->option3,'option4'=>$request->option4));

            $add_question->save();
            $arr = array('status'=>'true','message'=>'Question Added successfully.','reload'=>url('admin/add_question/'.$request->exam_id));
        }else{
            $arr = array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);

    }
    public function delete_question($id){
        $question = Oex_exam_question_master::where('id',$id)->get()->first();
        $question->delete();
        return redirect(url('admin/add_question/'.$question->exam_id));
    }
    public function question_status($id){
        $question_status = Oex_exam_question_master::where('id',$id)->get()->first();
        if($question_status->status == 1){
            $question_status->status = 0;
        }else{
            $question_status->status = 1;
        }
        $question_status->update();
        echo json_encode(array('status'=>'true','message'=>'Status Changed successdfully.','reload'=>url('admin/add_question/'.$question_status->exam_id)));
    }
    public function edit_question($id){
        $question_info = Oex_exam_question_master::where('id',$id)->get()->first();

        return view('admin.edit_question',['question_info'=>$question_info]);
    }
    public function edit_new_question(Request $request){
        $update_question = Oex_exam_question_master::where('id',$request->id)->get()->first();
        $update_question->question = $request->question;
        $update_question->ans = $request->ans;
        $update_question->options = json_encode(array('option1'=>$request->option1,'option2'=>$request->option2,'option3'=>$request->option3,'option4'=>$request->option4));
        $update_question->update();
        echo json_encode(array('status'=>'true','message'=>'Question Updated successdfully.','reload'=>url('admin/add_question/'.$update_question->exam_id)));
    }
    public function logout(Request $request){
        $request->session()->forget('admin_id');
        return redirect(url('/login'));
    }

}
