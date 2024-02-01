<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
    <script src="../../sweetalert2/sweetalert2/dist/sweetalert2.all.js"></script>

</head>
<body>
    
</body>
</html>
<?php
include "../connection.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("location: ../login");
}

$error = array();
    $fullname = "";
    $username = "";
    $phone = "";

if(isset($_POST['btn_user'])) {
    $error = array();
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $user = $_SESSION['username'];

    if (empty($fullname)) {
        $error['fullname']="Pleased required full name";
      }
    if (empty($username)) {
      $error['username']="Pleased required username";
    }
    if (empty($phone)) {
        $error['phone']="Pleased required phone number";
      }
      $qur = "SELECT * FROM users WHERE username = '$username' OR phone = '$phone'";
      $result = $conn->query($qur);
      if(mysqli_num_rows($result)>0){
        $error['insert'] = "User Already Exist";
    }
      if (count($error)===0) {
      
    $sql = "INSERT INTO `users`(`fullname`, `username`, `phone`, `user`)VALUES(?,?,?,?)";
    // $result1 = $conn->query($sql);
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss",$fullname, $username ,$phone, $user);
        $result1 = $stmt->execute();
    if ($result1) {
        echo "
        <script>
        // alert('registration successful');
            swal.fire('successfully','thanks $username for Adding you','success');
        </script>
    ";
    }else{
        echo "
        <script>
        swal.fire('error','There is an error','info');
        </script>
    ".$conn->error;
    }
}
}
// }


// EDIT WHEN CLICK EDIT BTN

    // $update = false;
    
    // $fullname = "";
    // $username = "";
    // $phone = "";

    // if(isset($_GET['edit'])){
    //     $update = true;
    //     $id = $_GET['edit'];

    //     $sql = "SELECT * FROM users WHERE id=$id";
    //     $res = $conn->query($sql);
    //     $row = $res->fetch_assoc();
  
    // if ($update==true) {
        
    //     $fullname = $row['fullname'];
    //     $username = $row['username'];
    //     $phone = $row['phone'];
    // }
    // }

    // if (isset($_POST['btn_update'])) {
    //     $id  = $_POST['hidden'];
    //     $fullname = $_POST['fullname'];
    //     $username = $_POST['username'];
    //     $phone = $_POST['phone'];
        
    //     $sql = "UPDATE users SET  fullname = '$fullname', username = '$username', phone = '$phone' WHERE id = $id";
        $update = false;
    
    $fullname = "";
    $username = "";
    $phone = "";

    if(isset($_GET['edit'])){
        $update = true;
        $id = $_GET['edit'];

        $sql = "SELECT * FROM users WHERE id=$id";
        $res = $conn->query($sql);
        $row = $res->fetch_assoc();
  
    if ($update==true) {
        
        $fullname = $row['fullname'];
        $username = $row['username'];
        $phone = $row['phone'];
    }
    }

    if (isset($_POST['btn_update'])) {
        $id  = $_POST['hidden'];
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        
        $sql = "UPDATE users SET  fullname = '$fullname', username = '$username', phone = '$phone' WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location:../vuew_all_user");
        }
    }
?>  
      
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>new user</title>
            <script src="../../sweetalert/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../../bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../lineawesome/lineawesome/css/line-awesome.css">
    <link rel="stylesheet" href="../../dash/style.css">
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
   
<div class="container ">
        <div class="row p-5">
            <div class="col-md-4 offset-md-4 form-div mt-5 ">
                <?php 
                    if ($update==true): ?>
                       
                        <h3 class="text-center  " style="color:darkblue">Update User</h3>
                 <?php   else: ?>
            <h3 class="text-center  " style="color:darkblue">New User</h3>
            <?php endif ?>

                <form action="./" method="post">
                    <?php if(count($error)>0) {?>
                    <div class="alert alert-danger">
                        <?php foreach($error as $err){ ?>
                        <li> <?php echo $err; ?> </li>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <div class="form-group">
                        <input type="hidden" name="hidden" id="" value="<?=$row['id']; ?>">
                        <label for="full_name">Full Name</label>
                        <input type="text" class="form-control"   name="fullname" value="<?=$fullname; ?>">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control"  name="username" value="<?=$username; ?>">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control"  name="phone" value="<?=$phone; ?>">
                    </div>

                    <div class="form-group">
                        <?php if($update==true): ?>
                        <button type="submit" name="btn_update" style=" background-color: darkblue; color:white" class="btn  form-control mt-3">Update</button>
                        <?php  else: ?>
                        <button type="submit" name="btn_user" style=" background-color: darkblue; color:white" class="btn  form-control mt-3">Add</button>
                        <?php endif ?>
                    </div>
                    
                </form>
                <p class="text-center text-primary"><a href="../../dash/" style="color:darkblue">Back to Dashboard</a></p>
            </div>
        </div>
    </div>
    <!-- <link rel="stylesheet" href="../server/server.php"> -->
</body>
</html>