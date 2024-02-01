<?php
include "../connection.php";
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $qry = "DELETE FROM credit WHERE id = $id";
    $result = $conn->query($qry);
    if ($result) {
        header("location:../view_credit");
    }
}

?>