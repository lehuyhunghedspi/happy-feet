<?php 
$conn;
require("../lib/connectdb.php");
require("lib/themsanphammysql.php");


?>


<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8"> 
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<link rel="stylesheet" href="css/testcapnhatanh.css">
<link rel="stylesheet" href="css/themsizesoluong.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<p onclick="showform()">Log-in</p>


<div id="formsuaahh" style="display:none">
<h2 id="closeformchangeanh">x</h2>
<input type="file" >
<input type="submit">
</div>


<div id ="formlogin" class="overlay" style="display:none;">
    <div class="login-wrapper">
        <div class="login-content">
            <a id="closeform" class="close">x</a>
            <h3>Sign in</h3>
            <form method="post" action="login.php">
                <label for="username">
                    Username:
                    <input type="text" name="username" id="username" placeholder="Username must be between 8 and 20 characters" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required" />
                </label>
                <label for="password">
                    Password:
                    <input type="password" name="password" id="password" placeholder="Password must contain 1 uppercase, lowercase and number" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
                <button type="submit">Sign in</button>
            </form>
        </div>
    </div>
</div>
<script language="javascript">
document.getElementById('closeformchangeanh').addEventListener('click',function (){
	document.getElementById('formsuaahh').style.display="none";
	
});
function showform(){
	document.getElementById('formsuaahh').style.display="inline";
}

</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>
</html>