
    


<?php include "header_admin.php";?>
<?php include "functions.php";

if(isset($_SESSION['username'])){


?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <?php include "sidebar.php";?>
                </div>
                <div class="col-md-10 bg-light">
                    <div class="admin mt-5">
                        <h1>Welcome to admin <small><?php echo $_SESSION['username'] ?></small></h1>
                    </div>
                    <div class="row">
                        
                        
                        <div class="col-lg-3 col-md-6 ">
                            <div class="panel   border border-primary rounded">
                                <div class="panel-heading  bg-primary">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <i class="fa fa-file-text fa-5x"></i>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <div>
                                                
<?php 
   $query = "SELECT * FROM posts";
   $select_posts = mysqli_query($connection,$query);
    $posts_count = mysqli_num_rows($select_posts)
?>
                                                <h1><?php echo $posts_count;?></h1>
                                                <h4>Posts</h4>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <a href="posts.php">
                                    <div class="panel-footer bg-light p-2">
                                        <span class="pull-left ">view Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-6">
                            <div class="panel  border border-success rounded">
                                <div class="panel-heading  bg-success">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <i class="fa fa-file-text fa-5x"></i>
                                        </div>
                                        <div class="col-md-7 text-right">
                                            <div>
 <?php 
   $query = "SELECT * FROM comments";
   $select_comments = mysqli_query($connection,$query);
    $comments_count = mysqli_num_rows($select_comments)
?>                                               
                                                <h1 class=""><?php echo $comments_count;?></h1>
                                                <h4>Comments</h4>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <a href="comments.php">
                                    <div class="panel-footer bg-light p-2">
                                        <span class="pull-left ">view Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-6">
                            <div class="panel  border border-secondary rounded">
                                <div class="panel-heading  bg-secondary">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <i class="fa fa-file-text fa-5x"></i>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <div>
                                                
<?php 
   $query = "SELECT * FROM users";
   $select_users = mysqli_query($connection,$query);
    $users_count = mysqli_num_rows($select_users)
?>                                                <h1 class=""><?php echo $users_count;?></h1>
                                                <h4>Users</h4>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <a href="users.php">
                                    <div class="panel-footer bg-light p-2">
                                        <span class="pull-left ">view Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-6">
                            <div class="panel  border border-danger rounded ">
                                <div class="panel-heading  bg-danger">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <i class="fa fa-file-text fa-5x"></i>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <div>
<?php 
   $query = "SELECT * FROM categories";
   $select_categories = mysqli_query($connection,$query);
    $categories_count = mysqli_num_rows($select_categories)
?>                                                
                                                <h1 class=""><?php echo $categories_count;?></h1>
                                                <h4>Category</h4>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <a href="category.php">
                                    <div class="panel-footer bg-light p-2">
                                        <span class="pull-left ">view Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                        
                    </div>
<?php
                    
 $query = "SELECT * FROM posts WHERE post_status = 'published' ";
 $select_published_post = mysqli_query($connection,$query);
 $published_count = mysqli_num_rows($select_published_post);
                    
 $query = "SELECT * FROM posts WHERE post_status = 'draft' ";
 $select_draft_post = mysqli_query($connection,$query);
 $draft_count = mysqli_num_rows($select_draft_post);
 
 $query = "SELECT * FROM comments WHERE comment_status = 'unapprove' ";
 $select_unapprove_comment = mysqli_query($connection,$query);
 $unapprove_count = mysqli_num_rows($select_unapprove_comment);
                    
 $query = "SELECT * FROM users WHERE user_role = 'admin' ";
 $select_admin_user = mysqli_query($connection,$query);
 $admin_count = mysqli_num_rows($select_admin_user);
?>
                    <div class="row mt-5">
                        <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
           <?php
            $element_text = ['Posts','Published posts','Draft Posts','comments','approve comment','users','admin user','categories'];
            $element_count = [$posts_count,$published_count,$draft_count,$comments_count,$unapprove_count,$users_count,$admin_count,$categories_count];
            for($i=0 ; $i < 7 ; $i++){
              echo  "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
            }
            ?> 
//          ['posts', 1],
          
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
                        <div id="columnchart_material" style="width: 1200px; height: 500px;"></div>
                    </div>
                    
                </div>
            </div>
        </div>
    <?php include "footer_admin.php";

}else{
header("location: ../index.php");
}
?>
