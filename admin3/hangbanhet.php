<?php 
$conn;
require("../lib/connectdb.php");
require("lib/hangbanhetsql.php");


?>


<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8"> 
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

 
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/hangbanhet.css">
<script language="javascript">
function xemchitietsanpham(row){
	
	 window.open('themsizesoluong.php?idsanpham='+row.getElementsByClassName('idsanpham')[0].innerHTML);
}
</script>
</head>
<body>


<div class="container">
<div class="row">
<?php require("menu.php");?>
</div>
<br><br>
<div class="row">
<h3 color="red">Danh sách các hàng gặp cảnh báo </h3></div>
<div class="row">
<table id="banghangbanhet" style="background-color:white">
<tr id="dongheadercuabang">
<th>id</th> <th>tên sản phẩm</th><th>hình minh họa</th><th>giá bán </th><th>ngày bán</th></tr>
<?php 
$danhsachcachangbanhet=danhsachcacgiaydabanhet($conn);
while($danhsachcachangbanhet_row=mysqli_fetch_array($danhsachcachangbanhet))
{?>
<tr class="cacdongchuasanpham" onclick="xemchitietsanpham(this)">
<td class="idsanpham"><?php echo $danhsachcachangbanhet_row['idgiay'];  ?></td><td class="tensanpham"><?php echo $danhsachcachangbanhet_row['ten']; ?></td>

<td class="chuahinhminhhoa">
<?php 
$danhsachcacanh=danhsachcacanh($conn,$danhsachcachangbanhet_row['idgiay']);
while($danhsachcacanh_row=mysqli_fetch_array($danhsachcacanh)){
?>
	<img class="hinhminhhoa" src="../anhminhhoa/<?php echo $danhsachcachangbanhet_row['idgiay'].'_'.$danhsachcacanh_row['tenmau'].'.jpeg'?>">
<?php }?>	
</td>
<td class="gia"><?php echo $danhsachcachangbanhet_row['giaban'];?></td><td class="ngayban"><?php echo $danhsachcachangbanhet_row['ngayban'];?></td></tr>
<?php }?>
</table>

</div>

<br>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>