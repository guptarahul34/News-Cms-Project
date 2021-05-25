<?php include "header.php"; ?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div><?php
    include "config.php";
        if(isset($_GET['id'])){
           $id = $_GET['id'];
           $sql = "SELECT * FROM post 
           LEFT JOIN category ON post.category = category.category_id
           LEFT JOIN user ON post.author = user.user_id
           WHERE post_id = $id";
           $result = mysqli_query($conn,$sql) or die("Query Failed");
           if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                ?>
                
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        <form action="save-update.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $row['post_id']; ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?php echo $row['title']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="postdesc" class="form-control"  required rows="5">
                <?php echo $row['description']; ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="category">
                <option value="" disabled> Select Category</option>
                              <?php
                                $sql1 = "SELECT * FROM category";
                               $result1 = mysqli_query($conn,$sql1);
                               if(mysqli_num_rows($result1)>0){
                                   while($row1 = mysqli_fetch_assoc($result1)){
                                       if($row['category']==$row1['category_id']){
                                           $selected = "selected";
                                       }else{
                                        $selected = "";
                                       }
                                       ?>
                                       <option value="<?php echo $row1['category_id']; ?>" <?php echo $selected; ?>><?php echo $row1['category_name']; ?></option>
                                       <?php
                                   }
                               }
                              ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image" onchange="showImg(event)">
                <img src="upload/<?php echo $row['post_img']; ?>" height="150" width="150" id="img">
                <input type="hidden" name="old-image" value="<?php echo $row['post_img']; ?>">
            </div>
            <?php
            }
           }else{
               echo "no records found";
           }
        }
        else{
            header("location:{$hostname}/admin/post.php");
            die();
        }
    ?>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<script>
    function showImg(event){
        var reader = new FileReader();
        reader.onload = function(){
            let img = document.getElementById("img");
            img.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
<?php include "footer.php"; ?>
