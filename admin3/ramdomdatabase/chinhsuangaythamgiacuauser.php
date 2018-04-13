<?php 
$conn;
require("../../lib/connectdb.php");


$query="UPDATE `nguoidung` SET `ngaythamgia`=[value-8]where 1";
	
$datestart = strtotime('2015-11-1');//you can change it to your timestamp;
$dateend = strtotime('2017-12-29');//you can change it to your timestamp;
$daystep = 86400;

$resultidnguoidung=mysqli_query($conn,"select idnguoidung from nguoidung");
$count=0;
$ngaythamgia=0;
while($row=mysqli_fetch_array($resultidnguoidung)){
	$count++;
	if($count%6==0){
		$ngaythamgia=ceil(  stats_rand_gen_normal( strtotime('2015-1-1') , $daystep*50 ));
	}
	else if($count%6==1){
		
		$ngaythamgia=ceil(  stats_rand_gen_normal( strtotime('2016-1-1') , $daystep*50 ));
	}
	else if($count%6==2){
		
		$ngaythamgia=ceil(  stats_rand_gen_normal( strtotime('2017-1-1') , $daystep*50 ));
	}
	else if($count%6==3){
		
		$ngaythamgia=ceil(  stats_rand_gen_normal( strtotime('2015-8-1') , $daystep*120 ));
	}
	else if($count%6==4){
		
		$ngaythamgia=ceil(  stats_rand_gen_normal( strtotime('2016-8-1') , $daystep*120 ));
	}
	else if($count%6==5){
		
		$ngaythamgia=ceil(  stats_rand_gen_normal( strtotime('2017-8-1') , $daystep*120 ));
	}
	//echo date("Y-m-d",$ngaythamgia).'<br>';
$query="UPDATE `nguoidung` SET `ngaythamgia`='".date("Y-m-d",$ngaythamgia)."'
		where idnguoidung=".$row['idnguoidung'].";";
//echo $query;		
		mysqli_query($conn,$query);
}
?>