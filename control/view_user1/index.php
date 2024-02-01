<?php
include "../../server/server.php";
session_start();
if (!isset($_SESSION['user'])) {
    header("location: ../../control/login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All users</title>
    <link rel="stylesheet" href="../../lineawesome/lineawesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="../../bootstrap5/css/bootstrap.min.css">
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
       
        table{
            margin:auto;
            width:100%
        }
        @media screen and (max-width:800px){
    th,td{
        font-size: 12px;
    }
} @media screen and (max-width:250px) {
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
       <!-- <div class="container"> -->
       <div class="table">

            <table id="myTable" class="display table   table-hover  table-respnsive-md" style="color:darkblue">
           
            <!-- <h3 class="alert alert-primary text-center text-primary">All Users</h3> -->
            <!-- <table class="table table-responsive-md"> -->
           
                <h3 class="text-center  ">All Users</h3>
             
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Fullname</th>
                    <th>Username</th>
                    <th>Phone Number</th>
                    <th>Date Register</th>
                    <!-- <th colspan="">Actions<th> -->
                    
                </tr>
            </thead>
             <tbody>
                    <?php
                    $sn = 1;
                    $qry = "SELECT * FROM users WHERE `user` = '$user'";
                    $result = $conn->query($qry);
                    while($data = $result->fetch_assoc()){;
                    ?>
                    <tr>
                        <td><?=$sn++?></td>
                        <td><?=$data['fullname']?></td>
                        <td><?=$data['username']?></td>
                        <td><?=$data['phone']?></td>
                        <td><?=$data['date']?></td>
                    
                    </tr>
                    <?php } ?>
             </tbody>
            </table>
          </div>
       </div>
    </div>
   
    <script>
        let table = new DataTable('#myTable',{
       
            pageLength:5,
        });
            
        
    </script>
</body>
</html>