@extends('layouts.student')
@section('title','Exams')
@section('content')

<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Exams
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Exams</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                	<div class="container">
                		<table class="table table-striped table-bordered table-hover">
                            <tr>
                                <th>Exam Title</th>
                                <th>Exam Date</th>
                                <th>Status</th>
                                <th>Result</th>
                                <th>Action</th>
                            </tr>
                            @foreach($exams as $exam)
                                <tr>
                                    <td>{{$exam['exam_name']}}</td>
                                    <td>{{$exam['exam_date']}}</td>
                                    <td><?php
                                        if(strtotime($exam['exam_date']) < strtotime(date('y-m-d'))){
                                            echo 'Completed';
                                        }else if(strtotime($exam['exam_date']) == strtotime(date('y-m-d'))){
                                           echo 'Running';
                                        }else{
                                            echo 'Pending';
                                        }
                                    ?></td>
                                    
                                    <td>N/A </td>
                                    <td><a href="{{url('student/join_exam/'.$exam['exam'])}}" class="btn btn-info">Join Exam</td>
                                </tr>
                            @endforeach
                        </table>
                	</div>
                    </section>
            </aside>
            @endsection