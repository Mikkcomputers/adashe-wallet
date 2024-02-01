<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout</title>
    <link rel="stylesheet" href="../control/login.php">
    <script src="../sweetalert/sweetalert/dist/sweetalert.min.js"></script>
    <!-- <link rel="stylesheet" href="../logout1/"> -->
</head>
<body>
    
</body>
</html>
<?php
// include "\"
include "../../server/server.php";

session_start();
$_SESSION['login']= $username;
session_destroy();

echo "<script>
swal('Information','Do You Want Logout','info')
.then(
    function(res){
        if(true){
            window.location='../';
        }
    }
);
</script>";

?>