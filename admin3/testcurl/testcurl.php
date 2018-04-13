<?php

function curl_download($Url, $saveTo)
{
    // Mở một file mới với đường dẫn và tên file là tham số $saveTo
    $fp = fopen ($saveTo, 'w+');
     
    // Bắt đầu CURl
    $ch = curl_init($Url);
     
    // Thiết lập giả lập trình duyệt
    // nghĩa là giả mạo đang gửi từ trình duyệt nào đó, ở đây tôi dùng Firefox
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0");
     
    // Thiết lập trả kết quả về chứ không print ra
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  
    // Thời gian timeout
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
     
    // Lưu kết quả vào file vừa mở
    curl_setopt($ch, CURLOPT_FILE, $fp);
     
    // Thực hiện download file
    $result = curl_exec($ch);
     
    // Đóng CURL
    curl_close($ch);
     
    return $result;
}

function GetImageFromUrl($link)
{
 
$ch = curl_init();
 
curl_setopt($ch, CURLOPT_POST, 0);
 
curl_setopt($ch,CURLOPT_URL,$link);
 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 
$result=curl_exec($ch);
 
curl_close($ch);
 
return $result;
 
}
$contents=GetImageFromUrl("http://www.vascara.com/uploads/cms_productmedia/2017/December/4/32831_1512371296-medium@2x.jpg");

$savefile = fopen('image.jpg', 'w');
fwrite($savefile, $contents);
fclose($savefile);
?>