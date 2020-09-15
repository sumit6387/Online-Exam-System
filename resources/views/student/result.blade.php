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
                    <h3>Basic Information</h3>
                       <table class="table">
                           <tr>
                               <td><b>Exam</b></td>
                               <td>{{$result_info[0]['exam_title']}}</td>
                           </tr>
                           <tr>
                               <td><b>Name</b></td>
                               <td>{{$user_info->name}}</td>
                           </tr>
                           <tr>
                               <td><b>DOB</b></td>
                               <td>{{$user_info->dob}}</td>
                           </tr>
                           <tr>
                             <td><b>E-mail</b></td>
                             <td>{{$user_info->email}}</td>
                           </tr>
                           <tr>
                             <td><b>Mobile-No</b></td>
                             <td>{{$user_info->mobile_no}}</td>
                           </tr>
                       </table>
                    <h3>Result Information</h3>
                       <table class="table">
                           <tr>
                               <td><b>Correct Answer</b></td>
                               <td>{{$result_info[0]['yes_ans']}}</td>
                           </tr>
                           <tr>
                               <td><b>Wrong Answer</b></td>
                               <td>{{$result_info[0]['no_ans']}}</td>
                           </tr>
                           <tr>
                               <td><b>Total</b></td>
                               <td>{{$result_info[0]['yes_ans']}}/{{$result_info[0]['yes_ans']+$result_info[0]['no_ans']}}</td>
                           </tr>
                       </table>
                       <button class="btn btn-info" onclick="window.print()">Print</button>
                   </div>
               </section>
            </aside>
            @endsection