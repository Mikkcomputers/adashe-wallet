<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <script src="../../sweetalert/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    
</body>
</html>
<?php
    include "../../server/server.php";
    $errors = array();
    $username ="";
    $password = "";

    if (isset($_POST['btn_login'])) {
         $errors = array();
        $username =  $_POST['username'];
        $password = $phone =  $_POST['password'];
        
        if (empty($username)) {
            $errors['user'] = "Required username";
        }
        if (empty($password)) {
            $errors['pass'] = "Required password";
        }
        if (count($errors)===0) {
            

            $sql = "SELECT * FROM `admin` WHERE `roll` = true AND  `username` = '$username' AND `password` = '$password' LIMIT 1 ";
            $res = $conn->query($sql);

            $sqli = "SELECT * FROM `users` WHERE  `username` = '$username' AND `phone` = '$password' LIMIT 1 ";
            $rest = $conn->query($sqli);
            
            if ($res->num_rows == 1 ) {
            session_start();
            $_SESSION['username']= $username;
            echo "
                <script>
                    swal('Done','Login successfully','success').then(function(res){
                        if(true){
                            window.location='../../dash/'}});
                </script>
            ";
            }
            elseif($rest->num_rows == 1 ) {
                session_start();
                $_SESSION['user']= $username;
                echo "
                <script>
                
                    swal('Done','Login successfully','success')
                    .then(function(res){
                        if(true){
                            window.location='../dashboard'}
                        });
							
                            
                </script>
            ";
            }
        else{
            echo "
                <script>
                
                // alert('register have some error');
        
                    swal('Information','User Not Found','info');
                </script>
            ";
            }
        }
    }

?>