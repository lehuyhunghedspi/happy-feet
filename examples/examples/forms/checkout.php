<?php
session_start();
require '../../../block/inputlogin.php';
$conn=mysqli_connect("localhost","root","","bangiay_v5");
mysqli_set_charset($conn, "utf8");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Material Dashboard Pro by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../../assets/css/material-dashboard.css?v=1.2.1" rel="stylesheet" />
    
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <?php
    if(!isset($_SESSION["idUser"]))
        {
            echo '<script>';
            echo 'alert("Please login to complete your purchasing!");';
            echo 'location.replace(document.referrer);';
            echo '</script>';
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(!isset($_SESSION["idUser"]))
        {
            echo '<script>';
            echo 'alert("Please login to complete your purchasing!");';
            echo '</script>';
        }
		else{
			echo '<script>';
			echo 'alert("Thank you for purchasing!");';
			echo 'window.location.href="http://localhost/workspace2/hangxachtay/";';
			echo '</script>';
	        $date = date('Y-m-d H:i:s');
	        $sql="INSERT INTO donhang(ngaymua, diachichitiet, quanhuyen_idquanhuyen, nguoidung_idnguoidung, tennguoinhan, sdt) 
	        VALUES ('$date', '".$_POST['cuthe']."', '".$_POST['country']."', '".$_SESSION['idUser']."','".$_POST['username']."', '".$_POST['phone']."')";
	        $conn->query($sql);
	        $last_id = mysqli_insert_id($conn);
	    	//echo "Thêm record thành công có ID là $last_id";
	        foreach ($_SESSION["products"] as $product){
	        	$product_name=$product["ten"];
					$product_price=$product["giaban"];
					$product_qty=$product["product_qty"];
					$product_color=$product["product_color"];
					$product_size = $product["product_size"];
					$product_id=$product["idSP"];

                    $sql="SELECT soluongbandau, idsizemau from sizemau, mau where mau_idmau=idmau and giay_idgiay=$product_id and tenmau='$product_color' and size=$product_size";
    //echo $sql;
    $res=$conn->query($sql);
    $soluong=$res->fetch_assoc();
$conlai=$soluong["soluongbandau"]-$product_qty;
        $id=$soluong["idsizemau"];
        $sql="UPDATE sizemau SET soluongbandau=$conlai WHERE idsizemau=$id";
        $conn->query($sql);

	        	$sql="SELECT idsizemau from sizemau, mau where mau_idmau=idmau and giay_idgiay=$product_id and tenmau='$product_color' and size=$product_size";
	        	//echo $sql;
	        	$res=$conn->query($sql);
	        	$row=$res->fetch_assoc(); $idsizemau=$row["idsizemau"];
	        	$sql="INSERT into giaodich(sizemau_idsizemau, donhang_iddonhang, soluong, giabanlucgiaodich) 
	        	VALUES('$idsizemau', '$last_id', '$product_qty', '$product_price')";
	        	$conn->query($sql); 
                unset($_SESSION["products"]);
	        	//echo $sql;
        	}
		}
    }
    ?>
    <?php include '../../../header.php'; ?>
    <br><br><br><br>
    <div class="wrapper">
        <div class="col-md-4">
            
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Hóa đơn</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <tr><th>Giày</th>
                                                <th>Số lượng</th>
                                                <th>Đơn giá</th>
                                                <th>Tạm tính</th>
                                            </tr></thead>
                                            <tbody>
                                                <?php
			                            	$tong=0;
			foreach ($_SESSION["products"] as $product) : {
				$product_name=$product["ten"];
				$product_price=$product["giaban"];
				$product_qty=$product["product_qty"];
			
				$product_id=$product["idSP"];
				//echo $product_color.$product_size.$product_name."<br>";
				
			}
		                            	?>
                                                <tr>
                                                    <td><?php echo $product_name; ?></td>
                                                    <td><?php echo $product_qty; ?></td>
                                                    <td><?php echo $product_price; ?></td>
                                                    <td class="text-primary"><?php echo $product_price*$product_qty; $tong+=$product_price*$product_qty; ?></td>
                                                </tr>
                                                <?php endforeach; ?>
												<tr><td></td><td></td><td></td><td><span class="price"> &#8363; <?php echo $tong; ?>000</span></td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                           
                            
                        </div>
        
            
            
                    <div class="col-md-8 col-sm-offset-0">
                        <!--      Wizard container        -->
                        <div class="wizard-container">
                            <div class="card wizard-card" data-color="rose" id="wizardProfile">
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                    <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                                    <div class="wizard-header">
                                        <h3 class="wizard-title">
                                            Complete your purchasing
                                        </h3>
                                        <h5>This information will let us know more about you.</h5>
                                    </div>
                                    <div class="wizard-navigation">
                                        <ul>
                                            <li>
                                                <a href="#about" data-toggle="tab">About</a>
                                            </li>
                                            <li>
                                                <a href="#account" data-toggle="tab">Account</a>
                                            </li>
                                            <li>
                                                <a href="#address" data-toggle="tab">Address</a>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                        <div class="tab-pane" id="about">
                                            <div class="row">
                                                <h4 class="info-text"> Let's start with the basic information (with validation)</h4>
                                                <div class="col-sm-4 col-sm-offset-1">
                                                    <div class="picture-container">
                                                        <div class="picture">
                                                            <img src="../../assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="" />
                                                            <input type="file" id="wizard-picture">
                                                        </div>
                                                        <h6>Choose Picture</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">face</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Họ tên người nhận
                                                                <small>(required)</small>
                                                            </label>
                                                            <input name="username" type="text" class="form-control" value=""/>
                                                        </div>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">record_voice_over</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Số điện thoại
                                                                <small>(required)</small>
                                                            </label>
                                                            <input name="phone" type="text" class="form-control" value=""/>
                                                        </div>
                                                    </div>
                                                </div>
												<div class="tab-pane" id="address">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h4 class="info-text"> Địa chỉ nhận hàng </h4>
                                                </div>
                                                
                                                
                                                <div class="col-sm-5 col-sm-offset-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Thành phố</label>
                                                        <select name="country" class="form-control" onchange="showQuan(this.value)">
                                                            <?php $sql="SELECT idthanhpho, tenthanhpho from thanhpho";
                                                            $result=$conn->query($sql); ?>
                                                            
                                                            <option disabled="" selected=""></option>
                                                            <?php while($tp=$result->fetch_assoc()) : ?>
                                                            <option value="<?php echo $tp["idthanhpho"]; ?>"> <?php echo $tp["tenthanhpho"]; ?> </option>
                                                            <?php endwhile; ?>
                                                            <option value="...">...</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Quận</label>
                                                       
                                                        <select name="country" id="quan" class="form-control">
                                                            <option disabled="" selected=""></option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
												<div class="col-sm-7 col-sm-offset-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Địa chỉ cụ thể (viết rõ số nhà, tên đường...)</label>
                                                        <input type="text" name="cuthe" value="" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                </div>
                                        </div>
                                        <div class="tab-pane" id="account">
                                            <h4 class="info-text"> Hình thức vận chuyển </h4>
                                            <div class="row">
                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <div class="col-sm-4">
                                                        <div class="choice" data-toggle="wizard-checkbox">
                                                            <input type="checkbox" name="vanchuyen" value="1">
                                                            <div class="icon">
                                                                <i class="fa fa-pencil"></i>
                                                            </div>
                                                            <h6>Giao hàng nhanh</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="choice" data-toggle="wizard-checkbox">
                                                            <input type="checkbox" name="vanchuyen" value="2">
                                                            <div class="icon">
                                                                <i class="fa fa-terminal"></i>
                                                            </div>
                                                            <h6>Giao hàng thường</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="choice" data-toggle="wizard-checkbox">
                                                            <input type="checkbox" name="vanchuyen" value="3">
                                                            <div class="icon">
                                                                <i class="fa fa-laptop"></i>
                                                            </div>
                                                            <h6>Nhận hàng tại kho</h6>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
											
                                        </div>
                                        
                                    </div>
                                    <div class="wizard-footer">
                                        <div class="pull-right">
                                            
                                            <input type='submit' class='btn btn-finish btn-fill btn-rose btn-wd' name='finish' value='Finish' />
                                        </div>
                                        
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- wizard container -->
                    
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portofolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="http://www.creative-tim.com"> Creative Tim </a>, made with love for a better web
                    </p>
                </div>
            </footer>
        
    </div>
</body>
<!--   Core JS Files   -->
<script src="../../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/js/material.min.js" type="text/javascript"></script>
<script src="../../assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="../../assets/js/arrive.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="../../assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../../assets/js/moment.min.js"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="../../assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="../../assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="../../assets/js/bootstrap-notify.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="../../assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="../../assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="../../assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="../../assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="../../assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="../../assets/js/sweetalert2.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../../assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="../../assets/js/fullcalendar.min.js"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="../../assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../../assets/js/material-dashboard.js?v=1.2.1"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../../assets/js/demo.js"></script>
<script src="../../../assets/js/material-kit.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        demo.initMaterialWizard();
        setTimeout(function() {
            $('.card.wizard-card').addClass('active');
        }, 600);
    });
</script>
<script>
    function showQuan(obj)
    {
        //alert(obj);
        $.post("quan.php", 
				{
          idtp: obj,
        },
	    function(data, status){
	        //alert("Data: " + data + "\nStatus: " + status);
	        $("#quan").html(data);
	    });
    }
    function canhbao()
    {
    	alert("Success");
    }
</script>

</html>