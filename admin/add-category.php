<?php include "header.php"; 
include "config.php";
if($_SESSION['roles']==0){
    header("location:{$hostname}/admin/post.php");
    die();
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
                  <?php
                    if(isset($_POST['save'])){
                        $cat = mysqli_real_escape_string($conn,$_POST['cat']);
                        $sql = "INSERT INTO category VALUES(null,'$cat',0)";
                        if(mysqli_query($conn,$sql)){
                            header("location:{$hostname}/admin/category.php");
                        }
                        else{
                            echo "Query Failed";
                        }
                    }
                  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
