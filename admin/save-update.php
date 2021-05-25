<?php
include "config.php";
if(empty($_FILES['new-image']['name'])){
   $file_name = $_POST['old-image'];
}else{
    $errors = [];
    $file_name = $_FILES['new-image']['name'];
    $file_tmp = $_FILES['new-image']['tmp_name'];
    $file_size = $_FILES['new-image']['size'];
    $file_error= $_FILES['new-image']['error'];
    $extention = end(explode(".",$file_name));
    $img = array("png","jpg","jpeg");
    if(in_array($extention,$img)==false){
        $errors = "you have choose wrong text";
    }
    if($file_size>2097152){
        $errors ="select your image 2kb";
    }
   if(empty($errors)==true){
       move_uploaded_file($file_tmp,"upload/".$file_name);
   }else{
print_r($errors);
   }
}
$id = $_POST['post_id'];
$title = $_POST['post_title'];
$desc = $_POST['postdesc'];
$category = $_POST['category'];
 $sql = "UPDATE post SET title='$title',description='$desc',category=$category,post_img='$file_name' WHERE post_id=$id";
 $result = mysqli_query($conn,$sql) or die("Qruery Failed");
 if($result){
     header("location:{$hostname}/admin/post.php");
 }
 else{
     echo "query not executed";
 }
?>