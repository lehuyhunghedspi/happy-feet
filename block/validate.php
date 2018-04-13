<?php
$conn=mysqli_connect("localhost","root","","bangiay_v5");

//$conn=mysqli_connect("sql307.byethost33.com","b33_20983983","admin1ad1","b33_20983983_bangiay_v2");
    //$conn=mysqli_connect("sql307.byethost33.com","b33_20983983","admin1ad1","b33_20983983_bangiay_v3");
mysqli_set_charset($conn, "utf8");
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
// Lấy thông tin username và email
$username = isset($_POST['username']) ? $_POST['username'] : false;
$email = isset($_POST['email']) ? $_POST['email'] : false;
 
// Nếu cả hai thông tin username và email đều không có thì dừng, thông báo lỗi
if (!$username && !$email){
    die ('{error:"bad_request"}');
}

// Khai báo biến lưu lỗi
$error = array(
    'error' => 'success',
    'username' => '',
    'email' => ''
);
 
// Kiểm tra tên đăng nhập
if ($username)
{
    $query = mysqli_query($conn, 'SELECT count(*) as count from nguoidung where tendangnhap = \''.  addslashes($username).'\'');
 
    if ($query){
        $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
        if ((int)$row['count'] > 0){
            $error['username'] = 'Tên đăng nhập đã tồn tại';
        }
    }
    else{
        die ('{error:"bad_request"}');
    }
}
 
// Kiểm tra tên email
if ($email)
{
    $query = mysqli_query($conn, 'SELECT count(*) as count from nguoidung where emai = \''.  addslashes($email).'\'');
 
    if ($query){
        $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
        if ((int)$row['count'] > 0){
            $error['email'] = 'Email đã tồn tại';
        }
    }
    else{
        die ('{error:"bad_request"}');
    }
}
 
 
// Tiến hành lưu vào CSDL
$query = mysqli_query($conn, "INSERT into nguoidung(tendangnhap, email) values ('$username','$email')");
     
 
// Trả kết quả về cho client
die (json_encode($error));
?>