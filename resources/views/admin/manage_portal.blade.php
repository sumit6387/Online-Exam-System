@extends('layouts.app')
@section('title','Manage Portal')
@section('content')

<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Manage Portal
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Manage Portal</li>
                    </ol>
                </section>
            <div class="container">
                <div class="row">
                    <a href="#" class="btn btn-info my-3" style="margin-left: 1085px;margin-bottom: 10px;" data-toggle="modal" data-target="#myModal1">Add New </a>
                    <table class="table table-striped table-bordered table-hover datatable">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile No.</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                       @foreach($portals as $portal)
                        <tr>
                            <td>{{$portal['name']}}</td>
                            <td>{{$portal['email']}}</td>
                            <td>{{$portal['mobile_no']}}</td>
                            <td><input type="checkbox" class="portal_status" data-id="{{$portal['id']}}" <?php if($portal['status'] == 1){echo 'checked';} ?>></td>
                            <td><a href="{{url('admin/edit_portal/'.$portal['id'])}}" class="btn btn-primary" style="margin: 10px;">Edit</a><span><a href="{{url('admin/delete_portal/'.$portal['id'])}}" class="btn btn-danger">Delete</a></span></td>
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
                    <h4 class="modal-title">Add New Portal</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
          </div>
                <div class="modal-body">
                 <form action="{{url('admin/add_portal')}}" class="database_operation">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Enter Name</label>
                        <input type="text" class="form-control" id="name" required aria-describedby="emailHelp" name="name" placeholder="Enter Portal Name">
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