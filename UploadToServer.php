<html>
 <head>
  <title> php_upload</title>
</head>
<body>
<?php
  
    $file_path = "./image/";
     
    $uploadfile = $file_path . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $uploadfile)) {
        echo "success";
    } else{
        echo "fail";
    }
 ?>	
</body>
</html>
