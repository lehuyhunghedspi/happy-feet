	<?php 

function tongsoluongdonhang($conn,$nam,$thang){
	$qr="SELECT count(*) as tongso FROM `donhang` where extract(month from ngaymua) =$thang and extract(year from ngaymua)=$nam";
	//echo $qr;
	$result=mysqli_query($conn,$qr);
	while($row=mysqli_fetch_array($result) ){
	return $row['tongso'];
	}
	
}

function sokhachhangquaylai($conn,$nam,$thang){
	$qr="SELECT count( DISTINCT hientai.nguoidung_idnguoidung) as tongso FROM `donhang`as hientai,donhang as quakhu where quakhu.ngaymua<hientai.ngaymua and extract(year from hientai.ngaymua)=$nam and extract(month from hientai.ngaymua) =$thang and quakhu.nguoidung_idnguoidung=hientai.nguoidung_idnguoidung";
	//echo $qr;
	$result=mysqli_query($conn,$qr);
	while($row=mysqli_fetch_array($result) ){
	return $row['tongso'];
	}
	
}

function tongsokhachang($conn){
	$qr="select count(distinct nguoidung_idnguoidung) as tongso from donhang";
	//echo $qr;
	$result=mysqli_query($conn,$qr);
	while($row=mysqli_fetch_array($result) ){
	return $row['tongso'];
	}
	
}



function tongsokhachangmoi($conn,$nam,$thang){
	$qr="select count(gr.tongso) as tongso from (select count(nguoidung_idnguoidung) as tongso from donhang where extract(month from ngaymua)=$thang and extract(year from ngaymua)=$nam group by nguoidung_idnguoidung having count(*)=1) as gr";
	//echo $qr;
	$result=mysqli_query($conn,$qr);
	while($row=mysqli_fetch_array($result) ){
	return $row['tongso'];
	}
	
}
function tongsoluongdangkymoi($conn,$nam,$thang){
	$qr="select count(*	) as tongso from nguoidung where extract(year from ngaythamgia)=$nam and extract(month from ngaythamgia) =$thang";
	//echo $qr;
	$result=mysqli_query($conn,$qr);
	while($row=mysqli_fetch_array($result) ){
	return $row['tongso'];
	}
	
}



?>