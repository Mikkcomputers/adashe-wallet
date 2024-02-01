<?php

include "../../server/server.php";

session_start();
if (!isset($_SESSION['user'])) {
    header("location: ../login");
}
// include "../login/";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Credit history</title>
    <link rel="stylesheet" href="../../bootstrap5/css/bootstrap.min.css">
    <script src="../sweetalert/jquery.js"></script>
    <link rel="stylesheet" href="../../lineawesome/lineawesome/css/line-awesome.min.css">
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
@media screen and (max-width:250px) {
    th,td{
        font-size: 10px;
    }
}
    </style>
</head>
<body style=" background-color: #efeee5; color:darkblue">
<header>
    <div class="header">
                        <span style="font-size:35px;cursor:pointer; margin-left: 10px;" id=""   ><a href="../dashboard/"><i class="la la-arrow-left" style="color:white"></i></a></span>
                        <h2 style="margin-left:15px" class="text-center"> Welcome To Adashe Wallet</h2>
                        <a href="../logout.php" style="color:white; margin-right:10px"><p><i class="la la-lock"></i>Logout</p></a>
                    </div>
                    <?php
                        $roll1 = $_SESSION['user'];
                        $qry = "SELECT `user` FROM users WHERE `username` = '$roll1' ";
                        $result = $conn->query($qry);
                        $user = $result->fetch_assoc()['user'];        
                    ?>
                    <div class="head1 text-center"><h3>Hi, <?=$_SESSION['user'] ?></h3></div>
    </div>
</header>

    <div class="container">       
        <div class="table">
            <table id="myTable" class="display table text-center table-hover   table-respnsive-md">
                    <h3 class="text-center " style="color:darkblue" >Credit History</h3>
                <?php
                    $qry = " SELECT SUM(amount) As total FROM credit    WHERE `user` = '$user'";
                    $result = $conn->query($qry);
                    $total = $result->fetch_assoc()['total'];
                    $num = number_format($total);
                ?>
                <p id="h33" >All Total <span>&#8358; <?=$num ?></span></p>
                <?php
                ?>
               <thead>     
                    <tr>
                        <th id="col">S/N</th>
                        <th id="col">Username</th>
                        <th id="col">Amount</th>
                        <th id="col">Date</th>
                    </tr>       
               </thead>
               <tbody>
                    <?php
                        $sn = 1;
                            $qry = "SELECT * FROM credit WHERE `user` = '$user'";
                            $result = $conn->query($qry);
                            while($data = $result->fetch_assoc()){
                        ?>
                        <tr>
                        <td><?=$sn++?></td>
                        <td><?=$data['username'];?></td>
                        <td><?=$data['amount'];?></td>
                        <td><?= $data['date'];?></td>
                    <?php } ?>
                        </tr>
               </tbody>
            </table>
        </div>
    </div>
    <script>
        let table = new DataTable('#myTable',{
            pagelength:5,
        });
    </script>
    <script>
        $(document).ready(function(){
            // alert("hello adashe");
        }
        )
    </script>
</body>
</html>