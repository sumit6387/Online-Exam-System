$(document).on('submit','.database_operation',function(){
                	var url = $(this).attr('action');
                	var data = $(this).serialize();
                	$.post(url,data,function(data){
                		var resp = $.parseJSON(data);
                		if(resp.status == 'true'){
                			alert(resp.message);
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

$('.category_status').click(function(){
	var id = $(this).attr('data-id');
	// alert(id);
	$.get('http://localhost/Online-Exam-System/admin/category_status/'+id,function(fb){
		var resp = $.parseJSON(fb);
		if(resp.status == 'true'){
			alert(resp.message);
             setTimeout(function(){
                window.location.href = resp.reload;
               },1000);
		}
	});
	});

$('.exam_status').click(function(){
	var id = $(this).attr('data-id');
	// alert(id);
	$.get('http://localhost/Online-Exam-System/admin/exam_status/'+id,function(fb){
		var resp = $.parseJSON(fb);
		if(resp.status == 'true'){
			alert(resp.message);
             setTimeout(function(){
                window.location.href = resp.reload;
               },1000);
		}
	});
	
});

$('.Student_status').click(function(){
	var id = $(this).attr('data-id');
	// alert(id);
	$.get('http://localhost/Online-Exam-System/admin/Student_status/'+id,function(fb){
		var resp = $.parseJSON(fb);
		// alert(resp);
		if(resp.status == 'true'){
			alert(resp.message);
             setTimeout(function(){
                window.location.href = resp.reload;
               },1000);
		}
	});
	
	
});
$('.portal_status').click(function(){
	var id = $(this).attr('data-id');
	// alert(id);
	$.get('http://localhost/Online-Exam-System/admin/portal_status/'+id,function(fb){
		var resp = $.parseJSON(fb);
		// alert(resp);
		if(resp.status == 'true'){
			alert(resp.message);
             setTimeout(function(){
                window.location.href = resp.reload;
               },1000);
		}
	});

	});
$('.question_status').click(function(){
	var id = $(this).attr('data-id');
	$.get('http://localhost/Online-Exam-System/admin/question_status/'+id,function(fb){
		var resp = $.parseJSON(fb);
		// alert(resp);
		if(resp.status == 'true'){
			alert(resp.message);
             setTimeout(function(){
                window.location.href = resp.reload;
               },1000);
		}
	});

});
 $(document).ready(function(){
        
        function timer(){
            
            var time = $("#timer").val();
            var timerVal = time.split(':');
            var minutus = timerVal[0];
            var seconds = timerVal[1];
            
            if(seconds == '00'){
                minutus = minutus-1;
                seconds = 59;
            }else{
                seconds = seconds-1;
            }
            if(minutus == '00' && seconds == '00'){
                window.location = "{{url('student/submit_question')}}";
                alert('Time Up');
            }
            
            if(seconds < 10){
                seconds='0'+seconds;
            }
            if(minutus.length == 1){
                minutus = '0'+minutus;
            }
            var timeVal = minutus+':'+seconds;
            $('#timer').html(timeVal);
        }
    
    });
