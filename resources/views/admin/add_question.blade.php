@extends('layouts.app')
@section('title','Add Question')
@section('content')

<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Add Question
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Add Question</li>
                    </ol>
                </section>
            <div class="container">
                <div class="row">
                    <a href="#" class="btn btn-info my-3" style="margin-left: 1085px;margin-bottom: 10px;" data-toggle="modal" data-target="#myModal1">Add New Question</a>
                    <table class="table table-striped table-bordered table-hover datatable">
                        <tr>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach($questions as $question)
                            <tr>
                                <td>{{$question['question']}}</td>
                                <td>{{$question['ans']}}</td>
                                <td><input type="checkbox" data-id="{{$question['id']}}" class="question_status" <?php if($question['status'] == 1){echo "checked";} ?> ></td>
                                <td><a href="{{url('admin/edit_question/'.$question['id'])}}" class="btn btn-info" style="margin:10px;">Update</a><span><a href="{{url('admin/delete_question/'.$question['id'])}}" class="btn btn-primary" style="margin:10px;">Delete</a></span></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            
                <!-- Modal -->
          <div class="modal fade" id="myModal1" role="dialog">
            <div class="modal-dialog modal-lg">
            
              <!-- Modal content-->
              <div class="modal-content">
          <div>
                <div class="modal-header">
                    <h4 class="modal-title">Add New Question</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
          </div>
                <div class="modal-body">
                 <form action="{{url('admin/add_new_question')}}" class="database_operation">
                    {{csrf_field()}}
                    <input type="hidden" name="exam_id" value="{{Request::segment(3)}}">
                    <div class="col-sm-12">
                    <div class="form-group">
                            <label for="Exam_Name">Enter Question</label>
                            <input type="text" class="form-control" id="question" required aria-describedby="emailHelp" name="question" placeholder="Enter Question">
                        </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                            <label for="option41">Enter Option 1</label>
                            <input type="text" class="form-control" id="option1" required aria-describedby="emailHelp" name="option1" placeholder="Enter Option 1">
                        </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                            <label for="option2">Enter Option 2</label>
                            <input type="text" class="form-control" id="option2" required aria-describedby="emailHelp" name="option2" placeholder="Enter Option 2">
                        </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                            <label for="option3">Enter Option 3</label>
                            <input type="text" class="form-control" id="option3" required aria-describedby="emailHelp" name="option3" placeholder="Enter Option 3">
                        </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                            <label for="option4">Enter Option 4</label>
                            <input type="text" class="form-control" id="option4" required aria-describedby="emailHelp" name="option4" placeholder="Enter Option 4">
                        </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="form-group">
                            <label for="ans">Enter Answer</label>
                            <input type="text" class="form-control" id="ans" required aria-describedby="emailHelp" name="ans" placeholder="Enter Answer">
                        </div>
                    </div>
                     <div class="col-sm-12">
                     <div class="form-group">
                        <button id="submit_category_name" class="btn btn-primary" style="margin-top: 10px;">Add</button>
                     </div>
                     </div>
                        <div class="modal-footer">
                                <button type="button" class="btn" class="close" data-dismiss="modal">close</button>
                        </div>
                      </div>
            </form>
            
            </aside>
            
            @endsection