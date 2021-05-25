<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                <?php 
                if(isset($_GET['aid'])){
                    $author_id = $_GET['aid'];
                }
                 $selectsql = "SELECT * FROM post JOIN user
                 ON post.author=user.user_id
                  WHERE post.author = $author_id";
                 $results2 = mysqli_query($conn,$selectsql) or die("Select Query Failed Category");
                $value =  mysqli_fetch_array($results2);
                ?>
                  <h2 class="page-heading"><?php echo $value['username']; ?></h2>
                    <div class="post-content">
                    <?php
                              if(isset($_GET['aid'])){
                                $author_id = $_GET['aid'];
                            }
                              if(isset($_GET['page'])){
                                  $page = $_GET['page'];
                              }
                              else{
                                  $page = 1;
                              }
                              $limits = 3;
                              $offset = ($page-1)*$limits;
                              $sql = "SELECT * FROM post
                                 LEFT JOIN category ON post.category = category.category_id
                                 LEFT JOIN user ON post.author = user.user_id
                                 WHERE post.author = {$author_id}
                                 ORDER BY post.post_id DESC LIMIT $offset,$limits";
                                  $result = mysqli_query($conn,$sql) or die("Query Failed");
                                  while($row1 = mysqli_fetch_assoc($result)){
                                      ?>
                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?id=<?php echo $row1['post_id']; ?>"><img src="admin/upload/<?php echo $row1['post_img']; ?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php?id=<?php echo $row1['post_id']; ?>'><?php echo $row1['title']; ?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php?catid=<?php echo $row1['category_id']; ?>'><?php echo $row1['category_name']; ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='author.php?aid=<?php echo $row1['user_id']; ?>'><?php echo $row1['username']; ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo $row1['post_date']; ?>
                                            </span>
                                        </div>
                                        <p class="description">
                                        <?php echo substr($row1['description'],0,15)."..."; ?>
                                        </p>
                                        <a class='read-more pull-right' href='single.php?id=<?php echo $row1['post_id']; ?>'>read more</a>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <?php
                                   }
                              ?>   
                        </div>
                        <?php
                     $sql1 = "SELECT post FROM category JOIN post
                     ON post.category=category.category_id
                     WHERE post.author = $author_id";
                     $result1 = mysqli_query($conn,$sql1) or die("post query failed");
                     $row = mysqli_num_rows($result1);
                     if(mysqli_num_rows($result1)>0){
                      $totalrecors = $row;
                      $limits = 3;
                      $totalpage = ceil($totalrecors/$limits);
                      echo "<ul class='pagination admin-pagination'>";
                      if($page > 1){
                          echo '<li><a href="author.php?aid='.$author_id.'&page='.($page-1).'">Prev</a></li>';
                      }
                      for($i=1;$i<=$totalpage;$i++){
                          if($i==$page){
                              $active = "active";
                          }
                          else{
                              $active="";
                          }
                          echo "<li class='$active'><a href='author.php?aid=".$author_id."&page=$i'>$i</a></li>";
                           }
                           if($totalpage>$page){
                              echo "<li><a href='author.php?aid=".$author_id."&page=".($page+1)."'>Next</a></li>";
                           }
                           echo "</ul>";
                              }
                  ?>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
