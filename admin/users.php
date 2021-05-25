<?php 
error_reporting(0);
include "header.php"; 
if($_SESSION['roles']==0){
    header("location:{$hostname}/admin/post.php");
    die();
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                          <tr>
                              <?php
                              include "config.php"; 
                              if(isset($_GET['page'])){
                                  $page = $_GET['page'];
                              }
                              else{
                                  $page = 1;
                              }
                              $limits = 3;
                              $offset = ($page-1)*$limits;
                                $sql = "select * from user LIMIT $offset,$limits"; 
                               $result = mysqli_query($conn,$sql);
                               while($row = mysqli_fetch_assoc($result)){
                                   ?>
                                   <td class='id'><?php echo $row['user_id']; ?></td>
                                    <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php 
                                     if($row['role']==0){
                                         echo "Normal";
                                     }
                                     else{
                                        echo "Admin";
                                     }
                                    ?></td>
                                    <td class='edit'><a href='update-user.php?user_id=<?php echo $row['user_id']; ?>'><i class='fa fa-edit'></i></a></td>
                                    <td class='delete'><a href='delete-user.php?user_id=<?php echo $row['user_id']; ?>'><i class='fa fa-trash-o'></i></a></td>
                                    </tr>
                                   <?php
                                   }
                              ?>                                                   
                      </tbody>
                  </table>
                  <?php
                     $sql1 = "SELECT * FROM user";
                     $result1 = mysqli_query($conn,$sql1) or die();
                     if(mysqli_num_rows($result1)>0){
                      $totalrecors = mysqli_num_rows($result1);
                      $limits = 3;
                      $totalpage = ceil($totalrecors/$limits);
                      echo "<ul class='pagination admin-pagination'>";
                      if($page > 1){
                          echo '<li><a href="users.php?page='.($page-1).'">Prev</a></li>';
                      }
                      for($i=1;$i<=$totalpage;$i++){
                          if($i==$page){
                              $active = "active";
                          }
                          else{
                              $active="";
                          }
                          echo "<li class='$active'><a href='users.php?page=$i'>$i</a></li>";
                           }
                           if($totalpage>$page){
                              echo "<li><a href='users.php?page=".($page+1)."'>Next</a></li>";
                           }
                           echo "</ul>";
                              }
                  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
