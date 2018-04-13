<?php 

function ketquatimkiemtheoid($conn,$idsanpham){
	$qr="SELECT * FROM  `giay` where idgiay=".$idsanpham.";";
	//echo $qr;
	return mysqli_query($conn,$qr);
}

function thongtinchungtheoten($conn,$ten){
	$qr="SELECT * FROM  `giay`;";
	return mysqli_query($conn,$qr);
}

function laydanhsachtenmauquaidgiay($conn,$id){
	$qr="SELECT distinct tenmau FROM  `sizemau`,`mau` where sizemau.mau_idmau=mau.idmau and giay_idgiay=".$id.";";
	
	return mysqli_query($conn,$qr);
}
?>