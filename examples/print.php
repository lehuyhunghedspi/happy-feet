<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <?php
        print_r($_SESSION["products"]);
        ?>
    </body>
</html>