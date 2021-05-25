<?php 
include "header.php"; 
include "config.php";
if(isset($_GET['categoryid'])){
    $category_id = $_GET['categoryid'];
    $sql = "select * from category where category_id = $category_id";
    $result = mysqli_query($conn,$sql) or die("Query Failed");
    if(mysqli_num_rows($result)){
            while($row = mysqli_fetch_assoc($result)){
                ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['category_id']; ?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name']; ?>"  placeholder="Category Name" required>
                      </div>
                      <?php
                    }
                    }
                }
                ?>
                      <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                  </form>
                  <?php
                  if(isset($_POST['sumbit'])){
                      $id = $_POST['cat_id'];
                      $cat_name = mysqli_real_escape_string($conn,$_POST['cat_name']);
                    $updatesql = "UPDATE category SET category_name = '$cat_name' WHERE category_id =$id";
                    if(mysqli_query($conn,$updatesql)){
                        header("location:{$hostname}/admin/category.php");
                    }
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
