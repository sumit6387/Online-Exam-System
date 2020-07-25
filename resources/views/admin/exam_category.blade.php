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
            <div class="container">
                <div class="row">
                    <a href="#" class="btn btn-info my-3" style="margin-left: 1085px;margin-bottom: 10px;" data-toggle="modal" data-target="#myModal1">Add New </a>
                    <table class="table table-striped table-bordered table-hover datatable">
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach($category as $value)

                        <tr>
                            <td>{{ $value['name'] }}</td>
                            <td><input type="checkbox" <?php if($value['status'] == 1){echo 'checked'; } ?> class="category_status" data-id="{{$value['id'] }}"  name="status"></td>
                            <td style="text-align: center;"><a href="{{url('admin/edit_category/'.$value['id'])}}"  style="margin: 4px;" class="btn btn-primary my-3" value="Edit" name="edit">Edit</a><span><a href="{{url('admin/delete_category/'.$value['id'])}}"  style="margin: 4px;" class="btn btn-danger my-3" value="Delete" name="delete">Delete</a></span></td>
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
                    <h4 class="modal-title">Add New Category</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
          </div>
                <div class="modal-body">
                 <form action="{{url('admin/add_new_category')}}" class="database_operation">
                    {{csrf_field()}}
                      <div class="form-group">
                        <label for="Category_Name">Category Name</label>
                        <input type="text" class="form-control" id="category_name" required aria-describedby="emailHelp" name="category_name" placeholder="Enter Category">
                        <button id="submit_category_name" class="btn btn-success" style="margin-top: 10px;">Add</button>
                        <div class="modal-footer">
                                <button type="button" class="btn" class="close" data-dismiss="modal">close</button>
                        </div>
                      </div>
            </form>
            
            </aside>
            
            @endsection