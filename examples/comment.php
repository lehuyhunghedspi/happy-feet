<?php
session_start();
$conn;
require "lib/connectdb.php";
$date = date('Y-m-d');
$sql="INSERT into comment(noidung, thoigianbinhluan, nguoidung_idnguoidung, giay_idgiay) 
VALUES('".$_POST['comt']."', '$date', '".$_SESSION['idUser']."', '".$_POST['id']."')";
$conn->query($sql);
$iduser=$_SESSION['idUser'];
$sql="SELECT tendangnhap from nguoidung where idnguoidung=$iduser";
$res=$conn->query($sql);
$row=$res->fetch_assoc();
echo "<div class='media'>
		        						  <a class='pull-left' href='index.html#pablo'>
		        							  <div class='avatar'>
		        									<img class='media-object' alt='64x64' src='../assets/img/faces/avatar.jpg'>
		        							  </div>
		        						  </a>
		        						  <div class='media-body'>
		        								<h4 class='media-heading'>".$row["tendangnhap"]."<small>·".$date."</small></h4>

		        								<p>".$_POST['comt']."</p>
		        								

		        								<div class='media-footer'>
		        									<a data-original-title='Reply to Comment' href='index.html#pablo' class='btn btn-primary btn-simple pull-right' rel='tooltip'>
		        										<i class='material-icons'>reply</i> Reply
		        									</a>
		        									<a href='index.html#pablo' class='btn btn-danger btn-simple pull-right'>
		        										<i class='material-icons'>favorite</i> 243
		        									</a>
		        								</div>
		        						  </div>
		        					</div>"
//echo $_POST['comt'];
?>