<?php 
$conn;
require("../../lib/connectdb.php");
if(isset($_POST['iddonhang'])){
	$qr="UPDATE `donhang` SET `ngaynhando`=now() WHERE iddonhang=".$_POST['iddonhang'];
	mysqli_query($conn,$qr);
	echo 'success';
	
}
else echo 'error';


?>