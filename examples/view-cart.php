<?php
session_start();
$conn;
require "lib/connectdb.php";
require '../block/inputlogin.php';
require '../block/forms.php';
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
</head>
<body class="index-page">
<?php include '../header.php'; ?>
<div class="main main-raised">
	
<div class="section">
<div class="container tim-container">
	
<div id="contentAreas" class="cd-section">
<div id="tables">
<div class="row">
<?php if(isset($_SESSION['products'])) : ?>
<div class="col-md-12">
		                        <div class="table-responsive">
		                        <table class="table table-shopping">
		                            <thead>
		                                <tr>
		                                    <th class="text-center"></th>
		                                    <th>Product</th>
		                                    <th class="th-description">Color</th>
		                                    <th class="th-description">Size</th>
		                                    <th class="text-right">Price</th>
		                                    <th class="text-right">Qty</th>
		                                    <th class="text-right">Amount</th>
		                                    <th></th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                            	
		                            	<?php
			                            	$total=0;
			foreach ($_SESSION["products"] as $product) : {
				$product_name=$product["ten"];
				$product_price=$product["giaban"];
				$product_qty=$product["product_qty"];
				$product_color=$product["product_color"];
				$product_size = $product["product_size"];
				$product_id=$product["idSP"];
				//echo $product_color.$product_size.$product_name."<br>";
				
			}
		                            	?>
		                                <tr>
		                                    <td>
		                                        <div class="img-container">
		                                        
		                                            <img src="<?php echo "../anhminhhoa/".$product_id."_".$product_color.".jpeg"; ?>" alt="...">
		                                        </div>
		                                    </td>
		                                    <td class="td-name">
		                                        <a href="index.html#jacket"><?php echo $product_name; ?></a>
		                                        
		                                    </td>
		                                    <td>
		                                        <?php echo $product_color; ?>
		                                    </td>
		                                    <td>
		                                        M
		                                    </td>
		                                    <td class="td-number">
		                                        <span class="price"> &#8363;</span><?php echo $product_price; ?>000
		                                    </td>
		                                    <td class="td-number">
		                                        <?php echo $product_qty; ?>
		                                        
		                                    </td>
		                                    <td class="td-number">
		                                        <span class="price"> &#8363;</span><?php echo $product_qty * $product_price; ?>000
		                                        <?php $total+=$product_qty * $product_price; ?>
		                                    </td>
		                                    <td class="td-actions">
		                                        <button type="button" rel="tooltip" data-placement="left" onclick="xoasanpham(this)" id="<?php echo $product_id; ?>" title="" class="btn btn-simple" data-original-title="Remove item">
		                                            <i class="material-icons">close</i>
		                                        </button>
		                                    </td>
		                                </tr>
		                                <?php endforeach; ?>
		                                <tr>
		                                    <td colspan="3">
		                                    </td>
		                                    <td class="td-total">
		                                       Total
		                                    </td>
		                                    <td class="td-price">
		                                        <small><span class="price"> &#8363;</span></small><?php echo $total; ?>000
		                                    </td>
		                                    <td colspan="3" class="text-right"> <a href="http://localhost/workspace2/hangxachtay/examples/examples/forms/checkout.php" type="button" class="btn btn-info btn-round">Complete Purchase <i class="material-icons">keyboard_arrow_right</i></a></td>
		                                </tr>
		                            </tbody>
		                        </table>
		                        </div>

		                    </div>
		                    <?php else:
echo '<div class="tim-typo">
	                       <h2> No product in your cart</h2>
	                    </div>';
		                endif; ?>
		                    </div>
		                    </div>
		                    </div>
		                    </div>
		                    </div>
		                    </div>
		                
		                <div>
		                    <?php require '../block/footer.php'; ?></div>
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
	/*global $*/
		function xoasanpham(obj){
			var x=obj.getAttribute("id");
			
				$.post("cart_process.php", 
				{
          idxoa: x,
        },
	    function(data, status){
	        alert("Data: " + data + "\nStatus: " + status);
	    });
			
			obj.parentNode.parentNode.innerHTML="";
			location.reload();
			
		}
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
 	$.post("validate.php", {username: username, email:email, password: password, retypepassword: retypepassword}, function(data, status){
 		$("#showerror").html(data);
 		alert(data);
 	});
    return false;
});
</script>
	
</html>
