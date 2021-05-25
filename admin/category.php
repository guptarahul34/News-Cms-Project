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
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            if(isset($_GET['page']))
                            {
                                $page = $_GET['page'];
                            }
                            else{
                                $page = 1;
                            }
                            $limit = 3;
                             $offset = ($page-1)*$limit;
                             $sql = "SELECT * FROM category limit $offset,$limit";
                                $result = mysqli_query($conn,$sql) or die("Query Failed1");
                                if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        ?>       
                            <td class='id'><?php echo $row['category_id'];?></td>
                            <td><?php echo $row['category_name'];?></td>
                            <td><?php echo $row['post'];?></td>
                            <td class='edit'><a href='update-category.php?categoryid=<?php echo $row['category_id']; ?>'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete-category.php?categoryid=<?php echo $row['category_id']; ?>'><i class='fa fa-trash-o'></i></a></td>
                        </tr>   
                        <?php
                                    }
                                }
                               ?>
                    </tbody>
                </table>
                    <!-- <li class="active"><a>1</a></li> -->
                    <?php
                     $sql1 = "SELECT * FROM category";
                     $result1 = mysqli_query($conn,$sql1) or die();
                     if(mysqli_num_rows($result1)>0){
                         $totalrecords = mysqli_num_rows($result1);
                         $limit = 3;
                         $totalpage = ceil($totalrecords/$limit);
                         echo "<ul class='pagination admin-pagination'>";
                         if($page>1){
                            echo "<li><a href='category.php?page=".($page-1)."'>Prev</a></li>";
                         }
                         for($i=1;$i<=$totalpage;$i++){
                             if($page == $i){
                                 $active = "active";
                             }
                             else{
                                 $active = "";
                             }
                              echo "<li class='$active'><a href='category.php?page=$i'>$i</a></li>";
                         }
                         if($totalpage >$page){
                            echo "<li><a href='category.php?page=".($page+1)."'>Next</a></li>";
                         }
                         echo "</ul>";
                     }
                  ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
