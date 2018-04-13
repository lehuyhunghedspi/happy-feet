<html>
<head></head>
<body>

<?php

$conn;
require("../../lib/connectdb.php");

 ?>
<?php 


function tangsoluong($conn,$idgiay,$idmau,$size,$soluongtang){
	
	$qr="UPDATE `sizemau` SET `soluongbandau`=`soluongbandau`+".$soluongtang." WHERE `giay_idgiay`=".$idgiay." and `mau_idmau`=".$idmau." and `size`=".$size.";";
	mysqli_query($conn,$qr);
	//echo 'tang so lương'.$qr.'<br>';
}

function themsoluong($conn,$idgiay,$idmau,$size,$soluongmoi){
	
	$qr='INSERT INTO `sizemau`(`idsizemau`, `giay_idgiay`, `mau_idmau`, `size`, `soluongbandau`) VALUES (null,'.$idgiay.','.$idmau.','.$size.','.$soluongmoi.')';
	mysqli_query($conn,$qr);
	//echo ' them số mới'.$qr.'<br>';
}
?>
<?php 


$json='{"ten":"SND giày cao gót","id":"4","gia":"100","ngayban":"21/12/2017",
"sizesoluong":[
{"idmau":"6","sizesotangthem":[
								{"size":"38","sotangthem":"2"},
								{"size":"39","sotangthem":"2"},
								{"size":"37","sotangthem":"2"}],
				"sizesomoi":[{"size":"40","soluongmoi":"3"},
				{"size":"41","soluongmoi":"1"}]},
{"idmau":"3","sizesotangthem":[
								{"size":"36","sotangthem":"1"},
								{"size":"37","sotangthem":"2"},
								{"size":"38","sotangthem":"2"}],
				"sizesomoi":[]}]}';

				$json=$_POST["json"];
				echo $json;
$json=json_decode($json,true);

for($i=0;$i<sizeof($json["sizesoluong"]);$i++){
	$phanmau= $json["sizesoluong"][$i];
	echo 'idmau: '.$phanmau["idmau"].'  ';
	// tăng số lượng
	{
		$sizesotangthem=$phanmau['sizesotangthem'];
		for($j=0;$j<sizeof($sizesotangthem);$j++){
		
		//echo 'size:'.$sizesotangthem[$j]["size"].'<br>';
		tangsoluong($conn,$json['id'],$phanmau["idmau"],$sizesotangthem[$j]["size"],$sizesotangthem[$j]["sotangthem"]);
		}
		
	}
	// thêm mới
	{
		$sizesomoi=$phanmau['sizesomoi'];
		for($j=0;$j<sizeof($sizesomoi);$j++){
		
		//echo 'size:'.$sizesomoi[$j]["size"].'<br>';
		themsoluong($conn,$json['id'],$phanmau["idmau"],$sizesomoi[$j]["size"],$sizesomoi[$j]["soluongmoi"]);
		}
		
	}
	
	
	
}



// if($_POST['json'])
// {

// echo"thanhcong";
// }
// else echo 'error';
?>
</body>
</html>