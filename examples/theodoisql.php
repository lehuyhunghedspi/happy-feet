<?php 
function danhsachcacdonhangchuagui($conn,$idnguoidung){
	$qr="SELECT `donhang`.`iddonhang`,`donhang`.`ngaymua`,`donhang`.`diachichitiet`,`donhang`.`ngayguido`,`donhang`.`ngaynhando`, `ngaynhantien`, `nguoidung_idnguoidung`, quanhuyen.tenquanhuyen,thanhpho.tenthanhpho 
	FROM `donhang`,quanhuyen,thanhpho
	WHERE `donhang`.quanhuyen_idquanhuyen=quanhuyen.idquanhuyen and quanhuyen.idthanhpho=thanhpho.idthanhpho and (ngayguido is null) and nguoidung_idnguoidung=".$idnguoidung;
	//echo $qr;
	return mysqli_query($conn,$qr);
}
function danhsachcacgiaythuocdonhang($conn,$iddonhang){
	$qr="SELECT giaodich.soluong,giay.ten,giay.idgiay,sizemau.size,mau.tenmau FROM `giaodich`,sizemau,giay,mau 
	where mau.idmau=sizemau.mau_idmau and sizemau.giay_idgiay=giay.idgiay and sizemau.idsizemau=giaodich.sizemau_idsizemau and donhang_iddonhang=".$iddonhang;
	//echo $qr;
	return mysqli_query($conn,$qr);
}

function danhsachcacdonhangchuagiao($conn,$idnguoidung){
	$qr="SELECT `donhang`.`iddonhang`,`donhang`.`ngaymua`,`donhang`.`diachichitiet`,`donhang`.`ngayguido`,`donhang`.`ngaynhando`, `ngaynhantien`, `nguoidung_idnguoidung`, quanhuyen.tenquanhuyen,thanhpho.tenthanhpho 
	FROM `donhang`,quanhuyen,thanhpho
	WHERE `donhang`.quanhuyen_idquanhuyen=quanhuyen.idquanhuyen and quanhuyen.idthanhpho=thanhpho.idthanhpho and (ngayguido is not null) and (ngaynhando is null) and nguoidung_idnguoidung=".$idnguoidung;
	//echo $qr;
	return mysqli_query($conn,$qr);
}
?>