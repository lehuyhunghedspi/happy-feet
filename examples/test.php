<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
            include 'libs/database.php';
            include 'libs/helper.php';
            db_connect();
            $sql="SELECT idLoai, TenLoai FROM loaisp";
            $result=$conn->query($sql);
            
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <?php while($row=$result->fetch_assoc()) : ?>
                        <a href="<?php echo "https://begin-ngoctran1910.c9users.io/examples/category3.php?idLoai=".$row["idLoai"]; ?>" class="list-group-item"><?php echo $row["TenLoai"] ?></a>
                        <?php endwhile; ?>
                        </div>
                </div>
            </div>
        </div>
    </body>
</html>