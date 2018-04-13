<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Ecommerce - Material Kit PRO by Creative Tim</title>

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
<body>
	<?php
            include 'libs/database.php';
            include 'libs/helper.php';
            include '../header.php';
			$idLoai=$_GET['idLoai'];
			
            db_connect();
            $ram=array();
            $bonhotrong=array();
            if(isset($_REQUEST['ram'])) {
            	$ram=array_filter(explode("-",$_REQUEST['ram']));
            }
            //print_r($ram);
            //echo $_GET['ram'];
            if(isset($_REQUEST['bonhotrong'])) {
            	$bonhotrong=array_filter(explode("-",$_REQUEST['bonhotrong']));
            }
            //echo $_SERVER["REQUEST_URI"];
            
    ?>
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
									<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
										<div class="panel-body panel-refine">
											<span id="price-left" class="price-left pull-left" data-currency="&euro;">100</span>
											<span id="price-right" class="price-right pull-right" data-currency="&euro;">850</span>
											<div class="clearfix"></div>
											<div id="sliderRefine" class="slider slider-rose"></div>
										</div>
									</div>
								</div>

								<div class="panel panel-default panel-rose">
									<div class="panel-heading" role="tab" id="headingTwo">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="ecommerce.html#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
											<h4 class="panel-title">RAM</h4>
											<i class="material-icons">keyboard_arrow_down</i>
										</a>
									</div>
									<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
										<div class="panel-body">
										<?php
$sql="SELECT distinct bonho_ram FROM sanpham_thuoctinh, sanpham WHERE sanpham.idSP=sanpham_thuoctinh.idSP AND idLoai=$idLoai";
$result=$conn->query($sql);
										 while($ram_data=$result->fetch_assoc()) : ?>
											<div class="checkbox">
												<label>
													<input type="checkbox" class="item_filter ram" value="<?php echo $ram_data['bonho_ram']; ?>" <?php if(in_array($ram_data["bonho_ram"], $ram)){ echo"checked"; } ?> data-toggle="checkbox">
													<?php echo $ram_data["bonho_ram"]; ?>
												</label>
											</div>
										<?php endwhile; ?>
										</div>
									</div>
								</div>
<?php $sql="SELECT distinct bonho_bo_nho_trong FROM sanpham_thuoctinh, sanpham WHERE sanpham.idSP=sanpham_thuoctinh.idSP AND idLoai = $idLoai";
            $result=$conn->query($sql); ?>
								<div class="panel panel-default panel-rose">
									<div class="panel-heading" role="tab" id="headingThree">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="ecommerce.html#collapseThree" aria-expanded="false" aria-controls="collapseThree">
											<h4 class="panel-title">Bộ nhớ trong</h4>
											<i class="material-icons">keyboard_arrow_down</i>
										</a>
									</div>
									<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
										<div class="panel-body">
											<?php while($bonhotrong_data=$result->fetch_assoc()) : ?>
												<div class="checkbox">
													<label>
												   		<input type="checkbox" class="item_filter bonhotrong" value="<?php echo $bonhotrong_data["bonho_bo_nho_trong"]; ?>" <?php if(in_array($bonhotrong_data['bonho_bo_nho_trong'], $bonhotrong)){ echo "checked"; } ?> data-toggle="checkbox">
														<?php echo $bonhotrong_data["bonho_bo_nho_trong"]; ?>
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
$sql="SELECT Gia, MoTa, sanpham.idSP, TenSP, UrlHinh, bonho_ram, bonho_bo_nho_trong FROM sanpham, sanpham_thuoctinh WHERE sanpham_thuoctinh.idSP=sanpham.idSP AND idLoai=$idLoai";
if(!empty($ram)) {
	$ram_data=implode("','", $ram);
	$sql .= " and bonho_ram in ('$ram_data')";
}
if(!empty($bonhotrong)) {
	$bonhotrong_data=implode("','", $bonhotrong);
	$sql .= " and bonho_bo_nho_trong in ('$bonhotrong_data')";
}
echo $sql;
$result=$conn->query($sql); ?>
					<div class="col-md-9">
	   					<div class="row">
	   						<?php while($row=$result->fetch_assoc()) : ?>
	   							<div class="col-md-3">
	   							 <div class="card card-product card-plain no-shadow" data-colored-shadow="false">
	   								 <div class="card-image">
	   									 <a href="<?php echo "https://shoes-ngoctran1910.c9users.io/hangxachtay/examples/product-details.php?idSP=".$row["idSP"]; ?>">
	   										 <img src="<?php echo "https://shoes-ngoctran1910.c9users.io/hangxachtay/examples/hinhchinh/".$row["UrlHinh"]; ?>" />
	   									 </a>
	   								 </div>
	   								 <div class="card-content">
	   									 <a href="<?php echo "https://shoes-ngoctran1910.c9users.io/hangxachtay/examples/product-details.php?idSP=".$row["idSP"]; ?>">
	   										 <h4 class="card-title"> <?php echo $row["TenSP"]; ?> </h4>
	   									 </a>
	   									 <p class="description">
	   										<?php echo "Bộ nhớ trong: ".$row["bonho_bo_nho_trong"]."<br>RAM: ".$row["bonho_ram"]; ?>
	   									 </p>
	   									 <div class="footer">
											 <div class="price-container">
											 	<span class="price"> VND <?php echo $row["Gia"]; ?> </span>
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

				<br>
				
			</div>
        </div><!-- section -->
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

	<script type="text/javascript">
		$(document).ready(function(){

			var slider2 = document.getElementById('sliderRefine');

			noUiSlider.create(slider2, {
				start: [42, 880],
				connect: true,
				range: {
				   'min': [30],
				   'max': [900]
				}
			});

			var limitFieldMin = document.getElementById('price-left');
			var limitFieldMax = document.getElementById('price-right');

			slider2.noUiSlider.on('update', function( values, handle ){
				if (handle){
					limitFieldMax.innerHTML= $('#price-right').data('currency') + Math.round(values[handle]);
					console.log(Math.round(values[handle]));
				} else {
					limitFieldMin.innerHTML= $('#price-left').data('currency') + Math.round(values[handle]);
					console.log(Math.round(values[handle]));
				}
			});
		});
	</script>
	<script>
		$(function(){
			$('.item_filter').click(function() {
				var ram=multiple_values('ram');
				var bonhotrong=multiple_values('bonhotrong');
				var url=window.location.href+"&ram="+ram+"&bonhotrong="+bonhotrong;
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
</html>

