<?php
include "../connection.php";
// include "../deposit_of_users";
// session_start();
// $_SESSION['login']= $username;

if(isset($_GET['delete'])) {
    $username = $_GET['delete'];

    $qry = "UPDATE  users SET amount = '' WHERE id = $username";
    $result = $conn->query($qry);
    if ($result) {
        header("Location: ../Deposit_of_users");
    }
}

?>