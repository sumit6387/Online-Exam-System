@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<style type="text/css">
.card{
    border-radius: 4px;
    background: #fff;
    box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
      transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
  padding: 14px 80px 18px 36px;
  cursor: pointer;
}


.card h3{
  font-weight: 600;
}


.card-1{
 
      background-repeat: no-repeat;
    background-position: right;
    background-size: 80px;
}

.card-2{
      background-repeat: no-repeat;
    background-position: right;
    background-size: 80px;
}

.card-3{
      background-repeat: no-repeat;
    background-position: right;
    background-size: 80px;
}

@media(max-width: 990px){
  .card{
    margin: 20px;
  }
} 
body{
  overflow: hidden;
}
</style>
<aside class="right-side">
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>
                <section>
                 <div class="container" style="padding-top: 30px;">
                  <div class="row">
                    <div class="col-md-3">
                        <a href="{{url('admin/exam_category')}}" style="text-decoration: none;color: black;">
                      <div class="card card-2">
                        <h3>Category</h3>
                        <h4 align="center">{{$cat}}</h4>
                      </div>
                      </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{url('admin/manage_students')}}" style="text-decoration: none;color: black;">
                      <div class="card card-2">
                        <h3>Students</h3>
                        <h4 align="center">{{$student}}</h4>
                      </div>
                      </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{url('admin/manage_exam')}}" style="text-decoration: none;color: black;">
                      <div class="card card-2">
                        <h3>Exams</h3>
                        <h4 align="center">{{$exam}}</h4>
                      </div>
                      </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{url('admin/manage_portal')}}" style="text-decoration: none;color: black;">
                      <div class="card card-2">
                        <h3>Portals</h3>
                        <h4 align="center">{{$port}}</h4>
                      </div>
                      </a>
                    </div>
                </div>
            </div>

                </section>
                <section>
                  <div class="container">
                    <div class="row">
                        <div id="chartContainer" style="height: 370px; width: 100%;padding-top: 30px;"></div>
                    </div>
                  </div>
                </section>
            </aside>
            @endsection