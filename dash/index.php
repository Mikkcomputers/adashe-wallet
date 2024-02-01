<?php
include "../server/server.php";

session_start();
if (!isset($_SESSION['username'])) {
    header("location: ../control/login");
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../lineawesome/lineawesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
         .la{
            font-size: 25px;
        }
    </style>
</head>
<body style=" background-color: #efeee5;">
    <div class="container1">
       
        <section class="" style="border: none;">   
            <header> 
                <div class="header">
                    <!-- &#9776; -->
                    <span style="font-size:35px;cursor:pointer; margin-left: 10px;" id="btn"  onclick="openNav()"><i class="la la-home"></i></span> 
                    <h2 style="margin-left:15px" class="text-center"> Welcome To Adashe Wallet</h2>
                    <a href="../control/logout.php" style="color:white; margin-right:10px"><p><i class="la la-lock"></i>Logout</p></a>
                </div>
               <?php $username = $_SESSION['username']; ?>
                <div class="head1 text-center"><h3>Hi, <?=$username; ?></h3></div>
                <?php
                $sql = "SELECT COUNT(username) as user1 FROM users WHERE user = '$username'";
                $res = $conn->query($sql);
                $data = $res->fetch_assoc()['user1'];

                $sql = "SELECT SUM(amount) as user1 FROM credit  WHERE user = '$username'";
                $res = $conn->query($sql);
                $credit = $res->fetch_assoc()['user1'];

                $sql = "SELECT SUM(amount) as user1 FROM debit  WHERE user = '$username'";
                $res = $conn->query($sql);
                $debit = $res->fetch_assoc()['user1'];

                $sql = "SELECT SUM(amount) as user1 FROM users WHERE user = '$username'";
                $res = $conn->query($sql);
                $users = $res->fetch_assoc()['user1'];
                
                          ?>
                <div class="head2">
                    <div class="" style="border-bottom: 1px solid white;"><i  class="la la-wallet"></i> <br> WALLET BALANCE <br><?=number_format($users)?></div>
                    <div class="" style="border-bottom: 1px solid white;"> <i   class="la la-users"></i> <br>TOTAL USERS <br><?=$data ?></div>
                </div>
                <div class="head3">
                    <div class="" style="border-bottom: 1px solid white;"><i  class="la la-bank"></i><br>CREDIT BALANCE <br><?=number_format($credit);?></div>
                    <div class="" style="border-bottom: 1px solid white;"><i  class="la la-credit-card"></i> <br>DEBIT BALANCE <br><?=number_format($debit)?></div>
                </div>
            </header>
            <div class="cards alert alert-primar">
                <div class="card">
                    <a  href="../add-rules/"><i class="la la-file"></i> <br> Rules</a>
                </div>
                <div class="card">
                    <a  href="../control/new-user" ><i class="la la-wallet"></i> <br> New User</a>
                </div>
                <div class="card">
                    <a href="../control/credit" ><i class="la la-icons"></i> <br>Credit</a>
                </div>
                <div class="card">
                    <a href="../control/debit/" ><i class="la la-bank"></i> <br>Debit</a>
                </div>
                <div class="card">
                    <a href="../control/vuew_all_user/"><i class="la la-eye"></i> <br>View Users</a>
                </div>
                <div class="card">
                    <a href="../control/deposit_of_users/"><i class="la la-users"></i> <br>Users Deposit</a>
                </div>
                <div class="card">
                    <a href="../control/view_credit/" ><i class="la la-history"></i> <br>Credit History</a>
                </div>
                <div class="card">
                    <a href="../control/view_debit" ><i class="la la-history"></i> <br>Debit History</a>
                </div>
                <div class="card">
                    <a href="../control/receipt/"><i class="la la-receipt"></i> <br>Generate Receipt</a>
                </div>
                  </div>
            <div class="cards">
             
            </div>
        </section>
    </div>
    <script src="./script.js"></script>
</body>
</html>