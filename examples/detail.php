<?php
	session_start();
	$conn;
	require "lib/connectdb.php";
	require '../block/inputlogin.php';
	require '../block/forms.php';
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

	<!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/material-kit.min.css" rel="stylesheet"/>
    
</head>
<body class="product-page">
	<!--<nav class="navbar navbar-rose navbar-transparent navbar-fixed-top navbar-color-on-scroll" color-on-scroll="100"></nav>
	<div class="page-header header-filter" data-parallax="true" filter-color="rose" style="background-image: url('../assets/img/bg6.jpg');">-->
<?php include '../header.php'; ?>
	    
<?php
$idSP=$_GET["idgiay"];

$results=$conn->query("SELECT idgiay, ten, giaban, tenchatlieu, docaocuade FROM giay, chatlieu WHERE chatlieu_idchatlieu=idchatlieu AND idgiay=$idSP LIMIT 1");
if(!$results){
	printf("Error: %s\n", $conn->error);
	exit;
}
$row=$results->fetch_assoc();
$a=glob("../anhminhhoa/".$row["idgiay"]."_"."*.jpeg");
$dem=0
?>
	<div class="section section-gray">
	    <div class="container">
            <div class="main main-raised main-product">
                <div class="row">
                    <div class="col-md-6 col-sm-6">

                       <div class="tab-content">
                       <div class="tab-pane active" id="<?php echo "product-page0"; ?>">
                                 <img src="<?php echo $a[0]; ?>"/>
                                 
                              </div>
                       <?php foreach($a as $key => $value) : ?>
                            <div class="tab-pane" id="<?php echo "product-page".$key; ?>">
                                 <img src="<?php echo $value; ?>"/>
                              </div>
                          <?php endforeach; ?>
                              
                        </div>

                        <ul class="nav flexi-nav" role="tablist" id="flexiselDemo1">
                        <?php foreach($a as $key => $value) : ?>
							<li>
								<a href="<?php echo "product-page.html#product-page".$key; ?>" role="tab" data-toggle="tab" aria-expanded="false">
									<img src="<?php echo $value; ?>"/>
								</a>
							</li>
						<?php endforeach; ?>
							
                        </ul>

                    </div>
					<form method="POST" action="cart_process.php" class="form-item">
						<div class="col-md-6 col-sm-6">
						<h2 class="title"> <?php echo $row["ten"]; ?> </h2>
						<h3 class="main-price"><span class="price"> &#8363; <?php echo $row["giaban"]; ?>000</span></h3>
						<div id="acordeon">
                            <div class="panel-group" id="accordion">
                          <div class="panel panel-border panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="product-page.html#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h4 class="panel-title">
                                    Description
                                    <i class="material-icons">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                              <div class="panel-body">
                                <p><?php echo "Material: ".$row["tenchatlieu"]."<br/>Height: ".$row["docaocuade"]; ?></p>
                              </div>
                            </div>
                          </div>
                          <div class="panel panel-border panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="product-page.html#collapseTwo" aria-controls="collapseOne">
                                    <h4 class="panel-title">
                                    Designer Information
                                    <i class="material-icons">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                              <div class="panel-body">
                                An infusion of West Coast cool and New York attitude, Rebecca Minkoff is synonymous with It girl style. Minkoff burst on the fashion scene with her best-selling 'Morning After Bag' and later expanded her offering with the Rebecca Minkoff Collection - a range of luxe city staples with a "downtown romantic" theme.
                              </div>
                            </div>
                          </div>
                          <div class="panel panel-border panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="product-page.html#collapseThree" aria-controls="collapseOne">
                                    <h4 class="panel-title">
                                    Details and Care
                                    <i class="material-icons">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                              <div class="panel-body">
                                <ul>
                                     <li>Storm and midnight-blue stretch cotton-blend</li>
                                     <li>Notch lapels, functioning buttoned cuffs, two front flap pockets, single vent, internal pocket</li>
                                     <li>Two button fastening</li>
                                     <li>84% cotton, 14% nylon, 2% elastane</li>
                                     <li>Dry clean</li>
                                </ul>
                              </div>
                            </div>
                          </div>

                        </div>
                        </div><!--  end acordeon -->
<?php 
$sql="SELECT distinct tenmau from giay, mau, sizemau where giay_idgiay=idgiay and mau_idmau=idmau and idgiay=$idSP";
$res=$conn->query($sql);
?>
			            <div class="row pick-size">
                            <div class="col-md-4 col-sm-4">
                                <label>Select color</label>
								<select class="selectpicker" name="product_color" data-style="select-with-transition" data-size="7">
								<?php while($mau=$res->fetch_assoc()) : ?>
									<option value="<?php echo $mau["tenmau"]; ?>"><?php echo $mau["tenmau"]; ?></option>
								<?php endwhile; ?>
								</select>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <label>Select size</label>
								<select class="selectpicker" name="product_size" data-style="select-with-transition" data-size="7">
								<?php for($i=35; $i<=39; $i++) : ?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php endfor; ?>
								</select>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <label>Select Quantity</label>
								<select class="selectpicker" name="product_qty" data-style="select-with-transition" data-size="7">
									<option value="1">1 </option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4 </option>
									<option value="5">5</option>
									<option value="6">6</option>
								</select>
                            </div>
                        </div>
                        <div class="row text-right">
                        	<input name="idSP" type="hidden" value="<?php echo $idSP ?>">
                            <button class="btn btn-rose btn-round" type="submit">Add to Cart &nbsp;<i class="material-icons">shopping_cart</i></button>
                        </div>
                    </div>
					</form>
				</div>
            </div>

            <div class="features text-center">
                <div class="row">
    				<div class="col-md-4">
    					<div class="info">
    						<div class="icon icon-info">
    							<i class="material-icons">local_shipping</i>
    						</div>
    						<h4 class="info-title">2 Days Delivery </h4>
    						<p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
    					</div>
    				</div>

    				<div class="col-md-4">
    					<div class="info">
    						<div class="icon icon-success">
    							<i class="material-icons">verified_user</i>
    						</div>
    						<h4 class="info-title">Refundable Policy</h4>
    						<p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
    					</div>
    				</div>

    				<div class="col-md-4">
    					<div class="info">
    						<div class="icon icon-rose">
    							<i class="material-icons">favorite</i>
    						</div>
    						<h4 class="info-title">Popular Item</h4>
    						<p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
    					</div>
    				</div>

                </div>
            </div>
            
		                <div class="title">
		                    <h3>Comments</h3>
		                </div>
		        		<div class="row">
		        			<div class="col-md-8 col-md-offset-2">
		        				<div class="media-area">
		        					<h3 class="title text-center">10 Comments</h3>

		        					<h3 class="text-center">Post your comment <br><small>- Logged In User -</small></h3>
		                          <div class="media media-post">
		                              <a class="pull-left author" href="index.html#pablo">
		                                  <div class="avatar">
		                                        <img class="media-object" alt="64x64" src="../assets/img/faces/avatar.jpg">
		                                  </div>
		                              </a>
		                              <div class="media-body">
		                                    <div class="form-group is-empty"><textarea id="comment" class="form-control" placeholder="Write some nice stuff or nothing..." rows="6"></textarea><span class="material-input"></span></div>
		                                    <div class="media-footer">
		                                    	<input type="hidden" id="giay" value="<?php echo $idSP ?>">
		                                         <button class="btn btn-primary btn-wd pull-right">Post Comment</button>
		                                    </div>
		                              </div>
		                          </div> <!-- end media-post -->
		        					
		        					<div class="media" id="showcomment">
		        					<input type="hidden" value="<?php if(isset($_SESSION["idUser"])) echo $_SESSION["idUser"]; else echo -1; ?>"
		        					id="idUser">
		        					</div>

		        					</div>

<?php 
$sql="SELECT thoigianbinhluan, noidung, tendangnhap from comment, nguoidung where nguoidung_idnguoidung=idnguoidung and giay_idgiay=$idSP";
$res=$conn->query($sql);
 ?>
		        					<?php while($row=$res->fetch_assoc()) : ?>
		        					<div class="media">
		        						<a class="pull-left" href="index.html#pablo">
		        							<div class="avatar">
		        								<img class="media-object" src="assets/img/faces/avatar.jpg" alt="..."/>
		        							</div>
		        						</a>
		        						<div class="media-body">
		        							<h4 class="media-heading"> <?php echo $row["tendangnhap"] ?> <small>&middot; <?php echo $row["thoigianbinhluan"]; ?> </small></h4>
		        							<h6 class="text-muted"></h6>

		        							<p> <?php echo $row["noidung"]; ?> </p>
		        							

		        							<div class="media-footer">
		        								<a href="index.html#pablo" class="btn btn-primary pull-right">
		        												<i class="material-icons">reply</i> Reply
		        											</a>
		        								<a href="index.html#pablo" class="btn btn-danger btn-simple pull-right">
		        									<i class="material-icons">favorite</i> 243
		        								</a>
		        							</div>
		        						

		        				</div></div>
		        				<?php endwhile; ?>
		                          
		        			</div>
		        		</div>
	    </div>
	</div>					
</div>
</div>
<footer class="footer footer-black footer-big">
	<div class="container">

		<div class="content">
			<div class="row">
				<div class="col-md-4">
					<h5>About Us</h5>
					<p>Creative Tim is a startup that creates design tools that make the web development process faster and easier. </p> <p>We love the web and care deeply for how users interact with a digital product. We power businesses and individuals to create better looking web projects around the world. </p>
				</div>

				<div class="col-md-4">
					<h5>Social Feed</h5>
					<div class="social-feed">
						<div class="feed-line">
							<i class="fa fa-twitter"></i>
							<p>How to handle ethical disagreements with your clients.</p>
						</div>
						<div class="feed-line">
							<i class="fa fa-twitter"></i>
							<p>The tangible benefits of designing at 1x pixel density.</p>
						</div>
						<div class="feed-line">
							<i class="fa fa-facebook-square"></i>
							<p>A collection of 25 stunning sites that you can use for inspiration.</p>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<h5>Instagram Feed</h5>
					<div class="gallery-feed">
						<img src="../assets/img/faces/card-profile6-square.jpg" class="img img-raised img-rounded" alt="" />
						<img src="../assets/img/faces/christian.jpg" class="img img-raised img-rounded" alt="" />
						<img src="../assets/img/faces/card-profile4-square.jpg" class="img img-raised img-rounded" alt="" />
						<img src="../assets/img/faces/card-profile1-square.jpg" class="img img-raised img-rounded" alt="" />

						<img src="../assets/img/faces/marc.jpg" class="img img-raised img-rounded" alt="" />
						<img src="../assets/img/faces/kendall.jpg" class="img img-raised img-rounded" alt="" />
						<img src="../assets/img/faces/card-profile5-square.jpg" class="img img-raised img-rounded" alt="" />
						<img src="../assets/img/faces/card-profile2-square.jpg" class="img img-raised img-rounded" alt="" />
					</div>

				</div>
			</div>
		</div>


		<hr />

		<ul class="pull-left">
			<li>
				<a href="product-page.html#pablo">
				   Blog
				</a>
			</li>
			<li>
				<a href="product-page.html#pablo">
					Presentation
				</a>
			</li>
			<li>
				<a href="product-page.html#pablo">
				   Discover
				</a>
			</li>
			<li>
				<a href="product-page.html#pablo">
					Payment
				</a>
			</li>
			<li>
				<a href="product-page.html#pablo">
					Contact Us
				</a>
			</li>
		</ul>

		<div class="copyright pull-right">
			Copyright &copy; <script>document.write(new Date().getFullYear())</script> Creative Tim All Rights Reserved.
		</div>
	</div>
</footer>

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

	<!--	Plugin for Product Gallery, full documentation here: https://9bitstudios.github.io/flexisel/ -->
	<script src="../assets/js/jquery.flexisel.js"></script>

	<!--    Plugin For Google Maps   -->
	<script  type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFPQibxeDaLIUHsC6_KqDdFaUdhrbhZ3M"></script>

	<!--    Plugin for 3D images animation effect, full documentation here: https://github.com/drewwilson/atvImg    -->
	<script src="../assets/js/atv-img-animation.js" type="text/javascript"></script>

	<!--    Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc    -->
	<script src="../assets/js/material-kit.min.js" type="text/javascript"></script>

    <script type="text/javascript">

    $(document).ready(function() {
		$("#flexiselDemo1").flexisel({
			visibleItems: 4,
    		itemsToScroll: 1,
    		animationSpeed: 400,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint:480,
                    visibleItems: 3
                },
                landscape: {
                    changePoint:640,
                    visibleItems: 3
                },
                tablet: {
                    changePoint:768,
                    visibleItems: 3
                }
            }
        });
        $(".btn.btn-rose btn-round").click(function(){
        	$.get("cart_process.php", function(data, status){
        		if(data=0)
        			alert("Out of stock!");
        		else
        			alert("Added to your cart!");
        	});
        });
        $(".btn.btn-primary.btn-wd.pull-right").click(function(){
        	var iduser=$("#idUser").val();
        	if(iduser==-1){
        		alert("Please log in to post comment");
        		return false;
        	}
        	var $div = $("<div>", {"class": "media"});
        	var id=$("#giay").val();
        	$("#showcomment").append($div);
        	$.post("comment.php", {comt: $("#comment").val(), id: id}, function(data, status){
        			//alert("Data: "+data+"\nStatus: "+status);
        			$div.html(data);
        	});
        });
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
 	$.post("validate.php", {username: username, email:email, password: password, retypepassword: retypepassword}, function(data, status){
 		$("#showerror").html(data);
 		alert(data);
 	});
    return false;
});
</script>

</html>