@extends('layouts.app')
@section('title','Edit Exam')
@section('content')

<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Edit Exam
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Edit Exam</li>
                    </ol>
                </section>
            
                <div class="modal-body">
                 <form action="{{url('admin/edit_new_Exam')}}" class="database_operation">
                    {{csrf_field()}}
                      <div class="form-group">
                        <label for="title">Exam Title</label>
                        <input type="hidden" name="id" value="{{$exams->id}}">
                        <input type="text" class="form-control" required aria-describedby="emailHelp" name="exam_title" value="{{$exams->title}}">
                        <label for="Category_Name">Category</label>
                        <select class="form-control" name="exam_category">
                            @foreach($category as $cat)
                            <option <?php if($exams->category == $cat['id']){echo 'selected';} ?> value="{{ $cat['id'] }}">{{$cat['name']}}</option>
                            @endforeach
                        </select>
                        <label for="Exam_date">Exam Date</label>
                        <input type="date" class="form-control" required aria-describedby="emailHelp" name="exam_date" value="{{$exams->exam_date}}">
                        <button id="submit_category_name" class="btn btn-primary" style="margin-top: 10px;">Update</button>
                      </div>
            </form>
            
            </aside>
            
            @endsection