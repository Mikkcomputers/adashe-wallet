<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="../../sweetalert2/sweetalert2/dist/sweetalert2.all.js"></script>
</head>
<body>
    
</body>
</html>
<?php

    include "../../server/server.php";
    $errors = array();
    $fullname = "";
    $username = "";
    $email = "";
    $phone = "";
    $password = "";
    $cpassword = "";
    
    if(isset($_POST['btn_reg'])) {
        
        $errors = array();
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $verify = false;
        $token = substr(time()*rand(),1,6);
        $roll = 1;

        // validations

        if(empty($fullname)){
            $errors['fullname'] = 'Full Name Required';
        } 

        if(empty($username)){
            $errors['username'] = 'Username Required';
        } 

        if(empty($email)){
            $errors['email'] = 'Email Address Required';
        }  
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['validate'] = 'Invalid Email Address';
        } 
        
        if(empty($phone)){
            $errors['phone'] = 'Phone Number Required';
        }  
        
        if(empty($password)){
            $errors['password'] = 'Password Required';
        } 
        
        if(empty($cpassword)){
            $errors['cpassword'] = 'Confirm Password Required';
        } 
        
        if($password!=$cpassword){
            $errors['mismatch'] = 'The two passwords mismatched';
        }
        // if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
        //         $errors['validate'] = "Invalid Email Address";
        // }
        // $dublicate = "SELECT * FROM `admin` WHERE username = ? OR `password` = ? OR email = ?";
        // $stmt = $conn->prepare($dublicate);
        // $stmt->bind_param("sss", $username, $password, $email);
        // $stmt->execute();
        // $ress = $stmt->get_result();
        // $row_count = $ress->num_rows;
        // if ($row_count >0) {
        //     $errors['exists'] = 'User already Exists';
        // }
        
        // else{
        //     echo "error";
        // }
        // $stmt->close();

        if(count($errors)===0){
            $password = password_hash($password, PASSWORD_DEFAULT);
            

    $sql = "INSERT INTO `admin` (`fullname`, `username`, `phone`, `Email`, `password`,`roll`,`token`) VALUES(? ,?, ?, ?, ?, ?, ?)";
    // $result = $conn->query($sql);
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssii', $fullname, $username, $phone, $email, $password, $roll, $token);
    $result = $stmt->execute();
    if($result){
        echo "
            <script>
            // alert('register successfully');
                swal.fire('Successful','register successfully','success')
                .then( function(res){
                    if(true){
                        window.location='../login'
                    }
                })
            </script>
        ";
        }
    else{
        echo "
            <script>
                swal.fire('error','register have some error','error');
            </script>
        ";
    }}
}

// }

// include "../function/index.php";
// database($con);
// register($conn);


?>