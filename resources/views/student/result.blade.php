@extends('layouts.student')
@section('title','Results')
@section('content')
<script type="text/javascript">
  $(document).ready(function(){
    setInterval(timer,1000);
  });
</script>
<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Result
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Result</li>
                    </ol>
                </section>
               <section>
                   <div class="col-sm-2">&nbsp;</div>
                   <div class="col-sm-8">
                       <h2>Exam : {{$result_info[0]['exam_title']}} Result</h2>
                       <div class="col-sm-4">
                         <label><h3>Name : <span>{{$user_info->name}}</span></h3></label>
                         <label><h3>DOB : <span>{{$user_info->dob}}</span></h3></label>
                       </div>
                       <div class="col-sm-5">
                         <label><h3>E-mail : <span>{{$user_info->email}}</span></h3></label>
                         <label><h3>Mobile-No : <span>{{$user_info->mobile_no}}</span></h3></label>
                       </div>
                       <br>
                       <br>
                       <table class="table">
                           <tr>
                               <td><b>Pass Marks</b></td>
                               <td>{{$result_info[0]['yes_ans']}}</td>
                           </tr>
                           <tr>
                               <td><b>Fail Marks</b></td>
                               <td>{{$result_info[0]['no_ans']}}</td>
                           </tr>
                           <tr>
                               <td><b>Total</b></td>
                               <td>{{$result_info[0]['yes_ans']+$result_info[0]['no_ans']}}</td>
                           </tr>
                       </table>
                       <button class="btn btn-info" onclick="window.print()">Print</button>
                   </div>
               </section>
            </aside>
            @endsection