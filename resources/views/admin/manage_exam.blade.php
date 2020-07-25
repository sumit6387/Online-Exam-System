@extends('layouts.app')
@section('title','Manage Exam')
@section('content')

<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage Exam
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Manage Exam</li>
                    </ol>
                </section>
            <div class="container">
                <div class="row">
                    <a href="#" class="btn btn-info my-3" style="margin-left: 1085px;margin-bottom: 10px;" data-toggle="modal" data-target="#myModal1">Add New </a>
                    <table class="table table-striped table-bordered table-hover datatable">
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Exam Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                       @foreach($exams as $exam)
                       	<tr>
                       		<td>{{ $exam['title'] }}</td>
                       		<td>{{ $exam['cat_name'] }}</td>
                       		<td>{{ $exam['exam_date'] }}</td>
                       		<td><input type="checkbox" class="exam_status" data-id="{{ $exam['id'] }}" <?php if($exam['status'] == 1){echo 'checked';} ?> name=""></td>
                       		<td><a href="{{url('admin/edit_exam/'.$exam['id'])}}" class="btn btn-info" style="margin: 4px;">Edit</a><span><a href="{{url('admin/delete_exam/'.$exam['id'])}}" class="btn btn-danger">Delete</a></span><span><a href="{{url('admin/add_question/'.$exam['id'])}}" class="btn btn-primary" style="margin: 4px;">Add Question</a></span></td>
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
                    <h4 class="modal-title">Add New Exam</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
          </div>
                <div class="modal-body">
                 <form action="{{url('admin/add_new_exam')}}" class="database_operation">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="Exam_Name">Enter Title</label>
                        <input type="text" class="form-control" id="title" required aria-describedby="emailHelp" name="title" placeholder="Enter Exam">
                    </div>
                     <div class="form-group">
                        <label for="Category_Name">Select Exam Date</label>
                        <input type="date" class="form-control" id="exam_date" required aria-describedby="emailHelp" name="exam_date">
                    </div>
                    <div class="form-group">
                        <label for="Category_Name">Select Category</label>
                        <select class="form-control" name="exam_category">
                        	<option>Select Any Category</option>
                        	@foreach($category as $cat)
                        		<option value="{{ $cat['id'] }}">{{ $cat['name'] }}</option>
                        	@endforeach
                        </select>
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