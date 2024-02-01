<?php
include "process.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credit</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../../bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../dash/style.css">
    <link rel="stylesheet" href="../../lineawesome/lineawesome/css/line-awesome.css">
    <script src="../../sweetalert/sweetalert/dist/sweetalert.min.js"></script>
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

    <div class="container" >
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div login ">
            <h3 class="text-center text-blue" style="color:darkblue">Credit</h3>
            <?php if(count($error)>0) {?>
                    <div class="alert alert-danger">
                        <?php foreach($error as $err){ ?>
                        <li> <?php echo $err; ?> </li>
                        <?php } ?>
                    </div>
                    <?php } ?>
                <form action="index.php" method="post">
                <input type="hidden" name="hidden" value="<?=$row['id']; ?>">


                <div class="form-group">
                        <label for="username">Username</label>
                       
                        
                    <div class="form-group">

                        <select name="username" id="" class="form-control form-select mb-4">
                            <?php 
                                if($update==true):  ?>
                                <option value="<?=$row['username']; ?>"><?=$row['username']; ?></option>
                                <?php else:?>
                                    <?php
                                    $user = $_SESSION['username'];
                                    $que = "SELECT * FROM users WHERE `user` = '$user'";
                                    $res = $conn->query($que);
                                    ?>
                    
                        <?php while($data = $res->fetch_assoc()){?>
                            <!-- <option value="">Choose Username</option> -->
                            <option value="<?=$data['username']; ?>"><?=$data['username']; ?></option>
                            <?php } ?>
                            <?php endif ?>
                       
                    </div>
                    </select>
                    <div class="form-group">
                        <label for="password">amount</label>
                        <input type="number" class="form-control" name="amount" value ="<?=$amount ?>">
                  
                    <div class="form-group">
                        <?php if($update==true): ?>
                        <button type="submit" name="btn_update" class="btn btn-primary form-control mt-3">Update</button>
                        <?php else: ?>
                        <button type="submit" name="btn_credit" style="background-color:darkblue; color:white;" class="btn  form-control mt-3">Add Credit</button>
                        <?php endif ?>
                    </div>
                    <p class="text-center " ><a href="../../dash" style="color:darkblue">Back to Dashboard</a></p>

                    <!-- <p class="text-center">Don't Have an Account? <a href="signup.php">Register Here</a> </p> -->
                </form>
            </div>
        </div>
    </div>
</body>
</html>