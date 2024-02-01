

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rules</title>
    <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../sweetalert/sweetalert/dist/sweetalert.min.js">
    <link rel="stylesheet" href="../lineawesome/lineawesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="../dash/style.css">
    <link rel="stylesheet" href="../DataTables/datatables.css">
    <script src="../jquery.js"></script>
    <script src="../DataTables/datatables.js"></script>
<style>
    
    .la{
        font-size:23px;
    }
</style>
</head>
<body style=" background-color: #efeee5; color:darkblue">
    <header> 
                <div class="header">
                    <span style="font-size:35px;cursor:pointer; margin-left: 10px;" id="btn"  onclick="openNav()" ><a href="../dash/"><i class="la la-arrow-left" style="color:white"></i></a></span>
                    <h2 style="margin-left:15px" class="text-center"> Welcome To Adashe Wallet</h2>
                    <a href="../control/logout.php" style="color:white; margin-right:10px"><p><i class="la la-lock"></i>Logout</p></a>
                </div>
                <?php
                include "process.php";
                ?>
                <div class="head1 text-center"><h3>Hi, <?=$_SESSION['username'] ?></h3></div>

            </header>
            <div class="container">

    <!-- <h5 class=" "><a href="../dash/" style="color:darkblue">Back to Dashboard</a></h5> -->

        <div class="row mt-2">
            <div class="container ">
                <form action="index.php" method="post">
                <?php if(count($errors)>0): ?>
                    <div class="alert alert-danger text-center">
                        <?php foreach($errors as $err){ ?>
                        <li>
                            <?php echo $err; ?>
                        </li>
                        <?php } ?>
                        <?php endif ?>
                    </div>
                    <h3 class="text-center " style="color:darkblue">Rules and Regulation</h3>
                    <div class="form-group">
                        <input type="hidden" name="hidden" value="<?=$row['id']; ?>">
                        <input type="text" name="list" value="<?=$list1; ?>" class="form-control text-center" placeholder="Enter Your Task">
                        <?php if($update==true): ?>
                        <button   name="btn_update" style=" background-color: darkblue; color:white" class="btn  mt-3 form-control text-center mb-3">Update</button>
                        <?php else: ?>
                        <button   name="btn" style=" background-color: darkblue; color:white" class="btn  mt-3 form-control text-center mb-3">Add</button>
                            <?php endif ?>
            </div>
         </div>
         
            </form>
        
    
    <div class="container">
            
        <table id="myTable" class="display table  table-border table-hover table-responsive" style="color:darkblue">
             <thead>
                <tr>
                    <th>S/N</th>
                    <th>Task</th>
                    <th>Added Date</th>
                    <th>Action</th>
                </tr>
             </thead>
             <tbody>
                <?php
                $sn=1;
                        $username = $_SESSION['username'];
                        $sql = "SELECT * FROM rules WHERE `user` = '$username'";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()):
                        $id = $row['id'];
                        $list = $row['list'];
                        $date = $row['date'];

                    ?>
                
                <tr>
                    <td><?=$sn++?></td>
                    <td><?=$list?></td>
                    <td><?=$date?></td>
                    <td>
                        <a href="delete.php?delete=<?= $row['id'] ?>"><i class="la la-trash text-danger"></i></a>
                        <a href="index.php?edit=<?= $row['id'] ?>"><i class="la la-edit text-success " ></i></a>
                    </td>
                
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
            // pageLength:5,
        });
    </script>
</body>
</html>
