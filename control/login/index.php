
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../../bootstrap5/css/bootstrap.min.css">
</head>
<body style=" background-color: #efeee5; color:darkblue">
    <div class="container">
        <div class="row p-5">
            <div class="col-md-4 offset-md-4 form-div login">
            <h3 class="text-center" style="color:darkblue">Login</h3>
                    <?php
                    include "./process.php";
                     if(count($errors)>0) {?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $err){ ?>
                            <li> <?php echo $err; ?> </li>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    
                          <form action="./" method="post">              
                    <div class="form-group">
                        <label for="username" class="text-center">Username: </label>
                        <input type="text" class="form-control" name="username" >
                    </div>                  
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" placeholder="PhoneN0. as Password For User only" name="password" >
                    </div>                
                    <div class="form-group">
                        <button  name="btn_login" style=" background-color: darkblue; color:white" class="btn  form-control mt-3">Login</button>
                    </div>
                    <p class="text-center text-danger">Forget Password <a href="#../forget/">Click Here</a> </p>
                    <p class="text-center text-dark">Don't Have an Account? <a href="../register/">Register Here</a> </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>