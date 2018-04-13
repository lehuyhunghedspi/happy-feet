
<?php 


$conn;
require("../../lib/connectdb.php");
?>

<?php
// in ra số lượng giao dịch theo từng ngày

$ngay=30;
$thang=$_GET['thang'];
$nam=$_GET['nam'];

{
	if($thang!=-1){
		$query = "
 SELECT concat(extract(day from ngaymua),'-',extract(month from ngaymua),'-',	extract(year from ngaymua)) as ngaymua,count(*) as soluongdonhang
  FROM donhang,giaodich
  where donhang.iddonhang=giaodich.donhang_iddonhang and extract(year from ngaymua)=".$nam." and extract(month from ngaymua)=".$thang."
  group by extract(day from ngaymua)
  ORDER BY ngaymua ASC";
	}
	else{
$query = "
 SELECT ngaymua as ngaymua,count(distinct 	idgiaodich) as soluongdonhang
  FROM donhang,giaodich
  where donhang.iddonhang=giaodich.donhang_iddonhang and extract(year from ngaymua)=".$nam." 
  group by ceil(datediff(ngaymua,'2015-01-01')/10)
  ORDER BY ngaymua ASC";
		
	}

// $result = mysqli_query($conn,$query);

// $query = "SELECT extract(day from ngaymua) as ngaymua,count(DISTINCT iddonhang) as soluongdonhang,sum(giaodich.soluong) as soluonghangbanra
  // FROM donhang,giaodich
  // where donhang.iddonhang=giaodich.donhang_iddonhang and extract(month from ngaymua)=$thang and extract(year from ngaymua)=$nam
  // group by extract(day from ngaymua) ORDER BY ngaymua ASC;";
$result = mysqli_query($conn,$query);
//echo $query;
// All good?
if ( !$result ) {
  // Nope
  $message = 'Whole query: ' .$query;
  die( $message );
}

//header( 'Content-Type: application/json' );

// Print out rows
$count=0;
$data = array();
while ( $row = mysqli_fetch_array($result)) {
	$data_row=array();
	$data_row['ngaymua']=$row['ngaymua'];
	//$data_row['soluonghangbanra']=$row['soluonghangbanra'];
	$data_row['soluongdonhang']=$row['soluongdonhang'];
	
	  $data[] = $data_row;
$count++;
}
//echo $count;
echo json_encode( $data );
// Close the connection
mysqli_close($conn);
	
}

 ?>