<?php include "includes/header.php";?>
<?php include "includes/nav.php";?>
<?php include "includes/db.php";?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            
            <?php 
    $search = $_POST['search'];
    if(isset($_POST['submit'])){
        $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
        $search_query = mysqli_query($connection ,$query);
        if(!$search_query){
            die("FAILED".mysqli_error($connection));
        }
        $count = mysqli_num_rows($search_query);
        if($count == 0){
            echo "<h1>no result</h1>";
        }else{
            while($row = mysqli_fetch_assoc($search_query)){
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
            ?>
            
            
            <h1 class="page-header mt-5">Page Heading<small>Secondary Text</small></h1>
            <h2><a href="#"><?php echo "$post_title"?></a></h2>
            <p class="lead">by <a href="index.php"><?php echo "$post_author"?></a></p>
            <p><span class="far fa-clock"></span>Posted on <?php echo "$post_date"?></p>
            <hr>
            <img class="img-fluid" src="images/<?php echo $post_image; ?>" alt="">
            <hr>
            <p><?php echo "$post_content"?></p>
            <a class="btn btn-primary" href="#">Read More <span class = "glyphicon glyphicon-chevron-right"></span></a>
            <hr>
            <?php 
            } 
        }
    }
    ?>
            
            
            
            
        </div>
        <?php include "includes/sidebar.php";?>
    </div>
</div>


<php include "includes/footer.php";?>
    