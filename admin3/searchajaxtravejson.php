
<?php
 $conn;
require("../lib/connectdb.php");
require("lib/themsizesoluongsql.php");

function laythongtinchung($conn,$id){
	$qr="SELECT * FROM `giay` WHERE idgiay=".$id.";";
	//echo $qr;
	return mysqli_query($conn,$qr);
	
}

function laydanhsachmaucuamotgiay($conn,$id){
	$qr="SELECT idmau,tenmau FROM `mau`,`sizemau` WHERE giay_idgiay=".$id." and mau_idmau=idmau group by idmau;";
	//echo $qr;
	
	return mysqli_query($conn,$qr);
	
}

// function danhsachanh($conn,$idgiay){
	// $qr="SELECT idmau,tenmau FROM `mau`,`sizemau` WHERE giay_idgiay=".$idgiay." and mau_idmau=idmau group by idmau;";
	//echo $qr;
	// $mau=mysqli_query($conn,$qr);
	// $danhsachanh=array();
	// while($mau_row=mysqli_fetch_array($mau)){
		// array_push($danhsachanh,(string)('"'.$idgiay.'_'.$mau_row["tenmau"].'"'));
	// }
	// return join(",",$danhsachanh);
// }
 {
	 
	 // if(isset($_POST["idsanpham"]))	
// {
	// $ketqua=mysqli_fetch_array(thongtinchungtheoten($conn,$_POST["idsanpham"]));
	// if(isset($ketqua)){
		// $result
		// $danhsachmau=laydanhsachtenmauquaidgiay($conn,$_POST["idsanpham"]);
		// while($danhsachmau_row=mysqli_fetch_array($danhsachmau)){
			
		// }
			
	// }
	// else{
		// echo "không có kết quả tìm kiếm";
	// }
	
// }
// else if(isset($_POST["tensanpham"])){
	
	
// }
 }	

 function mang_chua_anh($conn,$idgiay){
	 $qr="SELECT idmau,tenmau FROM `mau`,`sizemau` WHERE giay_idgiay=".$idgiay." and mau_idmau=idmau group by idmau;";
	//echo $qr;
	$mau=mysqli_query($conn,$qr);
	$danhsachanh=array();
	while($mau_row=mysqli_fetch_array($mau)){
		array_push($danhsachanh,(string)($idgiay.'_'.$mau_row["tenmau"]));
	}
	return $danhsachanh;
 }
 
 function mang_sizesoluong($conn,$idgiay){
	 $qr="SELECT idmau,tenmau FROM `mau`,`sizemau` WHERE giay_idgiay=".$idgiay." and mau_idmau=idmau group by idmau;";
	//echo $qr;
	$mau=mysqli_query($conn,$qr);
	$mang_sizesoluong=array();
	while($mau_row=mysqli_fetch_array($mau)){
		$phantu_sizesoluong=array();
		$phantu_sizesoluong['idmau']=$mau_row['idmau'];
		$phantu_sizesoluong['tenmau']=$mau_row['tenmau'];
		$phantu_sizesoluong['size']=array();
		
		$qr1="SELECT size,soluongbandau
		FROM `mau`,`sizemau`
		WHERE giay_idgiay=".$idgiay." and mau_idmau=idmau and idmau=".$mau_row['idmau'];
		//echo $qr1.'<br>';
		$size=mysqli_query($conn,$qr1);
		while($size_row=mysqli_fetch_array($size)){
			$phantu_size=array();
			
			$phantu_size["kichthuocsize"]=$size_row["size"];
				$phantu_size["soluong"]=$size_row["soluongbandau"];
			
			array_push($phantu_sizesoluong['size'],$phantu_size);
			
		}
		
			
		array_push($mang_sizesoluong,$phantu_sizesoluong);
	}
	return $mang_sizesoluong;
	 
 }
 
 
 if(isset($_POST["idsanpham"]))
$idsanpham=$_POST["idsanpham"];
else $idsanpham=4;
 
$thongtinchung=mysqli_fetch_array(laythongtinchung($conn,$idsanpham));
$danhsachcacmau=mysqli_fetch_array(laydanhsachmaucuamotgiay($conn,$idsanpham));
{
// echo 
// '
// {"ten":"'.$thongtinchung["ten"].'",
// "id":"'.$thongtinchung["idgiay"].'",
// "gia":"'.$thongtinchung["giaban"].'",
// "ngayban":"'.$thongtinchung["ngayban"].'",
// "anh":['.danhsachanh($conn,$thongtinchung["idgiay"]).'],
// "sizesoluong":[
			// {"idmau":"6","tenmau":"\u0111en",
			// "size":[
					// {"kichthuocsize":"35","soluong":"6"},
					// {"kichthuocsize":"38","soluong":"6"},
					// {"kichthuocsize":"39","soluong":"6"},
					// {"kichthuocsize":"37","soluong":"6"}]},
			// {"idmau":"3","tenmau":"h\u1ed3ng",
			// "size":[{"kichthuocsize":"35","soluong":"6"},
			// {"kichthuocsize":"36","soluong":"6"},
			// {"kichthuocsize":"37","soluong":"6"},
			// {"kichthuocsize":"38","soluong":"6"}]}]
// }
// ';
}

$result=array(
	'ten'=>$thongtinchung["ten"],
	'id'=>$thongtinchung["idgiay"],
	'gia'=>$thongtinchung["giaban"],
	'ngayban'=>$thongtinchung["ngayban"],
	'anh'=>mang_chua_anh($conn,$thongtinchung["idgiay"]),
	'sizesoluong'=>mang_sizesoluong($conn,$thongtinchung["idgiay"])
);
echo (json_encode($result));

// array(
						// array(
						// 'idmau'=>'6',
						// 'tenmau'=>'đen',
						// 'size'=>array(
								// array(
									// 'kichthuocsize'=>'35',
									// 'soluong'=>'6'
								// ),
								// array(
									// 'kichthuocsize'=>'38',
									// 'soluong'=>'6'
								// ),
								// array(
									// 'kichthuocsize'=>'39',
									// 'soluong'=>'6'
								// ),
								// array
								// (
									// 'kichthuocsize'=>'37',
									// 'soluong'=>'6'
								// )
								// )
						
							// ),	
						// array(
						// 'idmau'=>'3',
						// 'tenmau'=>'hồng',
						// 'size'=>array(
								// array(
									// 'kichthuocsize'=>'35',
									// 'soluong'=>'6'
								// ),
								// array(
									// 'kichthuocsize'=>'36',
									// 'soluong'=>'6'
								// ),
								// array(
									// 'kichthuocsize'=>'37',
									// 'soluong'=>'6'
								// ),
								// array
								// (
									// 'kichthuocsize'=>'38',
									// 'soluong'=>'6'
								// )
								// )
						
							// )							
					// )
?>


