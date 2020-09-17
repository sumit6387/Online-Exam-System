@extends('layouts.student')
@section('title','Student - Dashboard')
@section('content')
<style type="text/css">
    td{
        font-size: 35px;
    }
</style>
<aside class="right-side">
                    <center>
<div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <img src="{{url('public/images/user.jpg')}}" style="height:150px;width:150px;margin-top: 70px;" class="img-responsive img-circle tm-border" alt="templatemo easy profile">
                <hr>
                <h1 class="tm-title bold shadow">Hi, I am {{$stud_info->name}}</h1>
            </div>
        </div>
        <hr>
        <table>
            <tr>
                <td><b>Name : </b></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$stud_info->name}}</td>
                
                
            </tr>
            <tr>
                <td><b>Email : </b></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$stud_info->email}}</td>
            </tr>
            <tr>
                <td><b>DOB : </b></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$stud_info->dob}}</td>
            </tr>
            <tr>
                <td><b>Mobile No :</b> </td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$stud_info->mobile_no}}</td>
            </tr>
        </table>
        <hr>
    </div>
    </center>
            </aside>
            @endsection