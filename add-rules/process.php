<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rules</title>
    <link rel="stylesheet" href="../sweetalert/sweetalert/dist/sweetalert.min.js">

</head>
<body>
    
</body>
</html>
<?php
include "../server/server.php";

session_start();
if (!isset($_SESSION['username'])) {
    header("location: ../control/login");
}

$errors = array();
$list = "";

if (isset($_POST['btn'])) {
    $errors = array();
    $list = $_POST['list'];
    $username = $_SESSION['username'];


    if (empty($list)) {
        $errors['li'] = "Pleased Enter Task";
    }
    if(count($errors)===0){

    $sql = "INSERT INTO rules(`list`, `user`)VALUES(?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $list, $username);
    $result = $stmt->execute();
    if ($result) {
       
        echo "
        <script>
            swal('Successful','Task added','success');
        </script>
    ";
    }

}}


$update = false;
    
    $list1 = "";
    
    if(isset($_GET['edit'])){
        $update = true;
        $id = $_GET['edit'];

        $sql = "SELECT * FROM rules WHERE id = $id";
        $resul = $conn->query($sql);
        $row = $resul->fetch_assoc();
       
    }
  
    if ($update == true) {
        
        $list1 = $row['list'];
       
    }
    

    if (isset($_POST['btn_update'])) {
        $id  = $_POST['hidden'];
        $list = $_POST['list'];
        
        
        $sql = "UPDATE rules SET   list = '$list' WHERE id = $id";
        $result = $conn->query($sql);
        if ($result) {
            header("Location: index.php");
        }
    }
?>  

