<?php
include "config.php";
                        if(isset($_POST['submit'])){
                            $id =    $_POST['user_id'];
                            $fname = $_POST['f_name'];
                            $lname = $_POST['l_name'];
                            $user =  $_POST['username'];
                            $role =  $_POST['role'];
                            $updatesql = "UPDATE user SET first_name='$fname',last_name='$lname',username='$user', role =$role WHERE user_id=$id";
                            if(mysqli_query($conn,$updatesql)){
                                header("location:http://localhost/news-cms/admin/users.php");
                            }
                            else{
                                echo "Query Failed";
                            }
                        }
                   ?>