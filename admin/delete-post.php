<?php 
include "config.php";
if(isset($_GET['id'])){
    $id =  $_GET['id'];
    $catid = $_GET['catid'];
    $sql1 = "SELECT * FROM post WHERE post_id = $id";
    $result = mysqli_query($conn,$sql1);
    $row = mysqli_fetch_array($result);
    unlink("upload/".$row['post_img']);
    $sql = "DELETE FROM post WHERE post_id = $id;";
    $sql .= "UPDATE category SET post = post-1 WHERE category_id = $catid";
    $reult = mysqli_multi_query($conn,$sql) or die("Query Failed");
    if($reult){
        header("location:{$hostname}/admin/post.php");
    }
}else{
header("location:{$hostname}/admin/post.php");
die();
}
?>