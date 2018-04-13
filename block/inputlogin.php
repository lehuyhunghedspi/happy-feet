<?php
// kiem tra dang nhap
if ($_SERVER['REQUEST_METHOD'] == 'POST'&&isset($_POST["btnlogin"]))
{
	$emaildangnhap=$_POST["emaildangnhap"];
	$matkhaudangnhap=$_POST["matkhaudangnhap"];
	//echo $emaildangnhap.$matkhaudangnhap;
	$qr="SELECT * from nguoidung where email='".$emaildangnhap."' and matkhau = '".$matkhaudangnhap."';";
	//echo "<br/><br/><br/><br/><br/>".$qr;
	if($danhsachnguoidung=mysqli_query($conn,$qr)){
	if(mysqli_num_rows($danhsachnguoidung)>0){
		$row=mysqli_fetch_array($danhsachnguoidung);
		$_SESSION["idUser"]=$row["idnguoidung"];
		$_SESSION["hoten"]=$row["tendangnhap"];
		$_SESSION["mucquyen"]=$row["mucquyen"];
	} else{ echo "<script>alert (\"Tai khoan khong ton tai hoac nhap sai mat khau!\")</script>";}
	}
}
?>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="card card-signup card-plain">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>

					<div class="header header-primary text-center">
						<h4 class="card-title">Log in</h4>
						<div class="social-line">
							<a href="index.html#pablo" class="btn btn-just-icon btn-simple">
								<i class="fa fa-facebook-square"></i>
							</a>
							<a href="index.html#pablo" class="btn btn-just-icon btn-simple">
								<i class="fa fa-twitter"></i>
							</a>
							<a href="index.html#pablo" class="btn btn-just-icon btn-simple">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="modal-body">
					<form class="form" method="POST" action="">
						

							<!-- <div class="input-group"> -->
								<!-- <span class="input-group-addon"> -->
									<!-- <i class="material-icons">face</i> -->
								<!-- </span> -->
								<!-- <div class="form-group is-empty"><input type="text" class="form-control" placeholder="First Name..."><span class="material-input"></span></div> -->
							<!-- </div> -->

							<div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">email</i>
								</span>
								<div class="form-group is-empty"><input type="text" name="emaildangnhap" class="form-control" placeholder="Email..."><span class="material-input"></span></div>
							</div>

							<div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">lock_outline</i>
								</span>
								<div class="form-group is-empty"><input type="password" name="matkhaudangnhap" placeholder="Password..." class="form-control"><span class="material-input"></span></div>
							</div>
						<div class="card-content">
							<!-- If you want to add a checkbox to this form, uncomment this code

							<div class="checkbox">
								<label>
									<input type="checkbox" name="optionsCheckboxes" checked>
									Subscribe to newsletter
								</label>
							</div> -->
						</div> 
<div class="modal-footer text-center">						<input type="submit" name="btnlogin" value="Submit" class="btn btn-primary"></div></div>
					</form>
					<a href="examples/signup-page.html" href="index.html#pablo" class="btn btn-primary btn-simple btn-wd btn-lg" data-toggle="modal" data-target="#signupModal">chưa có tài khoản </a>
					<!--<button class="btn btn-primary btn-simple btn-wd btn-lg" data-toggle="modal" data-target="#signupModal">
								<i class="material-icons">assignment</i>
								SignUp
							</button>-->
				</div>
				
		</div>
	</div>
</div> 
	