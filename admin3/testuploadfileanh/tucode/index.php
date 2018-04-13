<?php 
$conn;
require("../../../lib/connectdb.php");


?>


<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8"> 
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<link rel="stylesheet" href="css/themsizesoluong.css">
 
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

		




</head>
<body>


<form enctype="multipart/form-data">
    <input name="file" type="file" />
    <input type="button" value="Upload" />
</form>
<script language="javascript">
$(':file').on('change', function() {
    var file = this.files[0];
    if (file.size > 1024) {
        alert('max upload size is 1k')
    }

    // Also see .name, .type
});
</script>


<script language="javascript">
$(':button').on('click', function() {
    $.ajax({
        // Your server script to process the upload
        url: 'upload.php',
        type: 'POST',

        // Form data
        data: new FormData($('form')[0]),

        // Tell jQuery not to process data or worry about content-type
        // You *must* include these options!
        cache: false,
        contentType: false,
        processData: false,

        // Custom XMLHttpRequest
        xhr: function() {
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) {
                // For handling the progress of the upload
                myXhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                        $('progress').attr({
                            value: e.loaded,
                            max: e.total,
                        });
                    }
                } , false);
            }
            return myXhr;
        },
    });
});
</script>
<progress></progress>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>