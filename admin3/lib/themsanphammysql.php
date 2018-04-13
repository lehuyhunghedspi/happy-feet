<?php 

function laydanhsachchatlieu($conn){
	$qr="SELECT * FROM  `chatlieu`;";
	return mysqli_query($conn,$qr);
	
}

function laydanhsachkieugiay($conn){
	$qr="SELECT * FROM  `kieugiay`;";
	return mysqli_query($conn,$qr);
	
}
function laydanhsachloaigot($conn){
	$qr="SELECT * FROM  `loaigot`;";
	return mysqli_query($conn,$qr);
	
}

function laydanhsachloaimui($conn){
	$qr="SELECT * FROM  `loaimui`;";
	return mysqli_query($conn,$qr);
	
}
function laydanhsachmau($conn){
	$qr="SELECT * FROM  `mau`;";
	return mysqli_query($conn,$qr);
	
}
function laydanhsachmucdich($conn){
	$qr="SELECT * FROM  `mucdich`;";
	return mysqli_query($conn,$qr);
	
}

function themthongtinchung($conn,$ten,$giaban,$docaocuade,$idloaimui,$idchatlieu,$idkieugiay,$idloaigot){
	
	
	$qr="INSERT INTO `giay`(`idgiay`, `ten`, `giaban`, `ngayban`, `docaocuade`, `loaimui_idloaimui`, `chatlieu_idchatlieu`, `kieugiay_idkieugiay`, `loaigot_idloaigot`) VALUES (null,'".$ten."',".$giaban.",CURRENT_TIMESTAMP,".$docaocuade.",".$idloaimui.",".$idchatlieu.",".$idkieugiay.",".$idloaigot.");";
	//echo $qr;
	$issuccess=mysqli_query($conn,$qr);
	if($issuccess){return mysqli_insert_id($conn);}
	else echo "failed to insert";
		
	
	
}

function themmucdich($conn,$idmucdich,$idhang){
	$qr="INSERT INTO `mucdich_cua_giay`(`mucdich_idmucdich`, `giay_idgiay`) VALUES (".$idmucdich.",".$idhang.")";
	//echo $qr;
	return mysqli_query($conn,$qr);
	
	
}
function themsizemau($conn,$idmau,$size,$soluong,$idgiay){
	$qr="INSERT INTO `sizemau`(`idsizemau`, `mau_idmau`, `size`, `soluongbandau`, `giay_idgiay`) VALUES (null,".$idmau.",".$size.",".$soluong.",".$idgiay.");";
//	echo $qr;
	return mysqli_query($conn,$qr);
	
	
}

function layidmau($conn,$tenmau){
	$qr="select * from mau where tenmau='".$tenmau."';";
//	echo $qr;
	return (mysqli_fetch_array(mysqli_query($conn,$qr)))["idmau"];
	
}
?>