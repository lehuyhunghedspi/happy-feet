<?php 
$conn;
require("../lib/connectdb.php");
require("lib/donhangchuagiaosql.php");


?>


<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8"> 
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

 
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/donhangchuagiao.css">

</head>
<body>
<script language="javascript">
function loadajaxchinh(){$.ajax({
					url : "action/noidungcachangchuagiao.php",
                    type : "post",
                    dataType:"text",
                    data : {
                    },
                    success : function (result){
						
						document.getElementById('contentajax').innerHTML=result;
						
						{
							var btnlist= document.getElementsByClassName('buttonguihangthanhcong');
							for(i=0;i<btnlist.length;i++){
											btnlist[i].addEventListener('click',function (){
											var btn=this;
											if(confirm("bạn chắc đã gửi thành công đơn hàng chứ ?"))
											{


												$.ajax(
												{
													 url : "action/daguihangthanhcong.php",
															type : "post",
															dataType:"text",
															data : {
																iddonhang:btn.parentNode.parentNode.getElementsByClassName('iddonhang')[0].innerHTML
															},
															success : function (result){
																
																if(result=="success"){
																	
																	loadajaxchinh();
																	
																}
																else alert(result);
															}
												}
												);
											}	
							
						});
								
							}
	
		
	}
	
						{
		var btnlist= document.getElementsByClassName('buttonnhanhangthanhcong');
		for(i=0;i<btnlist.length;i++){
		btnlist[i].addEventListener('click',function (){
			var btn=this;
		if(confirm("bạn chắc đã nhận thành công đơn hàng chứ ?")){
		
		$.ajax(
		{
			 url : "action/danhanhangthanhcong.php",
                    type : "post",
                    dataType:"text",
                    data : {
						iddonhang:btn.parentNode.parentNode.getElementsByClassName('iddonhang')[0].innerHTML
                    },
                    success : function (result){
						if(result=="success"){
							
							loadajaxchinh();
						}
						else alert(result);
					}
		}
		);
	}
	
});
		
	}
	
		
	}
	
	
	
	
						{
		var btnlist= document.getElementsByClassName('buttonnhantienthanhcong');
		for(i=0;i<btnlist.length;i++){
		btnlist[i].addEventListener('click',function (){
			var btn=this;
		if(confirm("bạn chắc đã nhận thành công đơn hàng chứ ?")){
		
		$.ajax(
		{
			 url : "action/danhantienthanhcong.php",
                    type : "post",
                    dataType:"text",
                    data : {
						iddonhang:btn.parentNode.parentNode.getElementsByClassName('iddonhang')[0].innerHTML
                    },
                    success : function (result){
						if(result=="success"){
							
							loadajaxchinh();
						}
						else alert(result);
					}
		}
		);
	}
	
});
		
	}
	
		
	}
	
					}
});}

window.onload=loadajaxchinh();
</script>

<div class="container">
<div class="row">
<?php require("menu.php");?>
</div>
<br><br>
<div id="contentajax"></div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>









