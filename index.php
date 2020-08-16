<?php include "includes/header.php";?>

<?php include "includes/db.php";?>
<?php include "includes/nav.php";?>


<?php


?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php
            
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = "";
            }
            if($page == "" || $page == 1){
                $pages = 0;
            }else{
                $pages = ($page * 5) - 5;
            }
            
            $count_query = "SELECT * FROM posts WHERE post_status='published'";
            $select_count_query = mysqli_query($connection,$count_query);
            $count = mysqli_num_rows($select_count_query);
            
            if($count < 1){
                echo "<h1 class='text-center'>No Posts</h1>";
            }else{
                
            
            $count = ceil($count/5);
            
            
            $query = "SELECT * FROM posts LIMIT $pages , 5 ";
            $select_posts_query = mysqli_query($connection ,$query);
            if(!$select_posts_query){
                die("failed".mysqli_error($connection));
            }
            while($row = mysqli_fetch_assoc($select_posts_query)){
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                $post_status = $row['post_status'];
    
                
            ?>
            
            <h1 class="page-header mt-5">Page Heading<small>Secondary Text</small></h1>
            <h2><a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title;?></a></h2>
            <p class="lead">by <a href="post_author.php?author=<?php echo $post_author;?>&p_id=<?php echo $post_id?>"><?php echo $post_author;?></a></p>
            <p><span class="far fa-clock"></span>Posted on <?php echo "$post_date"?></p>
            <hr>
            <a href="post.php?p_id=<?php echo $post_id;?>">
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
            </a>
            <hr>
            <p><?php echo "$post_content"?></p>
            <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id;?>">Read More <span class = "glyphicon glyphicon-chevron-right"></span></a>
            <hr>
            <?php } } ?>
            
        </div>
        <?php include "includes/sidebar.php";?>
    </div>
    <ul class="pagination">
        <?php
        for($i=1 ; $i<=$count ; $i++){
            if($i == $page){
                echo "<li class='page-item'><a class='page-link active' href='index.php?page={$i}'>{$i}</a></li>";
            }else{
                echo "<li class='page-item'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
            }
            
        }
        
        
        ?>
        
    </ul>
</div>


<?php include "includes/footer.php";?>
    