@extends('layouts.app')
@section('title','Category')
@section('content')

<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Category
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Category</li>
                    </ol>
                </section>
            
                <div class="modal-body">
                 <form action="{{url('admin/edit_new_category')}}" class="database_operation">
                    {{csrf_field()}}
                      <div class="form-group">
                        <label for="Category_Name">Category Name</label>
                        <input type="hidden" name="id" value="{{$category->id}}">
                        <input type="text" class="form-control" required aria-describedby="emailHelp" name="category_name" value="{{$category->name}}">
                        <button id="submit_category_name" class="btn btn-primary" style="margin-top: 10px;">Update</button>
                      </div>
            </form>
            
            </aside>
            
            @endsection