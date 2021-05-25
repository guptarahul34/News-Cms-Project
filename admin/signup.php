<?php
session_start();
?>
<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <img class="logo" src="images/news.jpg">
                        <h3 class="heading">Admin</h3>
                        <!-- Form Start -->
                        <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="first" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="second" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>UserName</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                               <label>User Role</label>
                              <select class="form-control" name="role">
                               <option value="0">Normal</option>
                               <option value="1">Admin</option>
                              </select>
                            </div>
                            <div class="account">
                             <a href="index.php">Login Here</a>
                            </div><br>
                            <input type="submit" name="signup" class="btn btn-primary" value="Sign Up" />
                        </form>
                        <?php
                            include "config.php";
                            if(isset($_POST['signup'])){
                                $fisrt = mysqli_real_escape_string($conn,$_POST['first']);
                                $second = mysqli_real_escape_string($conn,$_POST['second']);
                                $username = mysqli_real_escape_string($conn,$_POST['username']);
                                $password = mysqli_real_escape_string($conn,md5($_POST['password']));
                                $role = mysqli_real_escape_string($conn,$_POST['role']);
                                $sql = "INSERT INTO `user`(`first_name`, `last_name`, `username`, `password`, `role`) VALUES ('$fisrt','$second','$username','$password',$role)";
                                $result = mysqli_query($conn,$sql);
                                if($result){
                                    header("location:index.php");
                                }else{
                                    echo "<script>alert('something went wrong');</script>";
                                }
                            }
                        ?>
                        <!-- /Form  End -->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
