<!DOCTYPE html>
<html>
<head>
	<title>Portal - Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<style type="text/css">
		
 .signup_container {
    width: 50%;
    height: 419px;
    border: 1px solid black;
    border-radius: 35px;
    padding: 21px;
    margin-left: 20%;
    margin-top: 100px;
}
	</style>
</head>
<body>
	
	<div class="signup_container">
		<div class="signup_title text-center">
			<h3>Portal Login</h3>
		</div>
		<hr>
		<form  action="{{url('portal/login_sub')}}" method="post" class="database_operation">
		<div class="signup_form">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						{{csrf_field()}}
						<label for="Name"> Enter E-Mail:</label>
						<input type="email" name="email" class="form-control" placeholder="Enter Your E-Mail">
					</div>
				</div>
				<div class="col-sm-12">
					<div class="form-group">
						<label for="Name"> Enter Password</label>
						<input type="password" name="pwd" class="form-control" placeholder="Enter Your Password">
					</div>
				</div>
				<div class="col-sm-12">
					<div class="form-group">
						<button type="submit" class="btn btn-info btn-block">Login</button>
					</div>
				</div>
				<h5 class="text-center">OR</h5>
				<div class="col-sm-12">
					<h5 class="text-right btn btn-primary btn-block"><a style="text-decoration: none;color: white;" href="{{url('portal/portal_signup')}}">SignUp</a></h5>
				</div>
			</div>
		</div>
		</form>
	</div>
    <script src="{{url('assets/js/jquery-3.3.1.min.js')}}" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).on('submit','.database_operation',function(){
                	var url = $(this).attr('action');
                	var data = $(this).serialize();
                	$.post(url,data,function(data){
                		var resp = $.parseJSON(data);
                		if(resp.status == 'true'){
                			// alert(resp.message);
                			setTimeout(function(){
                				window.location.href = resp.reload;
                			},1000);
                		}else{
                			alert(resp.message);
                		}
                		
                		// console.log(resp);
                	});
                	// console.log(url , data);
                	return false;
                });
	</script>
</body>
</html>