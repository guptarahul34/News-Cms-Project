<?php
include "config.php";
if(isset($_GET['user_id'])){
    $userid = $_GET['user_id'];
    $sql = "DELETE FROM user WHERE user_id=$userid";
    if(mysqli_query($conn,$sql)){
        header("location:http://localhost/news-cms/admin/users.php");
    }
}else{
    header("location:{$hostname}/admin/users.php");
    die();
}
?>