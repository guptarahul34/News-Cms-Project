<?php
include "config.php";
if(isset($_GET['categoryid'])){
    $userid = $_GET['categoryid'];
     $sql = "DELETE FROM category WHERE category_id=$userid";
    if(mysqli_query($conn,$sql)){
        header("location:{$hostname}/admin/category.php");
    }
}else{
    header("location:{$hostname}/admin/category.php");
    die();
}
?>