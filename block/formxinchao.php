
<a href="index.html#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="material-icons">view_carousel</i> <?php echo $_SESSION["hoten"]; ?>
							<b class="caret"></b>
						</a>
						
						
						<ul class="dropdown-menu dropdown-with-icons">
							<li>
								<a href="examples/profile-page.html">
									<i class="material-icons">account_circle</i> Thông tin tài khoản
								</a>
							</li>
							
							<li>
								<a href="examples/profile-page.html">
									<i class="material-icons">account_circle</i> Đổi mật khẩu
								</a>
							</li>
							<?php 
							if (isset($_SESSION["mucquyen"])) {
								if ($_SESSION["mucquyen"]!=0) {
								echo '<li>
								<a href="http://localhost/workspace2/hangxachtay/admin3">
									<i class="material-icons">account_circle</i> Trang quản trị
								</a>
							</li>';
										
								}
							}
							if (isset($_SESSION["idUser"])) {
								echo '<li>
								<a href="http://localhost/workspace2/hangxachtay/examples/theodoi.php">
									<i class="material-icons">account_circle</i> Đơn hàng
								</a>
							</li>';
										
								}
							?>
							
							<li>	<a href="http://localhost/workspace2/hangxachtay/block/logout.php">
									<i class="material-icons">account_circle</i> Đăng xuất
								</a>
								
							</li>
						</ul>
					
