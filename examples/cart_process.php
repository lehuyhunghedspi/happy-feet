<!DOCTYPE html>
<html>
	<head>
		
	</head>
	<body>
		<?php
session_start();
$conn;
require "lib/connectdb.php";
if(isset($_POST["idxoa"])){
	unset($_SESSION["products"][(int)$_POST["idxoa"]]);
}
if(isset($_POST["idSP"])){
	foreach($_POST as $key => $value){
		$new_product[$key]=$value;
	}
	$product_qty=$new_product["product_qty"];
			$product_color=$new_product["product_color"];
			$product_size = $new_product["product_size"];
			$product_id=$new_product["idSP"];

	$sql="SELECT soluongbandau, idsizemau from sizemau, mau where mau_idmau=idmau and giay_idgiay=$product_id and tenmau='$product_color' and size=$product_size";
	//echo $sql;
	$res=$conn->query($sql);
	$soluong=$res->fetch_assoc();
	if($soluong["soluongbandau"]<1){
		echo '<script>';
		echo 'alert("So sorry, this size or color maybe out of stock!");';
		echo 'location.replace(document.referrer);';
		echo '</script>';
		//header('Location: ' . $_SERVER['HTTP_REFERER']);
		//exit;
	}
	else if ($soluong["soluongbandau"]<$product_qty) {
		echo '<script>';
		echo 'alert("So sorry, we do not have enough quantity for you!");';
		echo 'location.replace(document.referrer);';
		echo '</script>';
	}
	else{
			$statement=$conn->prepare("SELECT ten, giaban FROM giay WHERE idgiay=? LIMIT 1");
		$statement->bind_param('s', $new_product['idSP']);
		$statement->execute();
		$statement->bind_result($product_name, $product_price);

		while($statement->fetch()){
			$new_product["ten"]=$product_name;
			$new_product["giaban"]=$product_price;
			if(isset($_SESSION["products"])){
				if(isset($_SESSION["products"][$new_product['idSP']]))
				{
					unset($_SESSION["product"][$new_product['idSP']]);
				}
			}
			$_SESSION["products"][$new_product['idSP']]=$new_product;
		}
		// $conlai=$soluong["soluongbandau"]-$product_qty;
		// $id=$soluong["idsizemau"];
		// $sql="UPDATE sizemau SET soluongbandau=$conlai WHERE idsizemau=$id";
		// $conn->query($sql);
		$total_items=count($_SESSION["products"]);
		echo '<script>';
		echo 'alert("Successfully added to your cart!");';
		echo 'location.replace(document.referrer);';
		echo '</script>';
		//die(json_encode(array('items'=>$total_items)));
		//echo $total_items;
		//header('Location: ' . $_SERVER['HTTP_REFERER']);
		//exit;
	}
	}
	
	//echo "<br>";

		$total=0;
		foreach ($_SESSION["products"] as $product) {
			$product_name=$product["ten"];
			$product_price=$product["giaban"];
			$product_qty=$product["product_qty"];
			$product_color=$product["product_color"];
			$product_size = $product["product_size"];
			//echo $product_color.$product_size.$product_name."<br>";
		}
?>
	</body>
</html>