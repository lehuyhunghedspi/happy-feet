<?php 
$conn;
require("../../lib/connectdb.php");


$query="INSERT INTO `nguoidung`(`idnguoidung`, `email`, `tendangnhap`, `matkhau`, `sodienthoai`, `mucquyen`, `ngayhetbiband`) 

VALUES";
for($i=0;$i<10000;$i++){
	
$query=$query."(NULL,'user_".$i."@gmail.com','user_".$i."','123','016959".$i."','0',null),";
}
$query=$query."(NULL,'user_".$i."@gmail.com','user_".$i."','123','016959".$i."','0',null);";
echo $query;
mysqli_query($conn,$query);
?>