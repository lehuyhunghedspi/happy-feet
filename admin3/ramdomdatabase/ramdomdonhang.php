<?php 

//phpinfo();

//phpinfo();

$conn;
require("../../lib/connectdb.php");

	
$cacxa=array("Bắc Hồng "," Cổ Loa "," Đại Mạch "," Đông Hội "," Dục Tú "," Hải Bối "," Kim Chung "," Kim Nỗ "," Liên Hà "," Mai Lâm "," Nam Hồng "," Nguyên Khê "," Tầm Xá "," Thuỵ Lâm "," Tiên Dương "," Uy Nỗ "," Vân Hà "," Vân Nội "," Việt Hùng "," Vĩnh Ngọc "," Võng La "," Xuân Canh "," Xuân Nộn"
,"Đông Anh "," Đông Hòa "," Đông Hoàng "," Đông Khê "," Đông Minh "," Đông Nam "," Đông Ninh "," Đông Phú "," Đông Quang "," Đông Thanh "," Đông Thịnh "," Đông Tiến "," Đông Văn "," Đông Yên"
,"Bồ Đề "," Cự Khối "," Đức Giang "," Gia Thuỵ "," Giang Biên "," Long Biên "," Ngọc Lâm "," Ngọc Thuỵ "," Phúc Đồng "," Phúc Lợi "," Sài Đồng "," Thạch Bàn "," Thượng Thanh "," Việt Hưng ");

$ho=array("Nguyễn","Trần","Lê","Phạm","Hoàng","Phan","Vũ","Võ","Đặng","Bùi","Đỗ","Hồ","Ngô","Dương","Lý");
$tendem=array("Anh Việt","Bá","Bách","Bảo","Bích","Chi","Cường","Dũng","Duy","Gia","Giang","Hà","Hòa","Hoài","Hoàng","Hùng","Hương","Hữu","Huy","Khải","Khoa","Khôi","Lâm","Long",
"Mai","Mạnh","Minh","My","Nam","Nhật","Nhi","Phúc","Quang","Quế","Quốc","Tài","Tấn","Thanh","Trí","Trinh","Trung","Tuấn","Uy");




	
$datestart = strtotime('2015-11-1');//you can change it to your timestamp;
$dateend = strtotime('2017-12-29');//you can change it to your timestamp;
$daystep = 86400;
$datebetween = abs(($dateend - $datestart) / $daystep);

$danhsachnguoidung=mysqli_query($conn,"select idnguoidung from nguoidung");
$idnguoidungarray=array();
while($row=mysqli_fetch_array($danhsachnguoidung)){
	$idnguoidungarray[]=$row['idnguoidung'];
}

$danhsachnquanhuyen=mysqli_query($conn,"select idquanhuyen from quanhuyen");
$idquanhuyenarray=array();
while($row=mysqli_fetch_array($danhsachnquanhuyen)){
	$idquanhuyenarray[]=$row['idquanhuyen'];
}

$count=0;
$query="INSERT INTO `donhang`
(`iddonhang`, `ngaymua`, `diachichitiet`, `sdt`, `tennguoinhan`, `ngayguido`, `ngaynhando`, `ngaynhantien`, `quanhuyen_idquanhuyen`, `nguoidung_idnguoidung`)
 VALUES ";
for($i=0;$i<200;$i++){
	$ngaymua=ceil(  stats_rand_gen_normal( strtotime('2018-1-1') , $daystep*25 ));
	$query=$query."(NULL,
	'".date("Y-m-d H:m:s",  $ngaymua) ."',
	'xóm ".rand(1,8)." ".$cacxa[rand(0,sizeof($cacxa)-1)]."',
	'01234".rand(567891,999999)."',
	'".$ho[rand(0,sizeof($ho)-1)]." ".$tendem[rand(0,sizeof($tendem)-1)]." ".$tendem[rand(0,sizeof($tendem)-1)]."','
	".date("Y-m-d H:m:s",  $ngaymua+$daystep)."',' ".date("Y-m-d H:m:s",  $ngaymua+$daystep*2)."',' ".date("Y-m-d H:m:s",  $ngaymua+$daystep*3)."',
	'".$idquanhuyenarray[rand(0,sizeof($idquanhuyenarray)-1)]."',
	'".$idnguoidungarray[rand(0,sizeof($idnguoidungarray)-1)]."'),";
}
$ngaymua=ceil(  stats_rand_gen_normal( strtotime('2015-2-15') , $daystep*10 ));
	$query=$query."(NULL,
	'".date("Y-m-d H:m:s",  $ngaymua) ."',
	'xóm ".rand(1,8)." ".$cacxa[rand(0,sizeof($cacxa)-1)]."',
	'01234".rand(567891,999999)."',
	'".$ho[rand(0,sizeof($ho)-1)]." ".$tendem[rand(0,sizeof($tendem)-1)]." ".$tendem[rand(0,sizeof($tendem)-1)]."','
	".date("Y-m-d H:m:s",  $ngaymua+$daystep)."',' ".date("Y-m-d H:m:s",  $ngaymua+$daystep*2)."',' ".date("Y-m-d H:m:s",  $ngaymua+$daystep*3)."',
	'".$idquanhuyenarray[rand(0,sizeof($idquanhuyenarray)-1)]."',
	'".$idnguoidungarray[rand(0,sizeof($idnguoidungarray)-1)]."');";
//echo $query;
mysqli_query($conn,$query);




?>