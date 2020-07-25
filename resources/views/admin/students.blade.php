@extends('layouts.app')
@section('title','Manage Students')
@section('content')

<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Manage Students
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Manage Students</li>
                    </ol>
                </section>
            <div class="container">
                <div class="row">
                    <a href="#" class="btn btn-info my-3" style="margin-left: 1085px;margin-bottom: 10px;" data-toggle="modal" data-target="#myModal1">Add New </a>
                    <table class="table table-striped table-bordered table-hover datatable">
                        <tr>
                            <th>Name</th>
                            <th>DOB</th>
                            <th>Exam</th>
                            <th>Exam Date</th>
                            <th>Result</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                       @foreach($students as $student)
                         <tr>
                            <td>{{ $student['name'] }}</td>
                            <td>{{ $student['dob'] }}</td>
                            <td>{{ $student['ex_name'] }}</td>
                            <td>{{ $student['ex_date'] }}</td>
                            <td>N/A</td>
                            <td><input type="checkbox" class="Student_status" <?php if($student['status']==1){echo 'checked';} ?> data-id="{{$student['id']}}"></td>
                            <td><a href="{{url('admin/edit_student/'.$student['id'])}}" class="btn btn-primary" style="margin:10px;">Edit</a><span><a href="{{url('admin/delete_student/'.$student['id'])}}" class="btn btn-danger">Delete</a></span></td>
                        </tr>
                       @endforeach
                    </table>
                </div>
            </div>
                <!-- Modal -->
          <div class="modal fade" id="myModal1" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
          <div>
                <div class="modal-header">
                    <h4 class="modal-title">Add New Student</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
          </div>
                <div class="modal-body">
                 <form action="{{url('admin/add_student')}}" class="database_operation">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Enter Name</label>
                        <input type="text" class="form-control" id="name" required aria-describedby="emailHelp" name="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Enter Email</label>
                        <input type="email" class="form-control" id="email" required aria-describedby="emailHelp" name="email" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="name">Enter Mobile No.</label>
                        <input type="text" class="form-control" id="no" required aria-describedby="emailHelp" name="no" placeholder="Enter Mobile No.">
                    </div>
                     <div class="form-group">
                        <label for="DOB">Select DOB</label>
                        <input type="date" class="form-control" id="dob" required aria-describedby="emailHelp" name="dob">
                    </div>
                    <div class="form-group">
                        <label for="Category_Name">Select Exam</label>
                        <select class="form-control" name="exam">
                        	<option>Select Any Exam</option>
                          @foreach($exams as $exam)
                            <option value="{{ $exam['id'] }}">{{ $exam['title'] }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password</label>
                        <input type="password" placeholder="Enter Password" class="form-control" id="pwd" required aria-describedby="emailHelp" name="pwd">
                    </div>
                     <div class="form-group">
                        <button id="submit_category_name" class="btn btn-success" style="margin-top: 10px;">Add</button>
                     </div>
                        <div class="modal-footer">
                                <button type="button" class="btn" class="close" data-dismiss="modal">close</button>
                        </div>
                      </div>
            </form>
            
            </aside>
            
            @endsection