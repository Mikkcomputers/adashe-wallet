<?php
    include "process.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debit</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../../bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../dash/style.css">
    <link rel="stylesheet" href="../../lineawesome/lineawesome/css/line-awesome.css">
    <!-- <link rel="stylesheet" href=> -->
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
            <h3 class="text-center" style="color:darkblue">Debit</h3>
            <?php if(count($error)>0) {?>
                    <div class="alert alert-danger">
                        <?php foreach($error as $err){ ?>
                        <li> <?php echo $err; ?> </li>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <form action="index.php" method="post">
                <input type="hidden" name="hidden" value="<?=$row['id']; ?>">


                <!-- <div class="form-group"> -->
                        <label for="username">Username</label>
                       
                        
                    <div class="form-group">

                        <select name="username" id="" class="form-control form-select mb-4">
                            <?php 
                                if($update==true):  ?>
                                <option value="<?=$row['username']; ?>"><?=$row['username']; ?></option>
                                <?php else:?>
                                    <?php
                                    $new = $_SESSION['username'];
                                    $que = "SELECT * FROM users WHERE `user` = '$new'";
                                    $res = $conn->query($que);
                                    ?>
                    
                        <?php while($user = $res->fetch_assoc()){?>
                            <!-- <option value="">Choose Username</option> -->
                            <option value="<?=$user['username']; ?>"><?=$user['username']; ?></option>
                            <?php } ?>
                            <?php endif ?>
                    </div>
                    </select>
                    <div class="form-group">
                        
                        <!-- <label for="">Usersname</label> -->
                        <label for="amount">amount</label>
                        <input type="number" class="form-control mb-3" name="amount" value ="<?=$amount ?>">
                        </div>
                    <div class="form-group">
                        <?php if($update==true): ?>
                        <button type="submit" name="btn_update" style="background-color:darkblue; color:white;" class="btn  form-control mt-3">Update</button>
                        <?php else: ?>
                        <button type="submit" name="btn_debit" style="background-color:darkblue; color:white;" class="btn form-control mt-3">Withdraw</button>
                        <?php endif ?>
                    </div>
                    <p class="text-center text-primary"><a href="../../dash/" style="color:darkblue;">Back to Dashboard</a></p>

                    <!-- <p class="text-center">Don't Have an Account? <a href="signup.php">Register Here</a> </p> -->
                </form>

            </div>
        </div>
    </div>
</body>
</html>