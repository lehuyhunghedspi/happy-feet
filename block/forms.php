<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<!-- Register Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-signup">
	    <div class="modal-content">
			<div class="card card-signup card-plain">
				<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
					<h2 class="modal-title card-title text-center" id="myModalLabel">Register</h2>
		      	</div>
		      	<div class="modal-body">
					<div class="row">
						<div class="col-md-5 col-md-offset-1">
							<div class="info info-horizontal">
								<div class="icon icon-rose">
									<i class="material-icons">timeline</i>
								</div>
								<div class="description">
									<h4 class="info-title">Marketing</h4>
									<p class="description">
										We've created the marketing campaign of the website. It was a very interesting collaboration.
									</p>
								</div>
							</div>

							<div class="info info-horizontal">
								<div class="icon icon-primary">
									<i class="material-icons">code</i>
								</div>
								<div class="description">
									<h4 class="info-title">Fully Coded in HTML5</h4>
									<p class="description">
										We've developed the website with HTML5 and CSS3. The client has access to the code using GitHub.
									</p>
								</div>
							</div>

							<div class="info info-horizontal">
								<div class="icon icon-info">
									<i class="material-icons">group</i>
								</div>
								<div class="description">
									<h4 class="info-title">Built Audience</h4>
									<p class="description">
										There is also a Fully Customizable CMS Admin Dashboard for this product.
									</p>
								</div>
							</div>
						</div>

						<div class="col-md-5">
							<div class="social text-center">
								<button class="btn btn-just-icon btn-round btn-twitter">
									<i class="fa fa-twitter"></i>
								</button>
								<button class="btn btn-just-icon btn-round btn-dribbble">
									<i class="fa fa-dribbble"></i>
								</button>
								<button class="btn btn-just-icon btn-round btn-facebook">
									<i class="fa fa-facebook"> </i>
								</button>
								<h4> or be classical </h4>
							</div>

							<form method="post" action="">
								<div class="card-content">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">face</i>
										</span>
										<input id="username" name="username" value="" type="text" class="form-control" placeholder="First Name...">
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<input id="email" name="email" value="" type="text" class="form-control" placeholder="Email...">
									</div>

									

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input id="password" name="password" type="password" placeholder="Password..." class="form-control" />
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input id="retypepassword" name="retypepassword" type="password" placeholder="RetypePassword..." class="form-control" />
									</div>

									<!-- If you want to add a checkbox to this form, uncomment this code -->

									<div class="checkbox">
										<label>
											<input type="checkbox" name="optionsCheckboxes" checked>
											I agree to the <a href="index.html#something">terms and conditions</a>.
										</label>
									</div>
								</div>
								<div class="input-group" id="showerror" style="color: red;" ></div>
								<div class="modal-footer text-center">
									<button id="submitsignup" type="submit" class="btn btn-primary btn-round">Get Started</button>
								</div>
							</form>
						</div>
					</div>
		      	</div>
			</div>
	    </div>
	</div>
</div>

<!--  End Modal -->
</body>
</html>