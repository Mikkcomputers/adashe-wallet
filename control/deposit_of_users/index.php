<?php

include "../connection.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("location: ../login");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Total Deposit</title>
    <link rel="stylesheet" href="../../bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../lineawesome/lineawesome/css/line-awesome.css">
    <link rel="stylesheet" href="../../dash/style.css">
    <link rel="stylesheet" href="../../DataTables/datatables.css">
    <script src="../../jquery.js"></script>
    <script src="../../DataTables/datatables.js"></script>
    <style>
        .la{
            font-size:25px;
        }
        #del{
            color:red;
        }
        #edit{
            color:blue;
        }
        span{
            color:red;
            text-align:center;
        }
        #h33{
            text-align:left;
        }
        a{
            text-decoration:none;
        }
        @media screen and (max-width:800px){
    th,td{
        font-size: 12px;
    }
}
    </style>
</head>
<body style=" background-color: #efeee5; color:darkblue">
<header> 
                <div class="header">
                    <span style="font-size:35px;cursor:pointer; margin-left: 10px;" id=""  onclick="openNav()" ><a href="../../dash/"><i class="la la-arrow-left" style="color:white"></i></a></span>
                    <h2 style="margin-left:15px" class="text-center"> Welcome To Adashe Wallet</h2>
                    <a href="../logout.php" style="color:white; margin-right:10px"><p><i class="la la-lock"></i>Logout</p></a>
                </div>
                <div class="head1 text-center"><h3>Hi, <?=$_SESSION['username'] ?></h3></div>
            </header>
    <div class="container">
        <div class="table">
            <table id="myTable" class=" display table text-center table-hover   table-respnsive-md" style="color:darkblue">
                    <h3 class="text-center " style="color:darkblue">Total Users Deposit</h3>
                <?php
                    $user = $_SESSION['username'];
                    $qry = " SELECT SUM(amount) As total FROM users WHERE `user` = '$user'";
                    $result = $conn->query($qry);
                    $total = $result->fetch_assoc()['total'];
                    $num = number_format($total);
                ?>
                <p id="h33" >All Total <span>&#8358;<?=$num; ?></span></p>
               <thead>
                    <tr >
                        <th id="col">S/N</th>
                        <th id="col">Username</th>
                        <th id="col">Amount</th>
                        <th id="col">Date</th>
                        <th id="col">Delete</th>
                    </tr>
               </thead>
               <tbody>
               <?php
                    $sn = 1;
                        $qry = "SELECT * FROM users WHERE `user` = '$user'";
                        $result = $conn->query($qry);
                        while($data = $result->fetch_assoc()){
                        
                    
                    ?>
                <tr>
                    
                    <td><?=$sn++?></td>
                    <td><?=$data['username'];?></td>
                    <td><?=$data['amount'];?></td>
                    <td><?= $data['date'];?></td>
                    <td><a href="delete_deposit_user.php?delete=<?= $data['id'];?>">Delete</a></td>
                       <?php } ?>
                </tr>
               </tbody>
                
            </table>
        </div>
        

    </div>
    <script>
         let table = new DataTable('#myTable', {
            // options
            pageLength:5,
        });
    </script>
</body>
</html>