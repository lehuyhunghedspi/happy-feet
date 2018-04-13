
<?php 
$conn;
require("../../lib/connectdb.php");
require("../lib/donhangchuagiaosql.php");


?>

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
	<th class="colbutton" >đã gửi</th>
</tr>
<?php
$danhsachcacdonhangchuagiao=danhsachcacdonhangchuagui($conn);
while($danhsachcacdonhangchuagiao_row=mysqli_fetch_array($danhsachcacdonhangchuagiao)){
 ?>

<tr><td class="iddonhang"><?php echo $danhsachcacdonhangchuagiao_row['iddonhang']; ?></td><td><?php echo $danhsachcacdonhangchuagiao_row['diachichitiet'].' '.$danhsachcacdonhangchuagiao_row['tenquanhuyen'].' '.$danhsachcacdonhangchuagiao_row['tenthanhpho']; ?></td><td><?php echo $danhsachcacdonhangchuagiao_row['ngaymua'];?></td>
<td class="bangsanphamchuagiao"><table >
<?php 

$danhsachcacgiaythuocdonhang=danhsachcacgiaythuocdonhang($conn,$danhsachcacdonhangchuagiao_row['iddonhang']);
while($danhsachcacgiaythuocdonhang_row=mysqli_fetch_array($danhsachcacgiaythuocdonhang))
{
?>
<tr ><td class="idgiay"><?php echo $danhsachcacgiaythuocdonhang_row['idgiay'];?></td><td class="tengiay"><?php echo $danhsachcacgiaythuocdonhang_row['ten'];?></td><td class="sizegiay"><?php echo $danhsachcacgiaythuocdonhang_row['size'];?></td><td class="maugiay"><?php echo $danhsachcacgiaythuocdonhang_row['tenmau'];?></td><td class="soluonggiay"><?php echo $danhsachcacgiaythuocdonhang_row['soluong'];?></td></tr>
<?php } ?>																														
							</table></td>
							<td class="colbutton" ><button class="buttonguihangthanhcong">đã nhận</button></td>
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
	<th class="colbutton">đã nhận</th>
</tr>


<?php
$danhsachcacdonhangchuagiao=danhsachcacdonhangchuagiao($conn);
while($danhsachcacdonhangchuagiao_row=mysqli_fetch_array($danhsachcacdonhangchuagiao)){
 ?>

<tr><td class="iddonhang"><?php echo $danhsachcacdonhangchuagiao_row['iddonhang']; ?></td><td><?php echo $danhsachcacdonhangchuagiao_row['diachichitiet'].' '.$danhsachcacdonhangchuagiao_row['tenquanhuyen'].' '.$danhsachcacdonhangchuagiao_row['tenthanhpho']; ?></td><td><?php echo $danhsachcacdonhangchuagiao_row['ngaymua'];?></td>
<td class="bangsanphamchuagiao"><table >
<?php 

$danhsachcacgiaythuocdonhang=danhsachcacgiaythuocdonhang($conn,$danhsachcacdonhangchuagiao_row['iddonhang']);
while($danhsachcacgiaythuocdonhang_row=mysqli_fetch_array($danhsachcacgiaythuocdonhang))
{
?>
<tr ><td class="idgiay"><?php echo $danhsachcacgiaythuocdonhang_row['idgiay'];?></td><td class="tengiay"><?php echo $danhsachcacgiaythuocdonhang_row['ten'];?></td><td class="sizegiay"><?php echo $danhsachcacgiaythuocdonhang_row['size'];?></td><td class="maugiay"><?php echo $danhsachcacgiaythuocdonhang_row['tenmau'];?></td><td class="soluonggiay"><?php echo $danhsachcacgiaythuocdonhang_row['soluong'];?></td></tr>
<?php } ?>																														
							</table></td>
							<td class="colbutton" ><button class="buttonnhanhangthanhcong">đã gửi</button></td>
</tr>
<?php }?>


</table>
</div>

<br>
<h3>danh sách các đơn hàng chưa nhận tiền</h3>
<div class="row">
<table id="tablecacdonhanchuanhantien">
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
	<th class="colbutton">đã nhận</th>
</tr>


<?php
$danhsachcacdonhangchuanhantien=danhsachcacdonhangchuanhantien($conn);
while($danhsachcacdonhangchuagiao_row=mysqli_fetch_array($danhsachcacdonhangchuanhantien)){
 ?>

<tr><td class="iddonhang"><?php echo $danhsachcacdonhangchuagiao_row['iddonhang']; ?></td><td><?php echo $danhsachcacdonhangchuagiao_row['diachichitiet'].' '.$danhsachcacdonhangchuagiao_row['tenquanhuyen'].' '.$danhsachcacdonhangchuagiao_row['tenthanhpho']; ?></td><td><?php echo $danhsachcacdonhangchuagiao_row['ngaymua'];?></td>
<td class="bangsanphamchuagiao"><table >
<?php 

$danhsachcacgiaythuocdonhang=danhsachcacgiaythuocdonhang($conn,$danhsachcacdonhangchuagiao_row['iddonhang']);
while($danhsachcacgiaythuocdonhang_row=mysqli_fetch_array($danhsachcacgiaythuocdonhang))
{
?>
<tr ><td class="idgiay"><?php echo $danhsachcacgiaythuocdonhang_row['idgiay'];?></td><td class="tengiay"><?php echo $danhsachcacgiaythuocdonhang_row['ten'];?></td><td class="sizegiay"><?php echo $danhsachcacgiaythuocdonhang_row['size'];?></td><td class="maugiay"><?php echo $danhsachcacgiaythuocdonhang_row['tenmau'];?></td><td class="soluonggiay"><?php echo $danhsachcacgiaythuocdonhang_row['soluong'];?></td></tr>
<?php } ?>																														
							</table></td>
							<td class="colbutton" ><button class="buttonnhantienthanhcong">đã nhận</button></td>
</tr>
<?php }?>


</table>
</div>