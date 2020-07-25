@extends('layouts.app')
@section('title','Edit Student')
@section('content')

<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Edit Student
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Edit Student</li>
                    </ol>
                </section>
            
                <div class="modal-body">
                  <form action="{{url('admin/edit_new_student')}}" class="database_operation">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$student->id}}">
                    <div class="form-group">
                        <label for="name">Enter Name</label>
                        <input type="text" class="form-control" id="name" value="{{$student->name}}" required aria-describedby="emailHelp" name="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Enter Email</label>
                        <input type="email" class="form-control" id="email" required aria-describedby="emailHelp" name="email" value="{{$student->email}}" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="name">Enter Mobile No.</label>
                        <input type="text" class="form-control" id="no" required aria-describedby="emailHelp" name="no" value="{{$student->mobile_no}}" placeholder="Enter Mobile No.">
                    </div>
                     <div class="form-group">
                        <label for="DOB">Select DOB</label>
                        <input type="date" class="form-control" value="{{$student->dob}}" id="dob" required aria-describedby="emailHelp" name="dob">
                    </div>
                    <div class="form-group">
                        <label for="Category_Name">Select Exam</label>
                        <select class="form-control" name="exam">
                            <option>Select Any Exam</option>
                            @foreach($exams as $exam)
                                <option value="{{$exam['id']}}" <?php if($student->exam == $exam['id']){echo 'selected';} ?>>{{$exam['title']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password</label>
                        <input type="password" placeholder="Enter Password" class="form-control" id="pwd"  aria-describedby="emailHelp" name="pwd">
                    </div>
                     <div class="form-group">
                        <button id="submit_category_name" class="btn btn-success" style="margin-top: 10px;">Update</button>
                     </div>
                      </div>
            </form>

            
            </aside>
            
            @endsection