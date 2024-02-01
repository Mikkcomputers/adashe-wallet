<?php
include "process.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rules</title>
    <link rel="stylesheet" href="../../bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../sweetalert/sweetalert/dist/sweetalert.min.js">
    <link rel="stylesheet" href="../../dash/style.css">
    <link rel="stylesheet" href="../../lineawesome/lineawesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="../../DataTables/datatables.css">
    <script src="../../jquery.js"></script>
    <script src="../../DataTables/datatables.js"></script>
<style>
    
    .la{
        font-size:23px;
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
        
    <h3 class=" text-center " style="color:darkblue">Rules and Regulation</h3>
    <!-- <div class="container"> -->
            
        <table id="myTable" class="display table  ">
             <thead>
                <tr>
                    <th>S/N</th>
                    <th>Task</th>
                    <!-- <th>Added Date</th> -->
                    <!-- <th>Action</th> -->
                </tr>
             </thead>
             <tbody>
                <?php
                $sn=1;
                        $sql = "SELECT * FROM rules WHERE `user` = '$user'";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()):
                        $id = $row['id'];
                        $list = $row['list'];
                        $date = $row['date'];

                    ?>
                
                <tr>
                    <td><?=$sn++?></td>
                    <td><?=$list?></td>
                
                    
                
                </tr>  
                <?php endwhile ?>    

             </tbody>             
            </table>
     </div>
     </div>
     </div>
     <script>
          let table = new DataTable('#myTable', {
            // options
             pageLength:2,
        });
    </script>
</body>
</html>
