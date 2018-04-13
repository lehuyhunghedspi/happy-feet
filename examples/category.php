<?php
session_start();
$conn;
require "lib/connectdb.php";
require '../block/inputlogin.php';
require '../block/forms.php'
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>HAPPY FEET</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!-- Canonical SEO -->
	<link rel="canonical" href="http://www.creative-tim.com/product/material-kit-pro" />
	
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/material-kit.min.css" rel="stylesheet"/>
    <style>
    	.card .card-image{
    		height: 40% !important;
    	}
    </style>
    
</head>
<body>
	<?php
            //include 'libs/database.php';
            include 'libs/helper.php';
            include '../header.php';
			$idLoai=$_GET['idmucdich'];
			
            //db_connect();
            $ram=array();//chat lieu
            $bonhotrong=array();//kieu mui
            $got=array();
            if(isset($_REQUEST['ram'])) {
            	$ram=array_filter(explode("-",$_REQUEST['ram']));
            }

            if(isset($_REQUEST['got'])) {
            	$got=array_filter(explode("-",$_REQUEST['got']));
            }

            //print_r($ram);
            //echo $_GET['ram'];
            if(isset($_REQUEST['bonhotrong'])) {
            	$bonhotrong=array_filter(explode("-",$_REQUEST['bonhotrong']));
            }
            //echo $_SERVER["REQUEST_URI"];
            
    ?>
    
    <div class="main main-raised">
<div class="section">
            <div class="container">
				<h2 class="section-title">Find what you need</h2>
				<div class="row">
					<div class="col-md-3">
						<div class="card card-refine card-plain">
							<div class="card-content">
								<h4 class="card-title">
									Refine
									<button class="btn btn-default btn-fab btn-fab-mini btn-simple pull-right" rel="tooltip" title="Reset Filter">
										<i class="material-icons">cached</i>
									</button>
								</h4>
								<div class="panel panel-default panel-rose">
									<div class="panel-heading" role="tab" id="headingOne">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="ecommerce.html#collapseOne" aria-expanded="false" aria-controls="collapseOne">
											<h4 class="panel-title">Price Range</h4>
											<i class="material-icons">keyboard_arrow_down</i>
										</a>
									</div>
									<?php 
									$sql1="SELECT min(giaban) as giamin, max(giaban) as giamax from giay, mucdich_cua_giay where idgiay=giay_idgiay and mucdich_idmucdich=$idLoai";									
									$res1=$conn->query($sql1);									
									$row1=$res1->fetch_assoc();
									?>
									<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
										<div class="panel-body panel-refine">
											<span id="price-left" class="price-left pull-left" data-currency=""><?php echo $row1["giamin"]; ?><span>000</span></span>
											<input type="hidden" id="giamin" value="<?php echo $row1["giamin"]; ?>">
											<span id="price-right" class="price-right pull-right" data-currency=""><?php echo $row1["giamax"]; ?> <span>000</span> </span>
											<input type="hidden" id="giamax" value="<?php echo $row1["giamax"]; ?>">
											<div class="clearfix"></div>

											<div id="sliderRefine" class="slider slider-rose"></div>
										</div>
									</div>
								</div>

								<div class="panel panel-default panel-rose">
									<div class="panel-heading" role="tab" id="headingTwo">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="ecommerce.html#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
											<h4 class="panel-title">Material</h4>
											<i class="material-icons">keyboard_arrow_down</i>
										</a>
									</div>
									<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
										<div class="panel-body">
										<?php
$sql="SELECT distinct tenchatlieu FROM giay, chatlieu, mucdich_cua_giay WHERE idchatlieu=chatlieu_idchatlieu AND giay_idgiay=idgiay AND mucdich_idmucdich=$idLoai";
$result=$conn->query($sql);
										 while($ram_data=$result->fetch_assoc()) : ?>
											<div class="checkbox">
												<label>
													<input type="checkbox" class="item_filter ram" value="<?php echo $ram_data['tenchatlieu']; ?>" <?php if(in_array($ram_data["tenchatlieu"], $ram)){ echo"checked"; } ?> data-toggle="checkbox">
													<?php echo $ram_data["tenchatlieu"]; ?>
												</label>
											</div>
										<?php endwhile; ?>
										</div>
									</div>
								</div>
<?php $sql="SELECT distinct tenloaimui FROM giay, loaimui, mucdich_cua_giay WHERE idloaimui=loaimui_idloaimui AND giay_idgiay=idgiay AND mucdich_idmucdich = $idLoai";
            $result=$conn->query($sql); ?>
								<div class="panel panel-default panel-rose">
									<div class="panel-heading" role="tab" id="headingThree">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="ecommerce.html#collapseThree" aria-expanded="false" aria-controls="collapseThree">
											<h4 class="panel-title">Toe</h4>
											<i class="material-icons">keyboard_arrow_down</i>
										</a>
									</div>
									<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
										<div class="panel-body">
											<?php while($bonhotrong_data=$result->fetch_assoc()) : ?>
												<div class="checkbox">
													<label>
												   		<input type="checkbox" class="item_filter bonhotrong" value="<?php echo $bonhotrong_data["tenloaimui"]; ?>" <?php if(in_array($bonhotrong_data['tenloaimui'], $bonhotrong)){ echo "checked"; } ?> data-toggle="checkbox">
														<?php echo $bonhotrong_data["tenloaimui"]; ?>
													</label>
												</div>
											<?php endwhile; ?>
										</div>
								   </div>
							   </div>

							
							   <?php $sql="SELECT distinct tenloaigot FROM giay, loaigot, mucdich_cua_giay WHERE idloaigot=loaigot_idloaigot AND giay_idgiay=idgiay AND mucdich_idmucdich = $idLoai";
            $result=$conn->query($sql); ?>
								<div class="panel panel-default panel-rose">
									<div class="panel-heading" role="tab" id="headingFour">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="ecommerce.html#collapseFour" aria-expanded="false" aria-controls="collapseFour">
											<h4 class="panel-title">Heel</h4>
											<i class="material-icons">keyboard_arrow_down</i>
										</a>
									</div>
									<div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
										<div class="panel-body">
											<?php while($got_data=$result->fetch_assoc()) : ?>
												<div class="checkbox">
													<label>
												   		<input type="checkbox" class="item_filter got" value="<?php echo $got_data["tenloaigot"]; ?>" <?php if(in_array($got_data['tenloaigot'], $got)){ echo "checked"; } ?> data-toggle="checkbox">
														<?php echo $got_data["tenloaigot"]; ?>
													</label>
												</div>
											<?php endwhile; ?>
										</div>
								   </div>
							   </div>

							</div>
						</div><!-- end card -->
					</div>
<?php 
$sql="SELECT giaban, ten, idgiay FROM loaigot, loaimui, chatlieu, giay, mucdich_cua_giay WHERE loaigot_idloaigot=idloaigot and loaimui_idloaimui=idloaimui AND idchatlieu=chatlieu_idchatlieu AND giay_idgiay=idgiay AND mucdich_idmucdich=$idLoai";
if(!empty($ram)) {
	$ram_data=implode("','", $ram);
	$sql .= " and tenchatlieu in ('$ram_data')";
}
if(!empty($bonhotrong)) {
	$bonhotrong_data=implode("','", $bonhotrong);
	$sql .= " and tenloaimui in ('$bonhotrong_data')";
}
if(!empty($got)) {
	$got_data=implode("','", $got);
	$sql .= " and tenloaigot in ('$got_data')";
}
if(isset($_GET["x"])){
	$x=$_GET["x"];
	$sql .= " and giaban > $x";
}
if(isset($_GET["y"])){
	$y=$_GET["y"];
	$sql .= " and giaban < $y";
}
//echo $sql;
$result=$conn->query($sql); ?>
					<div class="col-md-9">
	   				
	   						<?php $i=0;while($row=$result->fetch_assoc()) {
	   							if($i==0) echo	'<div class="row">';

	   																									
	   						 ?>
	   							<div class="col-md-3">	
	   							<?php $a=glob("../anhminhhoa/".$row["idgiay"]."_"."*.jpeg"); ?>
	   						
	   							 <div class="card card-product card-plain no-shadow" data-colored-shadow="false">
	   								 <div class="card-image">
	   									 <a href="<?php echo "http://localhost/workspace2/hangxachtay/examples/detail.php?idgiay=".$row["idgiay"]; ?>">
	   										 <img src="<?php echo $a[0]; ?> " />
	   									 </a>
	   								 </div>


	   								 <div class="card-content">
	   									 <a href="<?php echo "http://localhost/workspace2/hangxachtay/examples/detail.php?idgiay=".$row["idgiay"]; ?> ">
	   										 <h4 class="card-title"> <?php echo $row["ten"]; ?> </h4>
	   									 </a>
	   									
	   									 <div class="footer">
											 <div class="price-container">
											 	<span class="price"> VND <?php echo $row["giaban"]; ?> 000</span>
											 </div>

	   										 <button class="btn btn-rose btn-simple btn-fab btn-fab-mini btn-round pull-right" rel="tooltip" title="Remove from wishlist" data-placement="left">
	   											 <i class="material-icons">favorite</i>
	   										 </button>
	   									 </div>
	   								 </div> <!-- end cart- content-->
	   							 </div> <!-- end card -->
	   						  </div>
<?php 
if ($i==3) {
	echo '</div>';
}
$i++;
	   							$i=$i%4;

} ?>
	   						  
	   					

	   				</div>
				</div>

				<br>
				
			</div>
        </div><!-- section -->
        </div>
        <?php require '../block/footer.php'; ?>
		</body>
<!--   Core JS Files   -->
	<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/js/material.min.js"></script>

	<!--    Plugin for Date Time Picker and Full Calendar Plugin   -->
	<script src="../assets/js/moment.min.js"></script>

	<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/   -->
	<script src="../assets/js/nouislider.min.js" type="text/javascript"></script>

	<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker   -->
	<script src="../assets/js/bootstrap-datetimepicker.js" type="text/javascript"></script>

	<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select   -->
	<script src="../assets/js/bootstrap-selectpicker.js" type="text/javascript"></script>

	<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/   -->
	<script src="../assets/js/bootstrap-tagsinput.js"></script>

	<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput   -->
	<script src="../assets/js/jasny-bootstrap.min.js"></script>

	<!--    Plugin For Google Maps   -->
	<script  type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFPQibxeDaLIUHsC6_KqDdFaUdhrbhZ3M"></script>

	<!--    Plugin for 3D images animation effect, full documentation here: https://github.com/drewwilson/atvImg    -->
	<script src="../assets/js/atv-img-animation.js" type="text/javascript"></script>

	<!--    Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc    -->
	<script src="../assets/js/material-kit.min.js" type="text/javascript"></script>
	<script src="../assets/js/jquery.query-object.js" type="text/javascript"></script>

	<script type="text/javascript">
		$(document).ready(function(){

			var slider2 = document.getElementById('sliderRefine');
			var limitFieldMin = document.getElementById('price-left');
			var limitFieldMax = document.getElementById('price-right');
			var minprice=$("#giamin").val();
			var maxprice=$("#giamax").val();
			
			noUiSlider.create(slider2, {
				start: [400, 880],
				connect: true,
				range: {
				   'min': parseInt(minprice),
				   'max': parseInt(maxprice)
				},
				
			});

			

			
			if(localStorage.min) var a=localStorage.getItem("min"); else a=400;
			if(localStorage.max) var b=localStorage.getItem("max"); else b=800;
			slider2.noUiSlider.set([a, b]);

			slider2.noUiSlider.on('update', function( values, handle ){
				if (handle){
					limitFieldMax.innerHTML= $('#price-right').data('currency') + Math.round(values[handle]);
					console.log(Math.round(values[handle]));
				} else {
					limitFieldMin.innerHTML= $('#price-left').data('currency') + Math.round(values[handle]);
					console.log(Math.round(values[handle]));
				}
			});
			
			slider2.noUiSlider.on('change', function( values, handle ){
				if (handle){
					limitFieldMax.innerHTML= $('#price-right').data('currency') + Math.round(values[handle]);
					y=Math.round(values[handle]);
					localStorage.setItem("max", y);
					window.location.search = jQuery.query.set("y", y);					
					//alert(y);
				} else {
					limitFieldMin.innerHTML= $('#price-left').data('currency') + Math.round(values[handle]);
					x=Math.round(values[handle]);
					localStorage.setItem("min", x);
					window.location.search = jQuery.query.set("x", x);
					//alert(x);
				}
				//var url;

				//if(x) window.location.search = jQuery.query.set("x", x);
				//if(y) window.location.search = jQuery.query.set("y", y);
				//var temp=jQuery.query.set("y", y);
				//alert(url);

			});
			
		});
	
			$(function(){
			$('.item_filter').click(function() {
				var ram=multiple_values('ram');
				var got=multiple_values('got');
				var bonhotrong=multiple_values('bonhotrong');
				var url=window.location.href+"&ram="+ram+"&bonhotrong="+bonhotrong+"&got="+got;
				window.location=url;
			});
		});

		function multiple_values(inputclass){
			var val=new Array();
			$("."+inputclass+":checked").each(function(){
				val.push($(this).val());
			});
			return val.join('-');
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

