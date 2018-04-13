<?php 

//phpinfo();

//phpinfo();

$conn;
require("../../lib/connectdb.php");

$danhsachidsizemau=mysqli_query($conn,"select idsizemau from sizemau");
$idsizemauarray=array();
while($row=mysqli_fetch_array($danhsachidsizemau)){
	$idsizemauarray[]=$row["idsizemau"];
	
}
echo $idsizemauarray[123];
function laygia($conn,$idsizemau){
	$query="select giaban as giaban from giay,sizemau 
	where giay.idgiay=sizemau.giay_idgiay and idsizemau=$idsizemau";
	while($row=mysqli_fetch_array(mysqli_query($conn,$query)))
	{
		
	return $row["giaban"];
	}
}
 echo "giá sản phẩm ".laygia($conn,3233);

$query="INSERT INTO `giaodich` (`idgiaodich`, `sizemau_idsizemau`, `donhang_iddonhang`, `soluong`, `giabanlucgiaodich`, `iscancel`) VALUES";

$danhsachdonhangchuacogiaodich=mysqli_query($conn,"select iddonhang from donhang where iddonhang not in (select donhang_iddonhang from giaodich);");
while($iddonhang_row=mysqli_fetch_array($danhsachdonhangchuacogiaodich))
{
	$ramdomsoluonggiaodich=mt_rand() / mt_getrandmax();
	if(0<$ramdomsoluonggiaodich and $ramdomsoluonggiaodich <0.7) $ramdomsoluonggiaodich=1;
	else if($ramdomsoluonggiaodich<0.9) $ramdomsoluonggiaodich=2;
	else {$ramdomsoluonggiaodich=3;}
	for($i=0;$i<$ramdomsoluonggiaodich;$i++){
		$idsm=$idsizemauarray[rand(0,sizeof($idsizemauarray)-1)];
		echo $idsm." ".laygia($conn,$idsm).'<br>';
		mysqli_query($conn,$query."
				 (NULL,
				 '".$idsm."',
				 '".$iddonhang_row['iddonhang']."',
				 '".rand(1,3)."',
				 '".laygia($conn,$idsm)."',
				 '0')");
				
				 
	}
	
}
echo $query;
mysqli_query($conn,$query);




?>