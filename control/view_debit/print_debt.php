<?php
include "../connection.php";

session_start();
if (!isset($_SESSION['login'])) {
    header("location: ../login.");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>print</title>
    <link rel="stylesheet" href="../../bootstrap5/css/bootstrap.min.css">
    <style>
        header{

            background: blue;
            /* width: 100%; */
            text-align: center;

        }
        h3{
            font-family: monospace;
            color: white;
            /* padding: 10px; */
            margin-bottom: 3px;
        }
        .col-md-4{
            font-family: monospace;
            border: 2px solid blue;
        }
        
    </style>
</head>
<body>
    <div class="container mt-5 p-5">
        <div class="row">
            <div class="col-md-4 offset-md-4">
               <header class="mt-3">
                <h3>Adashe E - System</h3>
                
                <p class="text-light">Receipt</p>
               </header>
               <?php
                    if (isset($_GET['print'])) {
                        $id = $_GET['print'];
                    
                        $sql = "SELECT * FROM debit WHERE id = $id";
                        $res = $conn->query($sql);
                        $data = mysqli_fetch_assoc($res);
                        
                    
                    
                ?>
               <p><b>Username:</b> <span><?=$data['username']; ?></span></p>
               <p><b>Amount:</b> <span><?=$data['amount']; ?></span></p>
               <p><b>Date:</b> <span><?=$data['date']; ?></span></p>
               <button id="btn" onclick="prt()" class="mt-4">Print</button>
               <button style="float:right" id="btn2" class="mt-4"><a href="../view_debit">Back</a></button>
            </div>
            <?php
                    }
            ?>
        </div>
    </div>
    <script>
        function prt() {
            var btn = document.getElementById('btn');
            var btn2 = document.getElementById('btn2');
            btn.style.visibility = "hidden";
            btn2.style.visibility = "hidden";
            print();
            btn.style.visibility = "visible";
            btn2.style.visibility = "visible";
        }
    </script>
</body>
</html>