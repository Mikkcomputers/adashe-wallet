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
                    <span id="h3" style="font-size:35px;cursor:pointer; margin-left: 10px;" id=""  onclick="openNav()" ><a href="../receipt/"><i class="la la-arrow-left" style="color:white"></i></a></span>
                    <h2 style="margin-left:15px" class="text-center"> Welcome To Adashe Wallet</h2>
                    <a id="h3" href="../control/logout.php" style="color:white; margin-right:10px"><p id="h3"><i id="h3" class="la la-lock"></i>Logout</p></a>
                </div>
                <div id="h3" class="head1 text-center"><h3>Hi, <?=$_SESSION['username']; ?></h3></div>

            </header>

    <div class="container">
    <form action="" method="post" id="form">
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
            <button name="btn" id="btn2" class="btn btn-secondary"><i class="la la-search"></i></button>
            <!-- <button name="btn" class="btn form-control text-light mt-3" style="background-color: #513794;">Send</button> -->
        </div>
        <div class="form-group text-center col-md-4">
            <label for="print">Print</label> <br>
            <button name="btn" id="btn" onclick="prt()" class="btn btn-danger"><i class="la la-print"></i></button>
            
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
         if (isset($_POST['btn'])) {
            // $user = $_SESSION['username'];
            $start = $_POST['start'];
            $end = $_POST['end'];
    
            // $sql = "SELECT * FROM credit WHERE `username`LIKE '%$start%' OR `amount` LIKE '%$start%' ";
            // $ress = $conn->query($sql);
            $roll1 = $_SESSION['username'];
            $qry = "SELECT `user` FROM users WHERE `username` = '$roll1' ";
            $result = $conn->query($qry);
            $user = $result->fetch_assoc()['user'];

            $sql = "SELECT * FROM credit WHERE `date` BETWEEN '$start' AND '$end' WHERE `user` = 'mikk computers' ";
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

    <script>
        function prt() {
            var btn = document.getElementById('btn');
            var btn2 = document.getElementById('btn2');
            btn.style.display = "none";
            btn2.style.display = "none";
            document.getElementById('form').style.display = "none";
            document.getElementById('h3').style.display = "none";
            // document.getElementsByTagName('form, h3').style.visibility = "hidden";
            print();
            btn.style.display = "block";
            btn2.style.display = "block";
            document.getElementById('form').style.display = "block";
            document.getElementById('h3').style.display = "block";
            // document.getElementsByName('form, h3').style.visibility = "visible";
        }
    </script>
</body>
</html>