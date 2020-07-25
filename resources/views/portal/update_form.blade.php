@extends('layouts.portal')
@section('title','Update Exam Form')
@section('content')

<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Update Exam Form
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Update Exam Form</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                	<div class="container">
                		<form action="{{url('portal/student_exam_info')}}" method="get">
                		   <div class="row">
                			<div class="form-group">
                				<div class="col-sm-12 my-2"  style="margin: 10px;">
                					<label for="Name">Enter Mobile-No</label>
                					<input type="text" name="no" required="required" placeholder="Enter Mobile-No" class="form-control">
                				</div>
                			</div>
                			<div class="form-group">
                				<div class="col-sm-12 my-2"  style="margin: 10px;">
                					<label for="Name">Enter DOB</label>
                					<input type="date" name="dob" required="required"  class="form-control">
                				</div>
                			</div>
                			<div class="form-group">
                				<div class="col-sm-12 my-2"  style="margin: 10px;">
                					<label for="exam">Enter Exam</label>
                					<select class="form-control" name="exam">
                                        <option value="">Select One</option>
                                        @foreach($exams as $exam)
                                            <option value="{{$exam['id']}}">{{$exam['title']}}</option>
                                        @endforeach
                                    </select>
                				</div>
                			</div>
                			
                			<div class="form-group">
                				<div class="col-sm-12">
                					<button class="btn btn-info my-2" style="margin: 10px;">Update</button>
                				</div>
                			</div>
                			</div>
                		</form>
                	</div>
                    </section>
            </aside>
            @endsection