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
 
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<script language="javascript">
function submit(){
	var json='{';
	json+='"ten":"'+document.getElementById('hienthi_tensanpham').innerHTML+'"';
	json+=',"id":"'+document.getElementById('hienthi_idsanpham').innerHTML+'"';
	json+=',"gia":"'+document.getElementById('hienthi_giasanpham').innerHTML+'"';
	json+=',"ngayban":"'+document.getElementById('hienthi_ngaybansanpham').innerHTML+'"';
	json+=',"sizesoluong":[';
	var phanmau=document.getElementsByClassName("phanmau");
	var i=0;
	for(i=0;i<phanmau.length;i++){
		json+='{';
		if((phanmau[i].getElementsByClassName("idmau")[0]).tagName=="DIV"){
		json+='"idmau":"'+((phanmau[i].getElementsByClassName("idmau")[0]).innerHTML)+'"';}
		else{json+='"idmau":"'+((phanmau[i].getElementsByClassName("idmau")[0]).value)+'"';}
		// lấy thông tin size có sẵn
		{
			json+=',"sizesotangthem":[';
		var bangsizesoluong=phanmau[i].getElementsByClassName('bangsizesoluong')[0];
		var j=0;
		var dem=0;
		for(j=0;j<bangsizesoluong.rows[0].cells.length;j++){
			
			// lay ra cac so luong them
			{
				if((!/[a-z]/.test(bangsizesoluong.rows[0].cells[j].innerHTML))&&(!/[a-z]/.test(+bangsizesoluong.rows[2].cells[j].innerHTML)))
				{
					if(/[1-9]/.test(bangsizesoluong.rows[2].cells[j].innerHTML))
					{
						if(dem==0){
							json+='{';dem=1;
						}
						else{json+=',{';}
						
					json+='"size":"'+bangsizesoluong.rows[0].cells[j].innerHTML+'"'+',';
					json+='"sotangthem":"'+bangsizesoluong.rows[2].cells[j].innerHTML+'"';
					json+='}';
						}
					
				}
				else{
				}
				
			}
		}
		
	
		
		json+=']';
			
		}
		
		// lấy thông tin size thêm mới
		{
			json+=',"sizesomoi":[';
		var tablethemmoi=phanmau[i].getElementsByClassName('tablethemmoi')[0];
		var j=0;
		var dem=0;
		for(j=0;j<tablethemmoi.rows[0].cells.length;j++){
			
			// lay ra cac so luong moi
			{
				if((!/[a-z]/.test(tablethemmoi.rows[0].cells[j].innerHTML))&&(!/[a-z]/.test(+tablethemmoi.rows[1].cells[j].innerHTML)))
				{
					if(/[1-9]/.test(tablethemmoi.rows[1].cells[j].innerHTML)&&/[1-9]/.test(tablethemmoi.rows[0].cells[j].innerHTML))
					{
						if(dem==0){
							json+='{';dem=1;
						}
						else{json+=',{';}
						
					json+='"size":"'+tablethemmoi.rows[0].cells[j].innerHTML+'"'+',';
					json+='"soluongmoi":"'+tablethemmoi.rows[1].cells[j].innerHTML+'"';
					json+='}';
						}
					
				}
				else{
					alert("sai cú pháp");
				}
				
			}
		}
		
	
		
		json+=']';
			
		}
		
		json+='}';
		
		if(i<phanmau.length-1)json+=',';
					
		
	}
	
	json+=']';
	json+='}';console.log(json);
	
	$.ajax({
			url : "action/themsoluongsize_submit.php",
			type : "post",
			dataType:"text",
			data : {
				json:json
			},
			success : function (result){
				if(result=="error") {alert("bạn đang cố hack trang của tôi phải khồng :))");}
				else {alert('thanhcong');	}
				searchfunction();
				
			}
	});
		
}
</script>

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
							htmlanh+=' <div class="anhminhoa">\
										<img width="100%" src="../anhminhhoa/'+ item.split('_')[0]+'_'+item.split('_')[1].replace(/^(.)|\s(.)/g, function($1){ return $1.toUpperCase( ); })+'.jpeg">\
										<div class="editicon"><a href="#"><i class="fa fa-pencil fa-lg"></i></a></div></div>';
							
						});
						
						$('#hienthi_anhsanpham').html(htmlanh);
						
						//loop để lấy màu size và số lượng
						var htmlsoluong='';
						$.each(result.sizesoluong,function(key,item){
							
							htmlsoluong+='<div class="phanmau"><div class="idmau" >'+item.idmau+'</div>'+'<div>'+item.tenmau+'</div>';
							htmlsoluong+='<div class="tablequanlisoluong"><div class="row"><table class="bangsizesoluong" style="float: left;"><tr><th>size</th>';
							$.each(item.size,function(key,kichthuocsize){
								htmlsoluong+='<th ondblclick="this.contentEditable=true;" onblur="this.contentEditable=false;">'+kichthuocsize.kichthuocsize+'</th>';
							});
							htmlsoluong+='</tr><tr><th>còn lại</th>';
							$.each(item.size,function(key,soluong){
								
								if(soluong.soluong=='0'){
									htmlsoluong+='<th ondblclick="this.contentEditable=true;" onblur="this.contentEditable=false;"  style="background-color:#F5B7B1">'+soluong.soluong+'</th>';
								}
								else {
									htmlsoluong+='<th ondblclick="this.contentEditable=true;" onblur="this.contentEditable=false;" >'+soluong.soluong+'</th>';
								}
							});
							'</tr>';
							htmlsoluong+='</tr><tr><th class="tangthem">tăng thêm</th>';
							$.each(item.size,function(key,soluong){
								htmlsoluong+='<th contenteditable="true"></th>';
							});
							'</tr>';
							
					
							htmlsoluong+='</table><table class="tablethemmoi"><tr></tr><tr></tr><tr></tr></table><button class="themsize" type="button" onclick="themsize(this)" style="display:block;" >+</button>\
										</div></div></div>';
							
						});
						htmlsoluong+=''
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
					// thêm button thêm màu mới
					{
						// var btn=document.createElement("BUTTON");
						// btn.setAttribute('onclick',"themmaumoi()");
						// 	//btn.setAttribute('form',"searchform");
						// btn.setAttribute('class',"button_themmaumoi");
						// btn.innerHTML="thêm màu mới";
						// if(document.getElementById("themmaumoi").innerHTML=='')
						// document.getElementById("themmaumoi").appendChild(btn);
					
					}
						
                    
					}
                });
            }
        </script>
		

<script language="javascript">
function themsize(th){
	var table=th.previousElementSibling;
	var i=0;
	for(i=0;i<table.rows.length-1;i++){
		var cell=table.rows[i].insertCell(-1);
		cell.setAttribute('contenteditable',"true");
	}
	for(i=0;i<1;i++){
		var cell=table.rows[table.rows.length-1].insertCell(-1);
		cell.innerHTML="0";
		cell.setAttribute('contenteditable',"false");
	}
}
</script>

<script language="javascript">
function themmaumoi(){
	var hienthi_soluong=document.getElementById('hienthi_soluong');
	hienthi_soluong.getElementsByClassName('phanmau')[0];
	newmau=hienthi_soluong.getElementsByClassName('phanmau')[0].cloneNode(true );
	//tao select
	idmauselect=document.getElementById("danhsachmau").getElementsByClassName('idmau')[0].cloneNode(true );
	//alert(idmauselect.innerHTML);
	newmau.replaceChild(idmauselect,newmau.getElementsByClassName('idmau')[0]);
	newmau.getElementsByClassName('bangsizesoluong')[0].innerHTML='<tbody><tr><th>size</th></tr><tr><th>còn lại</th></tr><tr><th class="tangthem">tăng thêm</th></tr></tbody>'
	document.getElementById('divchuathongtinmaumoi').appendChild(newmau);
	alert("them màu mới");
	themfilemaumoi()
}
function themfilemaumoi(){
	
	danhsachcacanhmoi=document.getElementById("file_anhmaumoi");
	danhsachcacanhmoi.innerHTML+='<form action="" method="POST" role="form">\
                    <legend>Upload</legend>\
                    <div class="form-group">\
                        <label for="">Chọn file</label>\
                        <input id="file" type="file" name="sortpic" required="" />\
                    </div>\
                </form><br>';
				
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
<div class="formsearch">id sản phẩm <input type="text" value="<?php if(isset($_GET['idsanpham'])) echo$_GET['idsanpham'] ?>" name="idsanpham" id="idsanpham" > 
tên sản phẩm <input type="text" value="<?php if(isset($_POST['tensanpham'])) echo$_POST['tensanpham'] ?>" name="tensanpham" id="tensanpham">
<input type="button" name="clickme" id="clickme" onclick="searchfunction()" value="search"/>
</div>

</form>
<script language="javascript">
window.onload = function()
{
	
	
    if(!/[a-z]/.test(document.getElementById('idsanpham').value)&&/[0-9]/.test(document.getElementById('idsanpham').value)){
		
	searchfunction();
}

};

</script>
</div>
<br/>
<div class="row" id="result" style="" >
 <div class="col-md-6 thongtinchung">
<div >
<div contenteditable="false" ondblclick="this.contentEditable=true;" onblur="this.contentEditable=false;" id="hienthi_tensanpham"></div>
<div id="hienthi_idsanpham"></div>
<div contenteditable="false" ondblclick="this.contentEditable=true;" onblur="this.contentEditable=false;"  id="hienthi_giasanpham"></div>
<div contenteditable="false" ondblclick="this.contentEditable=true;" onblur="this.contentEditable=false;"  id="hienthi_ngaybansanpham"></div>
<div id="hienthi_anhsanpham"></div>
<div id="file_anhmaumoi"></div>
</div>

</div>
<div class="col-md-6 ">

<div id="hienthi_soluong" class="divsizesoluong"></div>

<div id="divchuathongtinmaumoi"></div>
<div id="themmaumoi"></div>
<div id="div_chua_button_submit" class="divsizesoluong"></div>

</div>

</div>
</div>

<div id="danhsachmau" style="display: none">
<select class="idmau">
<?php 
$qr='SELECT * FROM `mau` WHERE 1';
$cacmau=mysqli_query($conn,$qr);
while($cacmau_row=mysqli_fetch_array($cacmau))
{
?>
<option value="<?php echo $cacmau_row['idmau']; ?>"><?php echo $cacmau_row['tenmau'].' '.$cacmau_row['idmau']; ?></option>
<?php }
?>
</select>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>