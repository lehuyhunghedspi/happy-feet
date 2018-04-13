<?php 
$conn;
require("../lib/connectdb.php");
require("lib/donhangchuagiaosql.php");


?>


<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8"> 
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

 
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/donhangchuagiao.css">

</head>
<body>


<div class="container">
<div class="row">
<?php require("menu.php");?>
</div>
<br><br>
<h3>danh sách các đơn hàng chưa giao cho bên vận chuyển </h3>
<div class="row">
<table id="tablecacdonhangchuaguido">
<tr>
	<th>id đơn hàng</th>
	<th>địa chỉ</th>
	<th>ngày mua</th>
	<th style="padding:0px">

		<table style="border:0px">
		<tr style="border:0px"><td style="border:0px">sản phẩm</td></tr>
		<tr style="border:0px">
			<td style="border:0px;padding:0px;"><table>
				<tr><td class="idgiay" style="border:0px">id giày</td>
					<td class="tengiay">tên</td>
					<td class="sizegiay">size</td>
					<td class="maugiay">màu</td>
					<td class="soluonggiay">số lượng</td>
				</tr></table></td>
		</tr>
		</table>

	</th>
</tr>
<?php
$danhsachcacdonhangchuagiao=danhsachcacdonhangchuagui($conn);
while($danhsachcacdonhangchuagiao_row=mysqli_fetch_array($danhsachcacdonhangchuagiao)){
 ?>

<tr><td ><?php echo $danhsachcacdonhangchuagiao_row['iddonhang']; ?></td><td><?php echo $danhsachcacdonhangchuagiao_row['diachichitiet'].' '.$danhsachcacdonhangchuagiao_row['tenquanhuyen'].' '.$danhsachcacdonhangchuagiao_row['tenthanhpho']; ?></td><td><?php echo $danhsachcacdonhangchuagiao_row['ngaymua'];?></td>
<td class="bangsanphamchuagiao"><table >
<?php 

$danhsachcacgiaythuocdonhang=danhsachcacgiaythuocdonhang($conn,$danhsachcacdonhangchuagiao_row['iddonhang']);
while($danhsachcacgiaythuocdonhang_row=mysqli_fetch_array($danhsachcacgiaythuocdonhang))
{
?>
<tr ><td class="idgiay"><?php echo $danhsachcacgiaythuocdonhang_row['idgiay'];?></td><td class="tengiay"><?php echo $danhsachcacgiaythuocdonhang_row['ten'];?></td><td class="sizegiay"><?php echo $danhsachcacgiaythuocdonhang_row['size'];?></td><td class="maugiay"><?php echo $danhsachcacgiaythuocdonhang_row['tenmau'];?></td><td class="soluonggiay"><?php echo $danhsachcacgiaythuocdonhang_row['soluong'];?></td></tr>
<?php } ?>																														
							</table></td>
</tr>
<?php }?>
</table>
</div>

<br>
<h3>danh sách các đơn hàng đang vận chuyển dở</h3>
<div class="row">
<table id="tablecacdonhanchuagiaohang">
<tr>
	<th>id đơn hàng</th>
	<th>địa chỉ</th>
	<th>ngày mua</th>
	<th style="padding:0px">

		<table style="border:0px">
		<tr style="border:0px"><td style="border:0px">sản phẩm</td></tr>
		<tr style="border:0px">
			<td style="border:0px;padding:0px;"><table>
				<tr><td class="idgiay" style="border:0px">id giày</td>
					<td class="tengiay">tên</td>
					<td class="sizegiay">size</td>
					<td class="maugiay">màu</td>
					<td class="soluonggiay">số lượng</td>
				</tr></table></td>
		</tr>
		</table>

	</th>
</tr>


<?php
$danhsachcacdonhangchuagiao=danhsachcacdonhangchuagiao($conn);
while($danhsachcacdonhangchuagiao_row=mysqli_fetch_array($danhsachcacdonhangchuagiao)){
 ?>

<tr><td ><?php echo $danhsachcacdonhangchuagiao_row['iddonhang']; ?></td><td><?php echo $danhsachcacdonhangchuagiao_row['diachichitiet'].' '.$danhsachcacdonhangchuagiao_row['tenquanhuyen'].' '.$danhsachcacdonhangchuagiao_row['tenthanhpho']; ?></td><td><?php echo $danhsachcacdonhangchuagiao_row['ngaymua'];?></td>
<td class="bangsanphamchuagiao"><table >
<?php 

$danhsachcacgiaythuocdonhang=danhsachcacgiaythuocdonhang($conn,$danhsachcacdonhangchuagiao_row['iddonhang']);
while($danhsachcacgiaythuocdonhang_row=mysqli_fetch_array($danhsachcacgiaythuocdonhang))
{
?>
<tr ><td class="idgiay"><?php echo $danhsachcacgiaythuocdonhang_row['idgiay'];?></td><td class="tengiay"><?php echo $danhsachcacgiaythuocdonhang_row['ten'];?></td><td class="sizegiay"><?php echo $danhsachcacgiaythuocdonhang_row['size'];?></td><td class="maugiay"><?php echo $danhsachcacgiaythuocdonhang_row['tenmau'];?></td><td class="soluonggiay"><?php echo $danhsachcacgiaythuocdonhang_row['soluong'];?></td></tr>
<?php } ?>																														
							</table></td>
</tr>
<?php }?>


</table>
</div>
<br><br>

<h3>danh sách các đơn hàng chưa nhận tiền</h3>
<div class="row">
<table id="tablecacdonhangchuagiaotien">
<tr>
	<th>id đơn hàng</th>
	<th>địa chỉ</th>
	<th>ngày mua</th>
	<th style="padding:0px">

		<table style="border:0px">
		<tr style="border:0px"><td style="border:0px">sản phẩm</td></tr>
		<tr style="border:0px">
			<td style="border:0px;padding:0px;"><table>
				<tr><td class="idgiay" style="border:0px">id giày</td>
					<td class="tengiay">tên</td>
					<td class="sizegiay">size</td>
					<td class="maugiay">màu</td>
					<td class="soluonggiay">số lượng</td>
				</tr></table></td>
		</tr>
		</table>

	</th>
</tr>
<?php
$danhsachcacdonhangchuagiao=danhsachcacdonhangchuagui($conn);
while($danhsachcacdonhangchuagiao_row=mysqli_fetch_array($danhsachcacdonhangchuagiao)){
 ?>

<tr><td ><?php echo $danhsachcacdonhangchuagiao_row['iddonhang']; ?></td><td><?php echo $danhsachcacdonhangchuagiao_row['diachichitiet'].' '.$danhsachcacdonhangchuagiao_row['tenquanhuyen'].' '.$danhsachcacdonhangchuagiao_row['tenthanhpho']; ?></td><td><?php echo $danhsachcacdonhangchuagiao_row['ngaymua'];?></td>
<td class="bangsanphamchuagiao"><table >
<?php 

$danhsachcacgiaythuocdonhang=danhsachcacgiaythuocdonhang($conn,$danhsachcacdonhangchuagiao_row['iddonhang']);
while($danhsachcacgiaythuocdonhang_row=mysqli_fetch_array($danhsachcacgiaythuocdonhang))
{
?>
<tr ><td class="idgiay"><?php echo $danhsachcacgiaythuocdonhang_row['idgiay'];?></td><td class="tengiay"><?php echo $danhsachcacgiaythuocdonhang_row['ten'];?></td><td class="sizegiay"><?php echo $danhsachcacgiaythuocdonhang_row['size'];?></td><td class="maugiay"><?php echo $danhsachcacgiaythuocdonhang_row['tenmau'];?></td><td class="soluonggiay"><?php echo $danhsachcacgiaythuocdonhang_row['soluong'];?></td></tr>
<?php } ?>																														
							</table></td>
</tr>
<?php }?>
</table>
</div>

</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>