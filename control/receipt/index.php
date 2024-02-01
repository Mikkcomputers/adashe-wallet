<?php
    include "../connection.php";
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
    </style>
</head>
<body style=" background-color: #efeee5;">
<header> 
                <div class="header">
                    <span style="font-size:35px;cursor:pointer; margin-left: 10px;" id=""  onclick="openNav()" ><a href="../../dash/"><i class="la la-arrow-left" style="color:white"></i></a></span>
                    <h2 style="margin-left:15px" class="text-center"> Welcome To Adashe Wallet</h2>
                    <a href="../logout.php" style="color:white; margin-right:10px"><p><i class="la la-lock"></i>Logout</p></a>
                </div>
                <div class="head1 text-center"><h3>Hi, <?=$_SESSION['username'] ?></h3></div>

            </header>

    <div class="container">
        
        <div class="cards">
            <a href="../receipt_credit/">
                <div class="card">Credit</div>
            </a>
            <a href="../receipt2/">
                <div class="card">Debit</div>
            </a>
        </div>
    <!-- <form action="" method="post">
        <div class="form-group">
        <h3>Generate Receipt</h3>
            <label for="Start Date">Start Date</label>
            <input type="text" name="start" class="form-control">
        </div>
        <div class="form-group">
            <label for="end Date">End Date</label>
            <input type="text" name="end" class="form-control">
        </div>
    </form> -->
    </div>
</body>
</html>