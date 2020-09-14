
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> @yield('title')</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="{{url('public/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="{{url('public/assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="{{url('public/assets/css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="{{url('public/assets/css/morris/morris.css')}}" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="{{url('public/assets/css/jvectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="{{url('public/assets/css/fullcalendar/fullcalendar.css')}}" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="{{url('public/assets/css/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="{{url('public/assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{url('public/assets/css/AdminLTE.css')}}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <div>
            @yield('content')
          
        </div>

        <script src="{{url('public/assets/js/jquery-3.3.1.min.js')}}" type="text/javascript"></script>
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->
        <!-- jQuery UI 1.10.3 -->
 <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
        <script src="{{url('public/assets/js/jquery-ui-1.10.3.min.js')}}" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="{{url('public/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="{{url('public/assets/js/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="{{url('public/assets/js/plugins/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="{{url('public/assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}" type="text/javascript"></script>
        <script src="{{url('public/assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="{{url('public/assets/js/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{url('public/assets/js/plugins/jqueryKnob/jquery.knob.js')}}" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="{{url('public/assets/js/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{url('public/assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="{{url('public/assets/js/plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="{{url('public/assets/js/AdminLTE/app.js')}}" type="text/javascript"></script>
        
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{url('public/assets/js/AdminLTE/dashboard.js')}}" type="text/javascript"></script>     
        <script src="{{url('public/assets/js/custom.js')}}" type="text/javascript"></script>     

    </body>
</html>