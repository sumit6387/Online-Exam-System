@extends('layouts.portal')
@section('title','Portal Dashboard')
@section('content')

<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <?php $val=1; ?>
                        @foreach($portal_exams as $exam)
                        <div class="col-lg-6 col-xs-6">
                            <?php 
                            $check =  strtotime($exam['exam_date']) -strtotime(date('y-m-d'));
                                    if($check < 0){
                                        $cls = 'bg-red';
                                        // echo $cls;
                                    }else{
                                        if($val%2==0){
                                            $cls='bg-aqua';
                                            $val = $val+1;
                                        }else{
                                            $cls='bg-green';
                                            $val = $val+1;

                                        }
                                    }
                                    
                            ?>
                            <!-- small box -->
                            <div class="small-box <?php echo $cls ?>">
                                <div class="inner">
                                    <h3>
                                        {{$exam['title']}}
                                    </h3>
                                    <p>
                                        {{$exam['cat_name']}}
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div> 
                                @if($check > 0)
                                <a href="{{url('portal/exam_form/'.$exam['id'])}}" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                                @endif
                            </div>
                        </div><!-- ./col -->
                    @endforeach
                    </div><!-- /.row -->

                    <!-- top row -->
                        </section><!-- right col -->
                    </div>
            </aside>
            @endsection