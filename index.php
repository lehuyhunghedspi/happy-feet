<?php
session_start();
$conn;
require "lib/connectdb.php";
require 'block/inputlogin.php';
//require "lib/trangchu.php";
if( isset($_GET["p"]))
	$p=$_GET["p"];
else
	$p="";

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>HAPPY FEET</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!-- Canonical SEO -->
	<link rel="canonical" href="http://www.creative-tim.com/product/material-kit-pro" />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.min.css" rel="stylesheet"/>

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/assets-for-demo/vertical-nav.css" rel="stylesheet" />
	<link href="assets/assets-for-demo/demo.css" rel="stylesheet" />
	<style>
	img {
    width: 1000px !important;
    height: 300px !important;
}
	</style>
</head>

<body class="index-page">
	<?php require 'header.php'; ?>
	<div class="row">
	
		<?php
		$sql="SELECT idmucdich,tenmucdich FROM mucdich";
            $result=$conn->query($sql);
		?>
	
	<div class="main main-raised">
	<div class="nav nav-tabs nav-justified" style="background-color: #140B12;">
                        <?php while($row=$result->fetch_assoc()) : ?>
                        <li><a href="<?php echo "http://localhost/workspace2/hangxachtay/examples/category.php?idmucdich=".$row["idmucdich"]; ?>"><?php echo $row["tenmucdich"] ?></a></li>
                        <?php endwhile; ?>
                    </div>
	<div class="section">
            <div class="container">
	<div class="col-md-12">
	<h3>Newest Products</h3>
	   					<div class="row">
	   					<?php 
	   					$date = date('Y-m-d');
	   					$next_date= date('Y-m-d', strtotime($date. '-30 days'));
	   					$sql="SELECT distinct idgiay, ten, giaban from giay where idgiay<50 and '$next_date' <= ngayban limit 12";
	   					//echo $sql;
	   					$res=$conn->query($sql);
	   					?>
	   					<?php while($row=$res->fetch_assoc()) :?>

	   						 <div class="col-md-3">
	   							 <div class="card card-product card-plain no-shadow" data-colored-shadow="false">
	   								 <div class="card-image">
	   									 <a href="<?php echo "http://localhost/workspace2/hangxachtay/examples/detail.php?idgiay=".$row["idgiay"]; ?>">
	   									 <?php $a=glob("anhminhhoa/".$row["idgiay"]."_"."*.jpeg"); ?>
	   										 <img src="<?php echo $a[0]; ?>" alt="..."/>
	   									 </a>
	   								 </div>
	   								 <div class="card-content">
	   									 <a href="<?php echo "http://localhost/workspace2/hangxachtay/examples/detail.php?idgiay=".$row["idgiay"]; ?>">
	   										 <h4 class="card-title"><?php echo $row["ten"]; ?></h4>
	   									 </a>
	   									 <p class="description">
	   										Impeccably tailored in Italy from lightweight navy wool.
	   									 </p>
	   									 <div class="footer">
											 <div class="price-container">
											 	<span class="price"> &#8363; <?php echo $row["giaban"]; ?>000</span>
											 </div>

	   										 <button class="btn btn-rose btn-simple btn-fab btn-fab-mini btn-round pull-right" rel="tooltip" title="Remove from wishlist" data-placement="left">
	   											 <i class="material-icons">favorite</i>
	   										 </button>
	   									 </div>
	   								 </div>
	   							 </div> <!-- end card -->
	   						  </div>
	   						<?php endwhile; ?>
	   						  
	   					</div>
						<h3>Best-sellers</h3>
						<div class="row">
							
							<?php 
							$sql="SELECT giaban, ten, sum(soluong) as soluong, giay_idgiay from giay, sizemau, giaodich where giay_idgiay=idgiay and idsizemau=sizemau_idsizemau group by idgiay having sum(soluong)>39 order by sum(soluong) desc ";
							//echo $sql;
							$res=$conn->query($sql);
							?>
							<?php while($row=$res->fetch_assoc()) :?>

	   						 <div class="col-md-3">
	   							 <div class="card card-product card-plain no-shadow" data-colored-shadow="false">
	   								 <div class="card-image">
	   									 <a href="<?php echo "http://localhost/workspace2/hangxachtay/examples/detail.php?idgiay=".$row["giay_idgiay"]; ?>">
	   									 <?php 
	   									 $b=glob("anhminhhoa/".$row["giay_idgiay"]."_"."*.jpeg"); 
	   									 ?>
	   										 <img src="<?php echo $b[1]; ?>" alt="..."/>
	   									 </a>
	   								 </div>
	   								 <div class="card-content">
	   									 <a href="<?php echo "http://localhost/workspace2/hangxachtay/examples/detail.php?idgiay=".$row["giay_idgiay"]; ?>">
	   										 <h4 class="card-title"><?php echo $row["ten"]; ?></h4>
	   									 </a>
	   									 <p class="description">
	   										Impeccably tailored in Italy from lightweight navy wool.
	   									 </p>
	   									 <div class="footer">
											 <div class="price-container">
											 	<span class="price"> &#8363; <?php echo $row["giaban"]; ?>000</span>
											 </div>

	   										 <button class="btn btn-rose btn-simple btn-fab btn-fab-mini btn-round pull-right" rel="tooltip" title="Remove from wishlist" data-placement="left">
	   											 <i class="material-icons">favorite</i>
	   										 </button>
	   									 </div>
	   								 </div>
	   							 </div> <!-- end card -->
	   						  </div>
	   						<?php endwhile; ?>
						</div>
	   				</div>
	
  
  </div>
  </div>
  </div>
  </div>

	
<?php require 'block/forms.php';?>
<?php require 'block/footer.php'; ?>
</body>
	<!--   Core JS Files   -->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js"></script>

	<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
	<script src="assets/js/moment.min.js"></script>

	<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="assets/js/nouislider.min.js" type="text/javascript"></script>

	<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
	<script src="assets/js/bootstrap-datetimepicker.js" type="text/javascript"></script>

	<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
	<script src="assets/js/bootstrap-selectpicker.js" type="text/javascript"></script>

	<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
	<script src="assets/js/bootstrap-tagsinput.js"></script>

	<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
	<script src="assets/js/jasny-bootstrap.min.js"></script>

	<!-- Plugin For Google Maps -->
	<script  type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFPQibxeDaLIUHsC6_KqDdFaUdhrbhZ3M"></script>

	<script src="assets/js/atv-img-animation.js" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="assets/js/material-kit.min.js" type="text/javascript"></script>

	<!-- Fixed Sidebar Nav - JS For Demo Purpose, Don't Include it in your project -->
	<script src="assets/assets-for-demo/modernizr.js" type="text/javascript"></script>
	<script src="assets/assets-for-demo/vertical-nav.js" type="text/javascript"></script>

	<script type="text/javascript">

		$(document).ready(function(){
			var slider = document.getElementById('sliderRegular');

	        noUiSlider.create(slider, {
	            start: 40,
	            connect: [true,false],
	            range: {
	                min: 0,
	                max: 100
	            }
	        });

	        var slider2 = document.getElementById('sliderDouble');

	        noUiSlider.create(slider2, {
	            start: [ 20, 60 ],
	            connect: true,
	            range: {
	                min:  0,
	                max:  100
	            }
	        });



			materialKit.initFormExtendedDatetimepickers();

		});
	</script>
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
 	$.post("http://localhost/workspace2/hangxachtay/examples/validate.php", {username: username, email:email, password: password, retypepassword: retypepassword}, function(data, status){
 		$("#showerror").html(data);
 		alert(data);
 	});
    return false;
});
</script>
</html>