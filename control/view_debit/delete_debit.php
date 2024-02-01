<?php
include "../connection.php";
// session_start();
// $_SESSION['login']= $username;

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $qry = "DELETE FROM debit WHERE id = $id";
    $result = $conn->query($qry);
    if ($result) {
        header("Location:../view_debit");
    }
}

?>