<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout</title>
    <script src="../sweetalert/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    
</body>
</html>
 <?php
 include "../connection.php";
 include "./";

 session_start();
 session_destroy();
 echo "<script>
 swal('Info','Do You Want Logout','info')
 .then(
     function(res){
         if(true){
             window.location='../';
         }
     }
 );
</script>";

?> 

