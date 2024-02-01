<?php
    include "../connection.php";
    session_start();
if (!isset($_SESSION['login'])) {
    header("location: ../control/login");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <link rel="stylesheet" href="../../dash/style.css">
    <link rel="stylesheet" href="../../lineawesome/lineawesome/css/line-awesome.css">
    <link rel="stylesheet" href="../../bootstrap5/css/bootstrap.min.css">
    <style>
        .cards{
            display: grid;
            grid-template-columns: repeat(2,1fr);
            align-items: center;
            justify-content: space-around;
            text-align: center;
            margin-top: 30px;
        }
        .card{
            padding: 20px;
        }
        a{
            text-decoration: none;
            /* color:# */
        }
        /* table{
            margin:auto;
            width: 80%;
        } */
        input,button{
            border: none;
            outline: none;
        }
    </style>
</head>
<body style=" background-color: #efeee5;">
<header> 
                <div class="header">
                    <span style="font-size:35px;cursor:pointer; margin-left: 10px;" id=""  onclick="openNav()" ><a href="../receipt/"><i class="la la-arrow-left" style="color:white"></i></a></span>
                    <h2 style="margin-left:15px" class="text-center"> Welcome To Adashe Wallet</h2>
                    <a href="../control/logout.php" style="color:white; margin-right:10px"><p><i class="la la-lock"></i>Logout</p></a>
                </div>
                <?php
                    $ne = $_SESSION['login'];
                    $qery = "SELECT * FROM users WHERE username = '$ne' ";
                    $result = $conn->query($qery);
                    $dat = $result->fetch_assoc();
                ?>
                <div class="head1 text-center"><h3>Hi, <?=$dat['username'] ?></h3></div>

            </header>

    <div class="container">
    <form action="" method="post">
        <div class="form-group">
        <h3>Generate Credit Receipt</h3>
        
            <label for="Start Date">Start Date</label>
            <input type="date" name="start" class="form-control" require>
        </div>
        <div class="form-group">
            <label for="end Date">End Date</label>
            <input type="date" name="end" class="form-control" require>
        </div>
       <div class="row">
           <div class="form-group mt-3 form-contro text-center col-md-4" style="text-align: center;">
            <label for="search">Search</label> <br>
            <button name="btn" class="btn btn-secondary"><i class="la la-search"></i></button>
            <!-- <button name="btn" class="btn form-control text-light mt-3" style="background-color: #513794;">Send</button> -->
        </div>
        <div class="form-group text-center col-md-4">
            <label for="print">Print</label> <br>
            <button name="btn" class="btn btn-danger"><i class="la la-print"></i></button>
            
        </div>
        <div class="col-md-4 mt-4">
            <p>Total:</p>
        </div>
       </div>
    </form>
    <?php
   
    ?>
    </div>
    <table class="table table-hover">
        <thead>
           <tr>
                <th>S/N</th>
                <th>Username</th>
                <th>Amount</th>
                <th>Date</th>
           </tr>
        </thead>
        <tbody>
        <?php
        include "../connection.php";
         if (isset($_POST['btn'])) {
            $start = $_POST['start'];
            $end = $_POST['end'];
    
            // $sql = "SELECT * FROM credit WHERE `username`LIKE '%$start%' OR `amount` LIKE '%$start%' ";
            // $ress = $conn->query($sql);
            $sql = "SELECT * FROM credit WHERE `date` BETWEEN '$start' AND '$end'";
            $ress = $conn->query($sql);
            $sn = 1;
        while ($row = $ress->fetch_assoc()):
        ?>
            <tr>
                <td><?=$sn++?></td>
                <td><?=$row['username']?></td>
                <td><?=$row['amount']?></td>
                <td><?=$row['date']?></td>
            </tr>
            <?php
            endwhile;
        }
            ?>
        </tbody>
    </table>
</body>
</html>