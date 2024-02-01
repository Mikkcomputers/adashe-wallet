<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="../style.css"> -->
    <!-- <script src="../sweetalert2/sweetalert2/dist/sweetalert2.all.js"></script> -->

    <link rel="stylesheet" href="../../bootstrap5/css/bootstrap.min.css">
    <!-- <script src="../sweetalert2/sweetalert2/dist/sweetalert2.min.js"></script> -->
    <!-- <script src="../sweetalert2/sweetalert2/dist/sweetalert2.all.js"></script> -->
    <style>
        
.form-control{
    box-shadow: 1px 1px 1px 2px blue;
    border-radius: 10px;
}
.col-md-4{
    box-shadow: 1px 1px 1px 2px darkblue;
    padding: 20px;

}
    </style>
</head>
<body style=" background-color: #efeee5; color:darkblue">
    <div class="container">
        <div class="row p-5">
            <div class="col-md-4 offset-md-4 form-div">
            <h3 class="text-center" style="color:darkblue">Register</h3>
            <?php 
                include "process.php";
            if(count($errors)>0) {?>
                    <div class="alert alert-danger">
                        <?php foreach($errors as $err){ ?>
                        <li> <?php echo $err; ?> </li>
                        <?php } ?>
                    </div>
                    <?php } ?>
                <form action="index.php" method="post">
                    <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" class="form-control"  name="fullname">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="number" class="form-control" name="phone">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword">
                    </div>

                    <div class="form-group">
                        <button  name="btn_reg" style=" background-color: darkblue; color:white" class="btn  form-control mt-3">Sign Up</button>
                    </div>

                    <p class="text-center">Already Have an Account? <a href="../login/" style="color:darkblue">Login Here</a> </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>



