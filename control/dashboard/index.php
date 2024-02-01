<?php
include "../../server/server.php";

session_start();
if (!isset($_SESSION['user'])) {
    header("location: ../login");
}else{
    $roll = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../lineawesome/lineawesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="../../dash/style.css">
</head>
<body class="" style=" background-color: #efeee5;">
    <header> 
                <div class="header">
                    <span style="font-size:35px;cursor:pointer; margin-left: 10px;" id="btn"  onclick="openNav()">&#9776;</span>
                    <h2 style="margin-left:15px" class="text-center"> Welcome To Adashe Wallet</h2>
                    <a href="../logout.php" style="color:white; margin-right:10px"><p><i class="la la-lock"></i>Logout</p></a>
                </div>
                <div class="head1 text-center"><h3>Hi, <?=$_SESSION['user']; ?></h3></div>
                <?php
                
                $roll1 = $_SESSION['user'];
                $qry = "SELECT `user` FROM users WHERE `username` = '$roll1' ";
                $result = $conn->query($qry);
                $user = $result->fetch_assoc()['user'];

                $sql = "SELECT COUNT(username) as user1 FROM `users` WHERE `user` = '$user'";
                $res = $conn->query($sql);
                $data = $res->fetch_assoc()['user1'];

                $sql = "SELECT SUM(amount) as user1 FROM credit WHERE `user` = '$user'";
                $res = $conn->query($sql);
                $credit = $res->fetch_assoc()['user1'];

                $sql = "SELECT SUM(amount) as user1 FROM debit WHERE `user` = '$user'";
                $res = $conn->query($sql);
                $debit = $res->fetch_assoc()['user1'];

                $sql = "SELECT SUM(amount) as user1 FROM users WHERE `user` = '$user' ";
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
           
            <?php
                // $sql = "SELECT COUNT(username) as user1 FROM users";
                // $res = $conn->query($sql);
                // $data = $res->fetch_assoc()['user1'];

                // $sql = "SELECT SUM(amount) as user1 FROM credit";
                // $res = $conn->query($sql);
                // $credit = $res->fetch_assoc()['user1'];

                // $sql = "SELECT SUM(amount) as user1 FROM debit";
                // $res = $conn->query($sql);
                // $debit = $res->fetch_assoc()['user1'];

                // $sql = "SELECT SUM(amount) as user1 FROM users";
                // $res = $conn->query($sql);
                // $users = $res->fetch_assoc()['user1'];
                
            ?>
            <div class="cards mt-3">
          <div class="card">
                    <a  href="../rules/"><i class="la la-file"></i> <br> Rules</a>
                </div>
               
                <!-- <div class="card">
                    <a href="../control/credit" ><i class="la la-icons"></i> <br>Credit</a>
                </div>
                <div class="card">
                    <a href="../control/debit/" ><i class="la la-bank"></i> <br>Debit</a>
                </div> -->
                <div class="card">
                    <a href="../view_user1/"><i class="la la-eye"></i> <br>View Users</a>
                </div>
                <div class="card">
                    <a href="../depodit_of_user1/"><i class="la la-users"></i> <br>Users Deposit</a>
                </div>
                <div class="card">
                    <a href="../view_credit1/" ><i class="la la-history"></i> <br>Credit History</a>
                </div>
                <div class="card">
                    <a href="../view_debit1/" ><i class="la la-history"></i> <br>Debit History</a>
                </div>
                <div class="card">
                    <a href="#../../control/receipt_user/"><i class="la la-receipt"></i> <br>Generate Receipt</a>
                </div>
                  </div>
        </section>
    </div>
    <script>
        function openNav() {
          document.getElementById("mySidenav").style.width = "180px";
          document.getElementById("mySidenav").style.visibility = "visible";
        }
        
        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
          document.getElementById("mySidenav").style.visibility = "hidden";
        }
        </script>
        


</body>
</html>