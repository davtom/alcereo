<?php

session_start();
error_reporting(E_ALL & ~E_NOTICE); 

if($_SESSION['loggedin'] != true){
    
    header("location: pages/login.php");
    
}
else{
    
    header("location: pages/main.php");
    
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <style type="text/css">
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
</body>
    
</html>