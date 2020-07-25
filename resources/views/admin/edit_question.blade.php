@extends('layouts.app')
@section('title','Edit Question')
@section('content')

<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Edit Question
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Edit Question</li>
                    </ol>
                </section>
            
            
            
                <div class="modal-body">
                 <form action="{{url('admin/edit_new_question')}}" class="database_operation">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$question_info->id}}">
                    <?php $options = json_decode($question_info->options); ?>
                    <div class="col-sm-12">
                    <div class="form-group">
                            <label for="Exam_Name">Enter Question</label>
                            <input type="text" class="form-control" id="question" required aria-describedby="emailHelp" value="{{$question_info->question}}" name="question" placeholder="Enter Question">
                        </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                            <label for="option41">Enter Option 1</label>
                            <input type="text" class="form-control" id="option1" required aria-describedby="emailHelp" value="{{$options->option1}}" name="option1" placeholder="Enter Option 1">
                        </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                            <label for="option2">Enter Option 2</label>
                            <input type="text" class="form-control" id="option2" required aria-describedby="emailHelp" value="{{$options->option2}}" name="option2" placeholder="Enter Option 2">
                        </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                            <label for="option3">Enter Option 3</label>
                            <input type="text" class="form-control" value="{{$options->option3}}" id="option3" required aria-describedby="emailHelp" name="option3" placeholder="Enter Option 3">
                        </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                            <label for="option4">Enter Option 4</label>
                            <input type="text" class="form-control" value="{{$options->option4}}" id="option4" required aria-describedby="emailHelp" name="option4" placeholder="Enter Option 4">
                        </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="form-group">
                            <label for="ans">Enter Answer</label>
                            <input type="text" class="form-control" value="{{$question_info->ans}}" id="ans" required aria-describedby="emailHelp" name="ans" placeholder="Enter Answer">
                        </div>
                    </div>
                     <div class="col-sm-12">
                     <div class="form-group">
                        <button id="submit_category_name" class="btn btn-primary" style="margin-top: 10px;">Update</button>
                     </div>
                     </div>
            </form>
        </div>
                      </div>
            
            </aside>
            
            @endsection