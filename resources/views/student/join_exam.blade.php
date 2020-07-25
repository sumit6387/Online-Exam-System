@extends('layouts.student')
@section('title','Join Exams')
@section('content')

<style type="text/css"> 
    li{
        list-style: none;
           height: 50px;
           line-height: 50px;
    }
    .question_desc{
        margin-top: 10px;
    }

</style>
<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Join Exams
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Join Exams</li>
                    </ol>
                </section>

                <section>
                    <div class="row">
                        <div class="col-sm-4">
                            <h3 id="timer">Time : 3Hrs</h3>
                        </div>
                        <div class="col-sm-4">
                            <h3>Timer : <span id="timer">60:00</span></h3>
                        </div>
                        <div class="col-sm-4">
                            <h3 style="text-align:right;">Status : Pending</h3>
                        </div>
                    </div>
                    <div class="row">
                        <?php $index = 1; ?>
                        @foreach($question as $qus)
                        <div class="col-sm-12 question_desc"  style="margin-left: 50px;">
                            <p><b><?php echo $index; ?>. {{$qus['question']}}</b></p>
                            <?php $index = $index+1; 
                                    $options = json_decode($qus['options']);
                            ?>
                            <ul>
                                <li><input type="radio" name="option1"> {{$options->option1}}</li>
                                <li><input type="radio" name="option1"> {{$options->option2}}</li>
                                <li><input type="radio" name="option1">{{$options->option3}}</li>
                                <li><input type="radio" name="option1"> {{$options->option4}}</li>
                            </ul>
                        </div>
                        @endforeach
                        
                        <div class="col-sm-12" style="margin-left: 50px;">
                            <button type="submit" class="btn btn-info btn-block">Submit</button>
                        </div>
                    </div>
                </section>
               
            </aside>
            @endsection