@extends('layouts.portal')
@section('title','Exam Info')
@section('content')

<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Exam Info
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Exam Info</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                	<div class="container">
                		<hr>
                		<div class="row">
                		<div class="col-sm-6">
                			<h2>{{$exam_info->title}}</h2>
                		</div>
                		<div class="col-sm-6">
                			<h2><span class="float-right" style="padding-left: 401px;">{{date('d M  Y',strtotime($exam_info->exam_date))}}</span></h2>
                		</div>
                	</div>
                		<hr>
                		<form action="{{url('portal/exam_form_submit')}}" class="database_operation">
                		   <div class="row">
                			<div class="form-group">
                				<div class="col-sm-12 my-2"  style="margin: 10px;">
                					<label for="Name">Enter Name</label>
                					{{csrf_field()}}
                					<input type="hidden" name="id" value="{{$exam_info->id}}">
                					<input type="text" name="name" placeholder="Enter Name" class="form-control">
                				</div>
                			</div>
                			<div class="form-group">
                				<div class="col-sm-12 my-2"  style="margin: 10px;">
                					<label for="Name" >Enter E-Mail</label>
                					<input type="email" name="email" required="required" placeholder="Enter E-Mail" class="form-control">
                				</div>
                			</div>
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
                					<label for="Name">Enter Password</label>
                					<input type="password" name="pwd" required="required" placeholder="Enter Password" class="form-control">
                				</div>
                			</div>
                			
                			<div class="form-group">
                				<div class="col-sm-12">
                					<button class="btn btn-info my-2" style="margin: 10px;">Save</button>
                				</div>
                			</div>
                			</div>
                		</form>
                	</div>
                    </section>
            </aside>
            @endsection