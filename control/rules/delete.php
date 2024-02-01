<?php
include "server.php";
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    
    $sql = " DELETE FROM todo WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $result = $stmt->execute();
    if ($result) {
        header('Location: index.php');
    }
}


?>