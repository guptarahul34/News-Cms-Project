<?php 
include "header.php"; 
include "config.php";
if(isset($_POST['submit'])){
    $title = mysqli_real_escape_string($conn,$_POST['post_title']);
    $desc = mysqli_real_escape_string($conn,$_POST['postdesc']);
    $category = mysqli_real_escape_string($conn,$_POST['category']);
    $date = date("d M,Y");
    $author = $_SESSION['userid'];
    if(isset($_FILES['fileToUpload'])){
        $file_name = $_FILES['fileToUpload']['name'];
        $file_tmp = $_FILES['fileToUpload']['tmp_name'];
        $file_size = $_FILES['fileToUpload']['size'];
        $file_errors = $_FILES['fileToUpload']['size'];
        $errors = [];
        $extention = explode(".",$file_name);
        $ext = end($extention);
         $lower = strtolower($ext);
         $imgArray = ["png","jpg","jpeg"];
         if($file_size > 2097152){
            $errors[] = "please select only 2kb files";
        }
        if(in_array($lower,$imgArray)==false){
            $errors[] = "this extention is not allowed ";
        }
        if(empty($errors)==true){
            move_uploaded_file($file_tmp,"upload/".$file_name);
            $sql = "INSERT INTO post VALUES(null,'$title','$desc',$category,'$date','$author','$file_name');";
            $sql .= "UPDATE category SET post = post + 1 WHERE category_id = $category";
            if(mysqli_multi_query($conn,$sql)){
                header("location:{$hostname}/admin/post.php");
            }else{
                echo "query failed";
            }
        }
        else{
            print_r($errors);
            die();
        }
    }
}
?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Post</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="post_title">Title</label>
                          <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="postdesc" class="form-control" rows="5"  required></textarea>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <select name="category" class="form-control">
                              <option value="" disabled> Select Category</option>
                              <?php
                                $sql = "SELECT * FROM category";
                               $result = mysqli_query($conn,$sql);
                               if(mysqli_num_rows($result)>0){
                                   while($row = mysqli_fetch_assoc( $result)){
                                       ?>
                                       <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
                                       <?php
                                   }
                               }
                              ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Post image</label>
                          <input type="file" name="fileToUpload" required onchange="showImg(event)">
                          <img width="150" height="150" id="img">
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
  <script>
        function showImg(event){
        var reader = new FileReader();
        reader.onload = function(){
        var img = document.getElementById("img");
        img.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
        }
  </script>
<?php include "footer.php"; ?>
