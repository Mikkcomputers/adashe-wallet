<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debit</title>
    <script src="../../sweetalert2/sweetalert2/dist/sweetalert2.all.js"></script>

</head>
<body>
    
</body>
</html>
<?php
include "../../server/server.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("location: ../login");
}

    $error = array();
    $username = "";
    $amount = "";

if(isset($_POST['btn_debit'])) {
    $error = array();
    $username = $_POST['username'];
    $amount = $_POST['amount'];
    $user = $_SESSION['username'];

    if (empty($username)) {
        $error['fullname'] = "Pleased enter Username";
    }
    if (empty($amount)) {
        $error['amount'] = "Pleased enter Amount";
    }
    if (count($error)===0) {

        
            //INSERT INTO USERS TABLE
    $sql2 = "SELECT SUM(amount) as total FROM `credit` WHERE `username` = '$username'";
    $res2 = $conn->query($sql2);
    // $data = $res2->fetch_assoc()['total'];
    // $credit_username = $data['username'];
    // $credit_amount = $data['amount'];
    $credit_amount = $res2->fetch_assoc()['total'] - $amount;
    
    $qry = "UPDATE `users` SET `amount` = ? WHERE `username` = ?";
    $stmt = $conn->prepare($qry);
    $stmt->bind_param("is", $credit_amount, $username);
    $res = $stmt->execute();


    $sql = "INSERT INTO debit(`username`,`amount`, `user`)VALUES(?,?,?)";
    // $result = $conn->query($sql);
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sis", $username, $amount, $user);
        $result = $stmt->execute();

    if ($result) {
        echo "
        <script>
        // alert('registration successful');
            swal.fire('Done','$username Withdraw $amount','success').then(()=>{window.location='../view_debit'});
        </script>
    ";
    }else{
        echo "
        <script>
            swal.fire('error','debit have an error','error');
        </script>
    ";
    }
}}
//UPDATE WALLET BALANCE


// $sql = "UPDATE `users` SET amount = $new_balance  WHERE username = '$username' ";
//  $result = $conn->query($sql);




// EDIT
$update = false;
    
    
    $username = "";
    $amount = "";

    if(isset($_GET['edit'])){
        $update = true;
        $id = $_GET['edit'];

        $sql = "SELECT * FROM debit WHERE id=$id";
        $res = $conn->query($sql);
        $row = $res->fetch_assoc();
  
    if ($update==true) {
        $username = $row['username'];
        $amount = $row['amount'];
    }
    }

    //UPDATE

    if (isset($_POST['btn_update'])) {
        $id  = $_POST['hidden'];
        $username = $_POST['username'];
        $amount = $_POST['amount'];
        
        $sql = "UPDATE debit SET   username = '$username', amount = '$amount' WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: view_debit.php");
        }


    }
   
?>  
