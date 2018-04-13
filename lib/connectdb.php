<?php
/*	$servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "bangiay_v2";
    $dbport = 3306;*/

    // Create connection
  //  $conn = new mysqli($servername, $username, $password, $database, $dbport);
$conn=mysqli_connect("localhost","root","","bangiay_v5");

//$conn=mysqli_connect("sql307.byethost33.com","b33_20983983","admin1ad1","b33_20983983_bangiay_v2");
    //$conn=mysqli_connect("sql307.byethost33.com","b33_20983983","admin1ad1","b33_20983983_bangiay_v3");
mysqli_set_charset($conn, "utf8");
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
?>