<?php 
$conn;
require("../../lib/connectdb.php");



$comment_word_camxuc=array('hay','đẹp','xịn','bền','nhẹ','uy tín','sang chảnh','xấu','nặng','nhanh hỏng','dởm','nhà quê','cũ','mới','hot','chất','hợp','...');

$comment_word_mucdo=array('quá','hơi bị','cũng hơi','cực kỳ',' ','','');

$comment_cacau=array('Có size 38 cho nữ ko','	
Có size 38 không shop, mà mua rồi mang không vừa được đổi lại được không shop',
'Đã nhận được hàng.nhưng sao không giống hình mấy',
'Không có màu trắng hả shop?',
'Màu đen size 40 vs 41 còn k ạ',
'shop cho e hoi chan e dai 25 ngang 11 mang size nao vua ak',
'Toi dat 2 doi làm sao de kiểm tra dơn hàg cua toi v',
'Mẫu màu đen. Chân mình 26cm mang size j là vừa ạ',
'1 cặp bao nhiu z shop',
'Size chuẩn hay tổ họ size bình thế?',
'Shop ơi em lỡ đặt nhầm saiz v có đc đổi k ạ ?',
'đổi lại được nha bạn',
'đây là giày EU hay giày Việt Nam ạ',
'M nhận hàng rồi.chất lượng kém quá shop ak',
'Còn màu đen size 37-42 k ạ?',
'Em đặt hàng 3 đôi. Nhưng 2 đôi vừa. 1 đôi size 41 bị chật. Giờ em đổi thì làm thế nào. 
Em có vào mục đơn hàng của tôi để làm thủ tục đổi lại. Nhưng quên mật khẩu thì giờ sao ạ. Ko nhớ mật khẩu vào tài khoản nữa thì em phải làm thế nào?',
'Cho mình h ỏi, thông thường giày thể thao mình hay mang size 36, nếu mình mua ko vừa thì được đổi lúc nhận hàng ko ạ? có phát sinh thêm phí gì ko',
'Giá chính xác k shop',
'Mình mới được giao hàng tức thì luôn.. háo hức quá mở ra thử liền... rất êm nhé mọi người, nên mua lắm ạ.
Mình mua 2 đôi cho chị em mình đi thích lắm',
'Tôi đã mua 3 đôi của shop. Rất thích về sản phẩm của các bạn. Tôi sẽ giới thiệu bạn tôi tới shop',
'Giày êm ái, mang dễ chịu, mình mua mà bạn mình rất thích,',
'giày đẹp như hình, giá rẻ, mang cực êm, giao hàng nhanh',
'Giày không giống hình không có chữ M lun nhưng vẫn ổn cho 3 sao',
'Giày shop này bán giao ko đúng hình, chất lượng tệ, không nên mua');


$idnguoibinhluan=mysqli_query($conn,"select idnguoidung from nguoidung");
$idnguoidungarray=array();
while($id=mysqli_fetch_array($idnguoibinhluan)){
	$idnguoidungarray[]=$id['idnguoidung'];
}
$idgiay=mysqli_query($conn,"select idgiay from giay");
$idgiayarray=array();
while($id=mysqli_fetch_array($idgiay)){
	$idgiayarray[]=$id['idgiay'];
}
$query="INSERT INTO `comment`(`idcomment`, `noidung`, `thoigianbinhluan`, `nguoidung_idnguoidung`, `giay_idgiay`) 
VALUES";
for($i=0;$i<5000;$i++){
	
	if($i%4!=0){
		
$query=$query."(NULL,
			 '".$comment_word_mucdo[rand(0,sizeof($comment_word_mucdo)-1)]." ".$comment_word_camxuc[rand(0,sizeof($comment_word_camxuc)-1)]."'
			 , CURRENT_TIMESTAMP, 
			'".$idnguoidungarray[rand(0,sizeof($idnguoidungarray)-1)]."',
			 '".$idgiayarray[rand(0,sizeof($idgiayarray)-1)]."'),";

	}
	else{
		$query=$query."(NULL,
			 '".$comment_cacau[rand(0,sizeof($comment_cacau)-1)]."'
			 , CURRENT_TIMESTAMP, 
			'".$idnguoidungarray[rand(0,sizeof($idnguoidungarray)-1)]."',
			 '".$idgiayarray[rand(0,sizeof($idgiayarray)-1)]."'),";
	}
}
$query=$query."(NULL,
			 '".$comment_word_mucdo[rand(0,sizeof($comment_word_mucdo)-1)]." ".$comment_word_camxuc[rand(0,sizeof($comment_word_camxuc)-1)]."'
			 , CURRENT_TIMESTAMP, 
			'".$idnguoidungarray[rand(0,sizeof($idnguoidungarray)-1)]."',
			 '".$idgiayarray[rand(0,sizeof($idgiayarray)-1)]."');";
//echo $query;
mysqli_query($conn,$query);
?>