<?php include "includes/header.php";?>

<?php include "includes/db.php";?>
<?php include "includes/nav.php";?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php
            if(isset($_GET['p_id'])){
                $the_post_id = $_GET['p_id'];
                $query="UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = $the_post_id";
                $views_query = mysqli_query($connection,$query);
                if(!$views_query){
                    die("failed".mysqli_error($connection));
                }
                
            
            $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
            $select_all_posts_query = mysqli_query($connection , $query);
            while($row = mysqli_fetch_assoc($select_all_posts_query)){
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
            
            ?>
            
            <h1 class="page-header mt-5">Page Heading<small>Secondary Text</small></h1>
            <h2><a href="post.php?p_id=<?php echo '$post_id';?>"><?php echo "$post_title";?></a></h2>
            <p class="lead">by <a href="index.php"><?php echo "$post_author"?></a></p>
            <p><span class="far fa-clock"></span>Posted on <?php echo "$post_date"?></p>
            <hr>
            <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
            <hr>
            <p><?php echo "$post_content"?></p>
            <hr>
            <?php }
            
            
            }else{
                header("location: index.php");
            }
            
            
            ?>
            <?php
                if(isset($_POST['create_comment'])){
                    $the_post_id = $_GET['p_id'];
                    $comment_author = $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
                    $comment_content = $_POST['comment_content'];
                if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)){
                    
                
                    
                    $query = "INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) VALUES ($the_post_id , '{$comment_author}','{$comment_email}','{$comment_content}',' ',now())";
                    $create_comment_query = mysqli_query($connection,$query);
                    if(!$create_comment_query){
                        die("failed" . mysqli_error($connection));
                        }
//                        $query = "UPDATE posts SET post_comment_count= post_comment_count + 1 WHERE post_id = $the_post_id ";
//                        $update_comment_count = mysqli_query($connection,$query);
                  }else{
                    echo "<script>alert('fields are empty')</script>";
                }      
                    
                }
            ?>
            
        
        <div class="well">
            <h4>Leave comment:</h4>
            <form role="form" action="" method="post">
                <div class="form-group">
                   <input type="text" class="form-control" name="comment_author" placeholder="Your Name"> 
                </div>
                <div class="form-group">
                   <input type="text" class="form-control" name="comment_email" placeholder="Your Email"> 
                </div>
                <div class="form-group">
                    <textarea type="text" class="form-control" name="comment_content" placeholder="Your Comment" cols="3"></textarea>
                </div>
                <button type="submit" class="btn btn-info" name="create_comment">Submit</button>
                        
            </form>
        </div>
        <hr>
            
            <?php
                $query = "SELECT * FROM comments WHERE comment_post_id = $the_post_id  AND comment_status = 'approve' ORDER BY comment_id DESC ";
                $select_comment_query = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($select_comment_query)){
                    $comment_author = $row['comment_author'];
                    $comment_content = $row['comment_content'];
                    $comment_date = $row['comment_date'];       
                    
            ?>
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64*64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading"><?php echo $comment_author ;?><small><?php echo $comment_date ;?></small>
                </h4>
                <?php echo $comment_content ;?>
                
        </div>
        </div>
            <?php } ?>
        
    </div>
        <?php include "includes/sidebar.php";?>
</div>
    </div>


<?php include "includes/footer.php";?>