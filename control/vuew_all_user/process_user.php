<?php
include "../server/server.php";
// session_start();
// $_SESSION['login']= $username;

$error = array();
$fullname = "";
    $username = "";
    $phone = "";

if(isset($_POST['btn_user'])) {
    $error = array();
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];

    if (empty($fullname)) {
        $error['fullname']="Pleased required full name";
      }
    if (empty($username)) {
      $error['username']="Pleased required username";
    }
    if (empty($phone)) {
        $error['phone']="Pleased required phone number";
      }
      $qur = "SELECT * FROM users WHERE username = '$username' OR phone = '$phone'";
      $result = $conn->query($qur);
      if(mysqli_num_rows($result)>0){
        $error['exist'] = "User already exist";
      }
      if (count($error)===0) {
      
    $sql = "INSERT INTO users(`fullname`, `username`, `phone`)VALUES('$fullname', '$username' ,'$phone')";
    $result = $conn->query($sql);
    // $stmt->bind_param('sss',);
    // $result = $stmt->execute();
    $date = time();
    if ($result) {
        echo "
        <script>
        // alert('registration successful');
            swal('successfull','thanks $username for register','success');
        </script>
    ";
    }else{
        echo "
        <script>
            swal('error','credit have an error','error');
        </script>
    ";
    }
}
}

?>