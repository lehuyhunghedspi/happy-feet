<?php
function uploadimage($filecu,$thumucdich,$tenfilemoi,$maxmegabyte)
    if($_FILES['file']['name'] != NULL){ // Đã chọn file
        // Tiến hành code upload file
        if($_FILES['file']['type'] == "image/jpeg"
        || $_FILES['file']['type'] == "image/png"
        || $_FILES['file']['type'] == "image/gif"){
        // là file ảnh
        // Tiến hành code upload    
            if($_FILES['file']['size'] > 1048576*$maxmegabyte){
                echo "File không được lớn hơn ".$maxmegabyte."mb";
            }else{
                // file hợp lệ, tiến hành upload
                $path = $thumucdich; // file sẽ lưu vào thư mục data
                $tmp_name = $_FILES['file']['tmp_name'];
                $name = $$tenfilemoi;
                $type = $_FILES['file']['type']; 
                $size = $_FILES['file']['size']; 
                // Upload file
                move_uploaded_file($tmp_name,$path.$name);
			}
        }else{
           // không phải file ảnh
           echo "Kiểu file không hợp lệ";
        }
   }else{
        echo "Vui lòng chọn file";
   }

?>