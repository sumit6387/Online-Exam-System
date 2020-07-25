@extends('layouts.app')
@section('title','Edit Portal')
@section('content')

<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Edit Portal
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Edit Portal</li>
                    </ol>
                </section>
            
                <div class="modal-body">
                  <form action="{{url('admin/edit_new_portal')}}" class="database_operation">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Enter Name</label>
                        <input type="text" class="form-control" value="{{$portal_info->name}}" id="name" required aria-describedby="emailHelp" name="name" placeholder="Enter Portal Name">
                        <input type="hidden" name="id" value="{{$portal_info->id}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Enter Email</label>
                        <input type="email" class="form-control" id="email" value="{{$portal_info->email}}" required aria-describedby="emailHelp" name="email" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="name">Enter Mobile No.</label>
                        <input type="text" class="form-control" id="no" value="{{$portal_info->mobile_no}}" required aria-describedby="emailHelp" name="no" placeholder="Enter Mobile No.">
                    </div>
                     
                    <div class="form-group">
                        <label for="pwd">Password</label>
                        <input type="password" placeholder="Enter Password" class="form-control" id="pwd"  aria-describedby="emailHelp" name="pwd">
                    </div>
                     <div class="form-group">
                        <button id="submit_category_name" class="btn btn-info" style="margin-top: 10px;">Update</button>
                     </div>
            </form>
        </div>

            
            </aside>
            
            @endsection