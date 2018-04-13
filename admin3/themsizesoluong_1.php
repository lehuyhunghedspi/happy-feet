<?php 
$conn;
require("../lib/connectdb.php");
require("lib/themsanphammysql.php");


?>


<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8"> 
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<link rel="stylesheet" href="css/themsizesoluong.css">
 

<script language="javascript">
            function searchfunction(){
                $.ajax({
                    url : "searchajaxtravejson.php",
                    type : "post",
                    dataType:"json",
                    data : {
						idsanpham:$('#idsanpham').val(),
						tensanpham:$('#tensanpham').val()
                         
                    },
                    success : function (result){
                        $('#hienthi_tensanpham').html(result.ten);
						$('#hienthi_idsanpham').html(result.id);
						$('#hienthi_giasanpham').html(result.gia);
						$('#hienthi_ngaybansanpham').html(result.ngayban);
						
						//loop để lấy ảnh
						var htmlanh='';
						$.each(result.anh,function(key,item){
							
							htmlanh+='<img class="anhminhhoa" src="../anhminhhoa/'+item+'.jpeg">';
						});
						
						$('#hienthi_anhsanpham').html(htmlanh);
						
						//loop để lấy màu size và số lượng
						var htmlsoluong='<form id="themsoluongsize" method="post" >';
						$.each(result.sizesoluong,function(key,item){
							
							htmlsoluong+='<div >'+item.idmau+'</div>'+'<div>'+item.tenmau+'</div>';
							htmlsoluong+='<div class="quanlisoluong"><div class="row"><table class="bangsizesoluong" style="float: left;"><tr><th>size</th>';
							$.each(item.size,function(key,kichthuocsize){
								htmlsoluong+='<th>'+kichthuocsize.kichthuocsize+'</th>';
							});
							htmlsoluong+='</tr><tr><th>soluongconlai</th>';
							$.each(item.size,function(key,soluong){
								htmlsoluong+='<th>'+soluong.soluong+'</th>';
							});
							'</tr>';
							htmlsoluong+='</tr><tr><th class="tangthem">tăng thêm</th>';
							$.each(item.size,function(key,soluong){
								htmlsoluong+='<th>'+'<input type="text" class="soluongthemmoi" name="'+item.idmau+'_'+soluong.kichthuocsize+'">'+'</th>';
							});
							'</tr>';
							
							
							htmlsoluong+='</table><button class="themsize" type="button" >+</button></div></div>';
						});
						htmlsoluong+='</form>'
						$('#hienthi_soluong').html(htmlsoluong);
						
						
						// thêm button
						var btn=document.createElement("BUTTON");
						btn.setAttribute('onclick',"submit()");
						btn.setAttribute('type',"submit");
						
							//btn.setAttribute('form',"searchform");
						btn.setAttribute('class',"button_submit");
						btn.innerHTML="submit";
						if(document.getElementById("div_chua_button_submit").innerHTML=='')
						document.getElementById("div_chua_button_submit").appendChild(btn);
                    }
                });
            }
        </script>
		
<script language="javascript">
function submit(){
	var json='[';
	var i=0;
	var cactangthem=document.getElementsByClassName('tangthem');
	alert(cactangthem.length);
	for(i=0;i<cactangthem.length;i++){
		var cottieptheo=cactangthem[i].nextElementSibling;
		var input;
		while(cottieptheo!== null){
			input=cottieptheo.firstElementChild;
			cottieptheo=cottieptheo.nextElementSibling;
			json+='{idmau:'+input.getAttribute('name').split('_')[0]+',size:'+input.getAttribute('name').split('_')[1]+',sotangthem:'+parseInt('0'+input.value)+'}';
			
			
		}
	}
	alert(json);
	
	$.ajax({
			url : "action/themsoluongsize_submit.php",
			type : "post",
			dataType:"text",
			data : {
			json:json
			},
			success : function (result){
				if(result=="error") {alert("bạn đang cố hack trang của tôi phải khồng :))");return false;}
				else {alert('thanhcong');return true location.reload(true);	};
			}
	});
		
}
</script>
</head>
<body>


        


<div class="container">
<div class="row">
<?php require("menu.php");?>
</div>
<br>
<div class="row" >
<form action="" method="post" id ="searchform">
<div class="formsearch">id sản phẩm <input type="text" value="<?php if(isset($_POST['idsanpham'])) echo$_POST['idsanpham'] ?>" name="idsanpham" id="idsanpham" > 
tên sản phẩm <input type="text" value="<?php if(isset($_POST['tensanpham'])) echo$_POST['tensanpham'] ?>" name="tensanpham" id="tensanpham">
<input type="button" name="clickme" id="clickme" onclick="searchfunction()" value="search"/>
</div>

</form>
</div>
<br/>
<div class="row" id="result" style="" >
 <div class="col-md-6 thongtinchung">
<div >
<div contenteditable="true" id="hienthi_tensanpham"></div>
<div id="hienthi_idsanpham"></div>
<div contenteditable="true" id="hienthi_giasanpham"></div>
<div contenteditable="true" id="hienthi_ngaybansanpham"></div>
<div id="hienthi_anhsanpham"></div>

</div>
</div>
<div class="col-md-6 ">

<div id="hienthi_soluong" class="divsizesoluong"></div>
<div id="div_chua_button_submit" class="divsizesoluong"></div>

</div>

</div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>