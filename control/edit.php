<?php
include "../server/server.php";
// session_start();
// $_SESSION['login']= $username;

$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];

    $qry = "SELECT * FROM users";
    $result = $conn->query($qry);
    $row = $result->fetch_assoc();
    
}

?>