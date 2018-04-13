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
<link rel="stylesheet" href="admin.css">
<link rel="stylesheet" href="css/themsizesoluong.css">

<link rel="stylesheet" href="css/themmaumoi.css">
</head>
<body>

<script language="javascript">
            function searchfunction(){
				//alert($('#idsanpham').val());
                $.ajax({
                    url : "searchajaxtravejson.php",
                    type : "post",
                    dataType:"json",
                    data : {
						idsanpham:$('#idsanpham').val(),
						tensanpham:$('#idsanpham').val()
                         
                    },
                    success : function (result){
						//alert(result);
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
							
							htmlsoluong+='<span class="phanmau"><span class="idmaudaco" >'+item.idmau+'</span>'+'<span class="tenmaudaco">'+item.tenmau+'</span></span>';
							
						});
						htmlsoluong+=''
						$('#hienthi_soluong').html(htmlsoluong);
						
					}
                });
            }
        </script>
		
		<script>
		function thaydoianh(inputanh){
			var spantenanh=inputanh.parentNode.getElementsByClassName("tenanh")[0];
		
			split=inputanh.value.split('\\');
			
				spantenanh.innerHTML=split[split.length-1];
				if(inputanh.value!=""){
					
				split=inputanh.value.split('.');
				duoifile=split[split.length-1];
				if(duoifile!="jpg"){
					alert("ảnh chỉ hỗ trợ jpg");
				}
				}
				else{
					spantenanh.innerHTML="bấm để chọn";
				}
			
			
			
		}
		function checkbeforesubmit(){
				//kiemtramua
				
				var danhsachcacselectmau=document.getElementsByClassName("select_mau");
				var danhsachcacmaudaco=document.getElementsByClassName("tenmaudaco");
				//alert(danhsachcacselectmau[0].value);
				for(i=0;i<danhsachcacselectmau.length;i++){
					for(j=0;j<danhsachcacmaudaco.length;j++)
					{
						
					//	alert(danhsachcacselectmau[j].innerHTML);
					if(danhsachcacselectmau[i].value==danhsachcacmaudaco[j].innerHTML)
						{
							danhsachcacselectmau[i].setAttribute("style","background-color:red");
							alert("trùng màu "+danhsachcacselectmau[i].value);
							return false;
						}
					}
				}
				for(i=0;i<danhsachcacselectmau.length;i++){
					for(j=i+1;j<danhsachcacselectmau.length;j++){
						if(danhsachcacselectmau[i].value==danhsachcacselectmau[j].value)
							{
							danhsachcacselectmau[i].setAttribute("style","background-color:red");
							alert("trùng màu "+danhsachcacselectmau[i].value);
							return false;
							}
					}
					
				}
				return true;
}	
		</script>
<?php 
 
	 // doan code them hang hoa
if(isset($_POST['uploadsanpham']))
{
	
	//them thong tin chung
	{
		// echo 'thêm thông tin chung:';
		// echo $_POST['tensanpham'];
	// echo "ten san pham<br>";
	
		// echo $_POST['giaban'];echo " gia ban<br>";
			// echo $_POST['docaocuade'];echo " do cao cu de<br>";
		// echo $_POST['idchatlieu'];echo " chat lieu<br>";
		// echo $_POST['idkieugiay'];echo "kieu giay<br>";
		// echo $_POST['docaocuade'];echo "docaocuade <br>";
		// echo $_POST['idloaimui'];echo "idloaimui <br>";
	// echo $_POST['idloaigot'];echo "idloaigot <br>";
	
	// $mucdich=laydanhsachmucdich($conn);
	// $idsanpham=themthongtinchung($conn,$_POST['tensanpham'],$_POST['giaban'],$_POST['docaocuade'],$_POST['idloaimui'],$_POST['idchatlieu'],$_POST['idkieugiay'],$_POST['idloaigot']);
// echo $idsanpham."idsanpham<br>";
	
	// while($mucdich_row=mysqli_fetch_array($mucdich))
// { 
// if(isset($_POST["mucdich_".$mucdich_row["idmucdich"]]))
	// themmucdich($conn,$mucdich_row["idmucdich"],$idsanpham);
// }
}
	
	$idsanpham=$_POST["idsanpham"];

// them anh
{
	
	$i=1;
do{
    if($_FILES['anhminhhoa_'.$i]['name'] != NULL){ // Đã chọn file
        // Tiến hành code upload file
		
        if($_FILES['anhminhhoa_'.$i]['type'] == "image/jpg"
		|| $_FILES['anhminhhoa_'.$i]['type'] == "image/jpeg"){
        // là file ảnh
        // Tiến hành code upload    
            if($_FILES['anhminhhoa_'.$i]['size'] > 104857600){
                echo "File không được lớn hơn 10mb";
            }else{
                // file hợp lệ, tiến hành upload
                $path = "../anhminhhoa/"; // file sẽ lưu vào thư mục data
                $tmp_name = $_FILES['anhminhhoa_'.$i]['tmp_name'];
                $name = $_FILES['anhminhhoa_'.$i]['name'];
                $type = $_FILES['anhminhhoa_'.$i]['type']; 
                $size = $_FILES['anhminhhoa_'.$i]['size']; 
                // Upload file
                move_uploaded_file($tmp_name,$path.$idsanpham."_".$_POST["mau_".$i].".".basename($type));
                // echo "File uploaded! <br />";
                // echo "Tên file : ".$name."<br />";
                // echo "Kiểu file : ".$type."<br />";
                // echo "File size : ".$size;
			}
        }else{
           // không phải file ảnh
           echo "Kiểu file không hợp lệ";
        }
   }else{
        echo "Vui lòng chọn file";
   }
   $i++;
   //echo "i==".$i."<br>";
}while(isset($_FILES["anhminhhoa_".$i]));

}
//them size mau
{
	$i=1;
	do{
		if(isset($_POST["mau_".$i])){
			$j=1;
			$idmau=layidmau($conn,$_POST["mau_".$i]);
		//	echo "<br>POST[mau_]".$_POST["mau_".$i]."<br>";
			do{
				if(isset($_POST["kichthuocsize_".$i."_".$j])&&isset($_POST["soluong_".$i."_".$j])){
					
					themsizemau($conn,$idmau,$_POST["kichthuocsize_".$i."_".$j],$_POST["soluong_".$i."_".$j],$idsanpham);
					// them vao bang
				}
					
				$j++;
			}
			while(isset($_POST["kichthuocsize_".$i."_".$j]));
			
		}
	$i++;	
	}
	while(isset($_POST["mau_".$i]));
	
}
unset($_POST['uploadsanpham']);echo "<br>";
 
}


?>


<div class="container">
<div class="row">
<?php require("menu.php");?>
</div>
<form action="" method="post" enctype="multipart/form-data" id="formuploadsanpham" onsubmit="return checkbeforesubmit()">
<br>
<div style="float:left" id="textchuaidsanpham">idsanpham:</div> <input style="float:left" id="idsanpham" type="text" name="idsanpham"></input>
<div id="div_check" onclick="searchfunction()" style="border:black 2px">check</div>
<br><br><br>	
<div class="thongtinchung">

<div contenteditable="false" ondblclick="this.contentEditable=true;" onblur="this.contentEditable=false;" id="hienthi_tensanpham"></div>
<div id="hienthi_idsanpham"></div>
<div contenteditable="false" ondblclick="this.contentEditable=true;" onblur="this.contentEditable=false;"  id="hienthi_giasanpham"></div>
<div contenteditable="false" ondblclick="this.contentEditable=true;" onblur="this.contentEditable=false;"  id="hienthi_ngaybansanpham"></div>
<div id="hienthi_anhsanpham"></div>
<div id="file_anhmaumoi"></div>

<div id="hienthi_soluong" class="divsizesoluong"></div>
</div>
<br>
<div class="bangmau">
	<div class="mau">
		<span><span >màu : </span><img class="anhdiadienchomau" src="../cacmau/trắng.png" width="25" height="25" padding-top="20px" padding-right= "2px" padding-bottom="2px" padding-left="2px"></span>
		<select class="select_mau" name="mau_1" form="formuploadsanpham" onchange="doimau(this)">
		 <?php 

		$mau=laydanhsachmau($conn);
		while($mau_row=mysqli_fetch_array($mau)){
		?>
		<option value="<?php echo $mau_row["tenmau"];?>"> <?php echo $mau_row["tenmau"];?></option>
		<?php
	
		}

		?>
		</select>
		
		<span>chọn ảnh : </span><input type="file"  onchange="thaydoianh(this)" name="anhminhhoa_1">
		
		<div class="bangsize">
			<div class="taphopsize">
				<div class="size">
				<span>sizes : </span><input type="text" value="" name="kichthuocsize_1_1">
				<span> số lượng :</span><input type="text" value="" name="soluong_1_1">
				</div>
			</div>
		
			<input type="button" class="themsize" value="thêm size" name="btn-themsize_1" onclick="themformsize(this)"/>
		</div>
	
	</div>

</div>
<br/>
<script>
		function xetdefaultcacmau(){
			var colors=document.getElementsByClassName("mau");
			for(i=0;i<colors.length;i++){
				colors[i].children[0].children[1].src="../cacmau/"+colors[i].children[1].value.toLowerCase()+".png";
			}	}
		xetdefaultcacmau();
		</script>
<input  type="button" class="btnthemmau" value="thêm màu" name="themmau" onclick="themformmau()" id="themmau">
	
	
	<br>

	
    <input type="submit" class="btnuploadsanpham" value="Upload sản phẩm" name="uploadsanpham">
</form>




</div>


<script language="javascript" >

function doimau(select){
	select.setAttribute("style","background-color:none");
	var span=select.previousElementSibling;
	var img=span.children[1];
	img.src="../cacmau/"+ ((select.value).toLowerCase())+".png";
	
}
function themformmau(){
		
	
	var bangmau=document.getElementsByClassName("bangmau")[0];

	var mau=bangmau.lastElementChild;
	var mauadd=mau.cloneNode();
	// children 1
	mauadd.appendChild(mau.children[0].cloneNode(true));
	// children 2
	var noidungmau=mau.children[1].cloneNode(true);
	var splitten=noidungmau.name.split("_");
	noidungmau.name=splitten[0]+"_"+(parseInt(splitten[1])+1).toString();
	mauadd.appendChild(noidungmau);
	//children 3
	mauadd.appendChild(mau.children[2].cloneNode(true));
	//alert(mau.children[2].cloneNode(true).innerHTML);
	// children 4
	var anh=mau.children[3].cloneNode();
	//alert(anh.name);
	
		splitten=anh.name.split("_");
	anh.name=splitten[0]+"_"+(parseInt(splitten[1])+1).toString();
	mauadd.appendChild(anh);
//children 5
	var bangsize=mau.children[4].cloneNode();
	var taphopsize=mau.children[4].children[0].cloneNode();
	var size=mau.children[4].children[0].children[0].cloneNode(true);
	splitten=size.children[1].name.split("_");
	size.children[1].name=splitten[0]+"_"+(parseInt(splitten[1])+1).toString()+"_1";
	splitten=size.children[3].name.split("_");
	size.children[3].name=splitten[0]+"_"+(parseInt(splitten[1])+1).toString()+"_1";
	taphopsize.appendChild(size);
	bangsize.appendChild(taphopsize);
	
	var btnthemsize=mau.children[4].children[1].cloneNode(true);
	splitten=btnthemsize.name.split("_");
	btnthemsize.name=splitten[0]+"_"+(parseInt(splitten[1])+1).toString();
	
bangsize.appendChild(btnthemsize);
mauadd.appendChild(bangsize);
bangmau.appendChild(mauadd);
	xetdefaultcacmau();
}
function themformsize(addbtn){
var bangsize=addbtn.parentNode;
var taphopsize=bangsize.firstElementChild;
var size=taphopsize.lastElementChild;
var first=size.firstElementChild.cloneNode(true);
var kichthuocsize=size.firstElementChild.nextSibling.cloneNode(true);
var third=size.children[2].cloneNode(true);
var soluong=size.lastElementChild.cloneNode(true);
var splitten=kichthuocsize.name.split("_");

kichthuocsize.name=splitten[0]+"_"+splitten[1]+"_"+(parseInt(splitten[2])+1).toString();
if(!isNaN(parseInt(kichthuocsize.value)))
kichthuocsize.value=(parseInt(kichthuocsize.value)+1).toString();
else kichthuocsize.value="";
splitten=soluong.name.split("_");
soluong.name=splitten[0]+"_"+splitten[1]+"_"+(parseInt(splitten[2])+1).toString();

var sizeadd=size.cloneNode();
sizeadd.appendChild(first);
sizeadd.appendChild(kichthuocsize);
sizeadd.appendChild(third);
sizeadd.appendChild(soluong);
taphopsize.appendChild(sizeadd);
return true;
}

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>