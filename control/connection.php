<?php
// function conn_db() {
    // session_start();
    define("HOST","localhost");
    define("USER","root");
    define("PASS","");
    define("DB_NAME","adashe_esystem");

     $conn = new mysqli(HOST,USER,PASS,DB_NAME);
    if (!$conn) {
        echo "erro during create database".$conn->connect_error;
    }
    // else{
    //     echo "success";

    // }
    // $_GLOBAL['conn'] = $conn;
// }
// conn_db();
?>