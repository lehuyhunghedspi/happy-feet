<?php 
function danhsachcacgiaydabanhet($conn){
	$qr="
select distinct giay.* from sizemau,giay where giay.idgiay=sizemau.giay_idgiay and sizemau.soluongbandau<=0
	";
	//echo $qr;
	return mysqli_query($conn,$qr);
	
	
}
function danhsachcacanh($conn,$idgiay){
	$qr="SELECT * FROM `sizemau`,mau WHERE giay_idgiay=".$idgiay." and sizemau.mau_idmau=mau.idmau GROUP by mau_idmau";
	return mysqli_query($conn,$qr);
}
?>