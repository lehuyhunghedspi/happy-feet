<?php 
$conn;
require("../lib/connectdb.php");
require("lib/thongkesql.php");


?>


<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8"> 
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

 
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/donhangchuagiao.css">

<link rel="stylesheet" type="text/css" href="css/thongkegiaodich.css" />
 <script src="dothi/amcharts/amcharts.js" type="text/javascript"></script>
 <script src="dothi/amcharts/serial.js" type="text/javascript"></script>
 
 <script src="http://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js" type="text/javascript"></script>
  
 <link rel="stylesheet" href="style.css" type="text/css">
 
 <link rel="stylesheet" href="css/thongkegiaodich.css" type="text/css">
       
</head>

<body>


<div class="container">
<div class="row">
<?php require("menu.php");?>
</div>



<br><br>
<h3>số lượng đơn hàng đã đặt</h3>
<div>
<span>tháng</span>
<?php $cur_month=date("m");
?>
<select id='donhang_thang' onchange="donhang_updatedothi();">
<option value="-1">tất cả</option>'
<?php 

$i=1;
for($i=12;$i>=1;$i--){
	if($i!=$cur_month)
		echo '<option value="'.$i.'">'.$i.'</option>';
	else
		echo '<option value="'.$i.'" selected>'.$i.'</option>';
	 }?>
	 
</select>

<span>năm</span>
<?php
$cur_year=date("Y");
$start_year=2015; ?>
<select id='donhang_nam'  onchange="donhang_updatedothi();">
<?php while($cur_year>=$start_year){
	?>
	<option value="<?php echo $cur_year?>"><?php echo $cur_year;$cur_year--;?></option>
	<?php } ?>
</select>

</div>

<div class="row">
<div class="col-md-8">
<div id="chart_div_donhang" style="width: 600px; height: 400px;"></div></div>

<div class="col-md-4">
	<div id="div_thongtin_donhang">
		<h4>Báo cáo tình hình tháng <?php echo date("m");?></h4>
		
		<div>
		<br>
		<div class="baocao">
		<span>tổng số đơn hàng</span><span style="border:50px;"> 
		<?php $tongthangnay=tongsoluongdonhang($conn,date('Y'),date('m')); echo $tongthangnay;?> người</span>
		<br><div class="chuamuiten">
		<?php $tongthangtruoc=tongsoluongdonhang($conn,date('Y'),date('m')-1);
		if($tongthangtruoc<$tongthangnay){
			echo '<arrow class="arrow-up"></arrow><span><?php echo $tongthangnay?>'.round((intval($tongthangnay)/intval($tongthangtruoc)-1)*100,2) . ' %</span></div>';
			
		}else {
			
			echo '<arrow class="arrow-down"></arrow><span><?php echo $tongthangnay?>'. round((1-intval($tongthangnay)/intval($tongthangtruoc))*100,3). ' %</span></div>';
		}
		?>
		
		</div>
		<br>
		<div class="baocao">
		<span>tỉ lệ khách hàng cũ quay lại</span><span style="border:50px;"> <?php echo $tilequaylaithangnay=round(100*sokhachhangquaylai($conn,date('Y'),date('m'))/tongsokhachang($conn),2);?> %</span><br>
		
		<?php $tilequaylaithangtruoc=round(100*sokhachhangquaylai($conn,date('Y'),date('m')-1)/tongsokhachang($conn),2);
		if($tilequaylaithangtruoc<$tilequaylaithangnay){
			
			echo '
		<div class="chuamuiten"><arrow class="arrow-up"></arrow><span>'.round(($tilequaylaithangnay/$tilequaylaithangtruoc-1)*100,2).'%</span></div>';
		}
		
		else{
			echo '
		<div class="chuamuiten"><arrow class="arrow-down"></arrow><span>'.round((1-$tilequaylaithangnay/$tilequaylaithangtruoc)*100,2).'%</span></div>';
			
		}?>
			
		</div>
		<br>
		<div class="baocao">
		<span>tỉ lệ mua của khách hàng mới</span><span style="border:50px;"> <?php $sokhachmoithangnay=tongsokhachangmoi($conn,date('Y'),date('m')); echo round($sokhachmoithangnay/tongsokhachang($conn)*100,2);?> %</span>
		<br>
		<?php  $sokhachmoithangtruoc=tongsokhachangmoi($conn,date('Y'),date('m')-1);
		
		if($sokhachmoithangtruoc<$sokhachmoithangnay){
			
			echo '
		<div class="chuamuiten">
		<arrow class="arrow-up"></arrow><span>'.round(100/$sokhachmoithangtruoc*$sokhachmoithangnay-100,2).'%</span>';
		
		}
		else{
			 echo '<div class="chuamuiten">
		<arrow class="arrow-down"></arrow><span>'.round(100-100/$sokhachmoithangtruoc*$sokhachmoithangnay,2).'%</span>';
			
		}?></div>
		</div>
		<br>
		<div class="baocao">
		<span>số lượng đăng ký mới </span><span style="border:50px;"><?php echo $songuoimoithangnay=tongsoluongdangkymoi($conn,date('Y'),date('m'));?> người</span>
		<br>
		
		<div class="chuamuiten"><?php $songuoimoithangtruoc=tongsoluongdangkymoi($conn,date('Y'),date('m')-1);
		if($songuoimoithangtruoc<$songuoimoithangnay){
			echo '
		<arrow class="arrow-up"></arrow><span>'.round(($songuoimoithangnay/$songuoimoithangtruoc-1)*100,2).' %</span></div>';
		}
		else{
			echo '
		<arrow class="arrow-down"></arrow><span>'.round((1-$songuoimoithangnay/$songuoimoithangtruoc)*100,2).' %</span></div>';
		}?>
		</div>
		</div>



	</div>
</div>
</div>





<br><br>
<h3>số lượng giao dịch</h3>
<div>
<span>tháng</span>
<?php $cur_month=date("m");
?>
<select id='giaodich_thang' onchange="giaodich_updatedothi();">
<option value="-1">tất cả</option>'
<?php 

$i=1;
for($i=12;$i>=1;$i--){
	if($i!=$cur_month)
		echo '<option value="'.$i.'">'.$i.'</option>';
	else
		echo '<option value="'.$i.'" selected>'.$i.'</option>';
	 }?>
	 
</select>

<span>năm</span>
<?php
$cur_year=date("Y");
$start_year=2015; ?>
<select id='giaodich_nam'  onchange="giaodich_updatedothi();">
<?php while($cur_year>=$start_year){
	?>
	<option value="<?php echo $cur_year?>"><?php echo $cur_year;$cur_year--;?></option>
	<?php } ?>
</select>

</div>
<div id="chart_div_giaodich" style="width: 600px; height: 400px;float:left;padding:5px;"></div>
</div>
</div>
<script>
//thong kê số lượng đơn hàng trong tuần

function donhang_updatedothi()
	
{
	
	//tạo đồ thị 
{

	$('#chartdiv').html('');
	chart=AmCharts.makeChart( "chart_div_donhang", 
	{
	"type": "serial",
	"dataLoader": {
		//"url": "dothi/datathongkegiaodich.php?thang="+$('#donhang_thang').val()+"&nam="+$('#donhang_nam').val()
		"url": "dothi/datathongkegiaodich_donhang.php?thang="+$('#donhang_thang').val()+"&nam="+$('#donhang_nam').val()
	},
	"categoryField": "ngaymua",
  
  "categoryAxis": {
  "labelRotation": 90
},
	"graphs": [
			{
			"valueField": "soluongdonhang",
			"type": "smoothedLine",
			"balloonText": "[[ngaymua]]: <b>[[soluongdanhang]]</b>",
			"fillAlphas": 0.2,
			"bullet": "round",
			"lineColor": "#D35400"
			}
			// ,
			// {
			// "valueField": "soluonghangbanra",
			// "type": "line",
			// "balloonText": "[[ngaymua]]: <b>[[soluonghangbanra]]</b>",
			// "fillAlphas": 0,
			// "bullet": "round",
			// "lineColor": "#4d5cb6"
			// }
  ],
  
  "chartScrollbar": {
    "updateOnReleaseOnly": true
  }
	});
	
	//chart.categoryAxis.parseDates = true;
	//chart.categoryAxis.minPeriod = "DD";
}
}
	donhang_updatedothi();
</script>

<script>


function giaodich_updatedothi()
	
{
	
	//tạo đồ thị 
{

	$('#chartdiv').html('');
	chart=AmCharts.makeChart( "chart_div_giaodich", 
	{
	"type": "serial",
	"dataLoader": {
		//"url": "dothi/datathongkegiaodich.php?thang="+$('#donhang_thang').val()+"&nam="+$('#donhang_nam').val()
		"url": "dothi/datathongkegiaodich_giaodich.php?thang="+$('#giaodich_thang').val()+"&nam="+$('#giaodich_nam').val()
	},
	"categoryField": "ngaymua",
  
  "categoryAxis": {
  "labelRotation": 90
},
	"graphs": [
			{
			"valueField": "soluongdonhang",
			"type": "smoothedLine",
			"balloonText": "[[ngaymua]]: <b>[[soluongdanhang]]</b>",
			"fillAlphas": 0.2,
			"bullet": "round",
			"lineColor": "#2E86C1"
			}
			// ,
			// {
			// "valueField": "soluonghangbanra",
			// "type": "line",
			// "balloonText": "[[ngaymua]]: <b>[[soluonghangbanra]]</b>",
			// "fillAlphas": 0,
			// "bullet": "round",
			// "lineColor": "#4d5cb6"
			// }
  ],
  
  "chartScrollbar": {
    "updateOnReleaseOnly": true
  }
	});
	
	//chart.categoryAxis.parseDates = true;
	//chart.categoryAxis.minPeriod = "DD";
}
}
	giaodich_updatedothi();
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>









