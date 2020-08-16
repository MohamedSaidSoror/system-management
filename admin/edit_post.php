<?php
if(isset($_GET['p_id'])){
    $the_post_id = $_GET['p_id'];
}
$query = "SELECT * FROM posts WHERE post_id = $the_post_id";
$edit_query = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($edit_query)){
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        
        $post_image = $row['post_image'];
        
        
        $post_tags = $row['post_tags'];
        $post_content = $row['post_content'];
        $post_date = $row['post_date'];
        $post_comment_count = $row['post_comment_count'];  
}

if(isset($_POST['update_post'])){
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_category_id = $_POST['post_category'];
        $post_status = $_POST['post_status'];
        
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date("l jS \of F Y h:i:s A");
        $post_comment_count = 4;
        
        move_uploaded_file($post_image_temp , "../images/$post_image");
    if(empty($post_image)){
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
        $select_image = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($select_image)){
            $post_image = $row['post_image'];
        }
    }
    
    
        $query = "UPDATE posts SET ";
        $query .= "post_title = '{$post_title}', ";
        $query .= "post_author = '{$post_author}', ";
        $query .= "post_category_id = '{$post_category_id}', ";
        $query .= "post_status = '{$post_status}', ";
        $query .= "post_image = '{$post_image}', ";
        $query .= "post_tags = '{$post_tags}', ";
        $query .= "post_content = '{$post_content}', ";
        $query .= "post_date = now(), ";
        $query .= "post_comment_count = '{$post_comment_count}'  WHERE post_id = {$the_post_id} ";
    
        $update_post = mysqli_query($connection,$query);
        confirmQuery($update_post);
        echo "<p>Post Updated . <a href='../post.php?p_id={$the_post_id}'>View post</a></p>";
        
    
}

?>
<form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" class="form-control" name="post_title" value="<?php echo $post_title ;?>">
                            </div>
                            <div class="form-group">
                                
                                <select name="post_category">
                                    <?php
                                        $query = "SELECT * FROM categories";
                                    $select_cat_title = mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($select_cat_title)){
                                        $cat_title = $row['cat_title'];
                                        $cat_id = $row['cat_id'];
                                        echo "<option value='$cat_id'>$cat_title</option>";
                                        
                                    }
                                    ?>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="author">Post Author</label>
                                <input type="text" class="form-control" name="post_author" value="<?php echo $post_author ;?>">
                            </div>
                            <div class="form-group">
                                <select name="post_status">
                                    <option value="<?php echo $post_status;?>"><?php echo $post_status;?></option>
 <?php
    if($post_status == 'published'){
        echo "<option value='draft'>Draft</option>";
    }else{
        echo "<option value='published'>Published</option>";
    }    
    ?>                                   
                                
                                </select>
                            
    
    
    
                                </div>
<!--
                            <div class="form-group">
                                <label for="status">Post Status</label>
                                <input type="text" class="form-control" name="post_status" value="<?php echo $post_status ;?>">
                            </div>
-->
                            <div class="form-group">
                                <label for="image">Post Image</label>
                                <input type="file" name="post_image" value="<?php echo $post_image ;?>">
                            </div>
                            <div class="form-group">
                                <label for="tags">Post Tags</label>
                                <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags ;?>">
                            </div>
                            <div class="form-group">
                                <label for="content">Post Content</label>
                                <textarea class="form-control" name="post_content" cols="30" rows="10" ><?php echo $post_content ;?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
                            </div>
                            
                        </form>