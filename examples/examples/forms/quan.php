<?php
session_start();
$conn=mysqli_connect("localhost","root","","bangiay_v5");
mysqli_set_charset($conn, "utf8");
if(isset($_POST["idtp"])){
$idtp = (int)$_POST["idtp"];
$sql="SELECT tenquanhuyen, idquanhuyen from quanhuyen where idthanhpho=$idtp";
//echo $sql;
$result=$conn->query($sql);
while($quan=$result->fetch_assoc())
{
    $output .= "<option name='quan' value='".$quan["idquanhuyen"]."'>".$quan["tenquanhuyen"]."</option>";
}
echo $output;
}
?>