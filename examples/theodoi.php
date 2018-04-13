<?php
session_start();
$conn;
require "lib/connectdb.php";
require '../block/inputlogin.php';
require '../block/forms.php';

require("theodoisql.php");
//print_r($_SESSION["products"]);
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Material Kit by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!-- Canonical SEO -->
	<link rel="canonical" href="http://www.creative-tim.com/product/material-kit-pro" />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/material-kit.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../admin/css/donhangchuagiao.css">

</head>
<body class="index-page">

<?php include '../header.php'; ?>
<div class="main main-raised">
	
<div class="section">
<div class="container tim-container">
	
<div id="contentAreas" class="cd-section">
<div id="tables">
<div class="row">
<h3>hàng chưa gửi cho bên vận chuyển</h3>
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
$danhsachcacdonhangchuagiao=danhsachcacdonhangchuagui($conn, $_SESSION["idUser"]);
while($danhsachcacdonhangchuagiao_row=mysqli_fetch_array($danhsachcacdonhangchuagiao)){
 ?>

<tr><td ><?php echo $danhsachcacdonhangchuagiao_row['iddonhang']; ?></td><td><?php echo $danhsachcacdonhangchuagiao_row['diachichitiet'].' '.$danhsachcacdonhangchuagiao_row['tenquanhuyen'].' '.$danhsachcacdonhangchuagiao_row['tenthanhpho']; ?></td><td><?php echo $danhsachcacdonhangchuagiao_row['ngaymua'];?></td>
<td class="bangsanphamchuagiao"><table >
<?php 

$danhsachcacgiaythuocdonhang=danhsachcacgiaythuocdonhang($conn,$danhsachcacdonhangchuagiao_row['iddonhang'],$_SESSION["idUser"]);
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
$danhsachcacdonhangchuagiao=danhsachcacdonhangchuagiao($conn, $_SESSION["idUser"]);
while($danhsachcacdonhangchuagiao_row=mysqli_fetch_array($danhsachcacdonhangchuagiao)){
 ?>

<tr><td ><?php echo $danhsachcacdonhangchuagiao_row['iddonhang']; ?></td><td><?php echo $danhsachcacdonhangchuagiao_row['diachichitiet'].' '.$danhsachcacdonhangchuagiao_row['tenquanhuyen'].' '.$danhsachcacdonhangchuagiao_row['tenthanhpho']; ?></td><td><?php echo $danhsachcacdonhangchuagiao_row['ngaymua'];?></td>
<td class="bangsanphamchuagiao"><table >
<?php 

$danhsachcacgiaythuocdonhang=danhsachcacgiaythuocdonhang($conn,$danhsachcacdonhangchuagiao_row['iddonhang'],$_SESSION["idUser"]);
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
		                    </div>
		                    </div>
		                    </div>
		                    </div>
		                
		                    <?php require '../block/footer.php'; ?>
</body>


<!--   Core JS Files   -->
	<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/js/material.min.js"></script>

	<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
	<script src="../assets/js/moment.min.js"></script>

	<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="../assets/js/nouislider.min.js" type="text/javascript"></script>

	<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
	<script src="../assets/js/bootstrap-datetimepicker.js" type="text/javascript"></script>

	<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
	<script src="../assets/js/bootstrap-selectpicker.js" type="text/javascript"></script>

	<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
	<script src="../assets/js/bootstrap-tagsinput.js"></script>

	<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
	<script src="../assets/js/jasny-bootstrap.min.js"></script>

	<!-- Plugin For Google Maps -->
	<script  type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFPQibxeDaLIUHsC6_KqDdFaUdhrbhZ3M"></script>

	<script src="../assets/js/atv-img-animation.js" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="../assets/js/material-kit.min.js" type="text/javascript"></script>
	<script>
$('#submitsignup').click(function ()
{
    // Xóa trắng thẻ div show lỗi
    $('#showerror').html('');
 
    var username = $('#username').val();
    var email = $('#email').val();
    var password=$('#password').val();
    var retypepassword=$('#retypepassword').val();
 
    // Kiểm tra dữ liệu có null hay không
    if ($.trim(username) == ''){
        alert('Ban chua nhap username');
        return false;
    }
 
    if ($.trim(email) == ''){
        alert('Bạn chưa nhập email');
        return false;
    }
 	$.post("validate.php", {username: username, email:email, password: password, retypepassword: retypepassword}, function(data, status){
 		$("#showerror").html(data);
 		alert(data);
 	});
    return false;
});
</script>
	
</html>
