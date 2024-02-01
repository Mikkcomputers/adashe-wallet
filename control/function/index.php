<?php
session_start();


// database();
// $conn->close();
function database(){
  include "../connection.php";  
  // session_start();
  // conn_db();
  // global $conn;
  // $_GLOBAL['conn'];

$username = "CREATE TABLE IF NOT EXISTS `admin` (
    `id_admin` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `fullname` varchar(100) NOT NULL,
    `username` varchar(100) NOT NULL UNIQUE,
    `phone` varchar(100) NOT NULL UNIQUE,
    `email` varchar(100) NOT NULL UNIQUE,
    `password` varchar(200) NOT NULL,
    `roll` int(11) NOT NULL DEFAULT '0',
    `verify` int(11) NOT NULL DEFAULT '0',
    `token` int(11) NOT NULL,
    `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";
  $user = "CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `fullname` varchar(100) NOT NULL,
    `username` varchar(100) NOT NULL UNIQUE,
    `phone` varchar(15) NOT NULL UNIQUE,
    `amount` int(11) NOT NULL,
    `id_admin` int(11),
    `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY(id_admin) REFERENCES `admin`(id_admin) 
  )";
  $credit  = "CREATE TABLE IF NOT EXISTS `credit` (
    `id` int(11) NOT NULL,
    `username` varchar(100) NOT NULL,
    `amount` varchar(15) NOT NULL,
    `id_admin` int(11),
    `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY(id_admin) REFERENCES `admin`(id_admin) 
  )";
  $debit = "CREATE TABLE IF NOT EXISTS `debit` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `username` varchar(100) NOT NULL,
    `amount` varchar(15) NOT NULL,
    `id_admin` int(11),
    `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY(id_admin) REFERENCES `admin`(id_admin) 
  )"; 
 
  
  $rules = "CREATE TABLE IF NOT EXISTS `rules` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `list` varchar(200) NOT NULL,
    `id_admin` int(11),
    `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY(id_admin) REFERENCES `admin`(id_admin) 
  )"; 
  // GLOBAL $conn;
  $res = $conn->query($username) && $conn->query($user) && $conn->query($credit) && $conn->query($debit) && $conn->query($rules);
  if(!$res){
    echo "creating table has an error".$conn->error;
  }
//   else{
//   echo "table create successfull";
// } 
}
// database();

?>