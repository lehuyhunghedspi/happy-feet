<?php
$conn=mysqli_connect("localhost","root","","bangiay_v5");

//$conn=mysqli_connect("sql307.byethost33.com","b33_20983983","admin1ad1","b33_20983983_bangiay_v2");
    //$conn=mysqli_connect("sql307.byethost33.com","b33_20983983","admin1ad1","b33_20983983_bangiay_v3");
mysqli_set_charset($conn, "utf8");
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
$date = date('Y-m-d');
// Lấy thông tin username và email
if( isset ($_POST['username'])&& isset ($_POST['password'])&&isset ($_POST['email'])&&isset ($_POST['retypepassword'])){
    //$link = mysqli_connect("sql307.byethost33.com","b33_20983983","admin1ad1","b33_20983983_bangiay_v4");
    $query ="INSERT INTO nguoidung (tendangnhap , matkhau , email,ngaythamgia ) VALUES ('".$_POST['username']."', '".$_POST['password']."', '".$_POST['email']."','$date');";
    $sql="SELECT tendangnhap from nguoidung where tendangnhap = '".$_POST['username']."' OR email ='".$_POST['email']."' ";
    $result=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result);
        if($count>0) echo "Account is existed";
        else
        {
            if($_POST['password']==$_POST['retypepassword'])
            {
                if (!preg_match("/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/", $_POST['email']))
                echo "WRONG EMAIL. ENTER AGAIN";
                else if($conn->query($query)) echo "Success";
                else echo "Error";
            }
        
            else echo "Password is not correct"; 
        }
}
?>