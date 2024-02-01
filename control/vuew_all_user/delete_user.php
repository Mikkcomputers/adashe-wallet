<?php
include "../connection.php";
// session_start();
// $_SESSION['login']= $username;

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $qry = "DELETE FROM users WHERE id = $id";
    $result = $conn->query($qry);
    if ($result) {
        header("Location:./");
    }
}

?>