<?php
    if(isset($_POST['checkBoxArray'])){
        foreach($_POST['checkBoxArray'] as $postIdValue){
        $bulk_option = $_POST['bulk_option'];
        switch($bulk_option){
            case 'published':
                $query = "UPDATE posts SET post_status = '{$bulk_option}' WHERE post_id = '{$postIdValue}' ";
                $update_post_status = mysqli_query($connection,$query);
                
                break;
            case 'draft':
                $query = "UPDATE posts SET post_status = '{$bulk_option}' WHERE post_id = '{$postIdValue}' ";
                $update_post_status = mysqli_query($connection,$query);
                
                break;
            case 'delete':
                $query = "DELETE FROM posts WHERE post_id = '{$postIdValue}' ";
                $delete_post = mysqli_query($connection,$query);
                
                break;
            case 'clone':
                $query = "SELECT * FROM posts WHERE post_id = '{$postIdValue}'";
                $select_posts = mysqli_query($connection,$query);
                while($row = mysqli_fetch_array($select_posts)){
                    $post_title = $row['post_title'];
                    $post_category_id = $row['post_category_id'];
                    $post_date = $row['post_date'];
                    $post_author = $row['post_author'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_content = $row['post_content'];
                    
                }
                $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_status,post_image,post_tags,post_content,post_date) VALUES('{$post_category_id}','{$post_title}','{$post_author}','{$post_status}','{$post_image}','{$post_tags}','{$post_content}',now()) ";
                
                $copy_query = mysqli_query($connection,$query);
                if(!$copy_query){
                    die("failed" . mysqli_error($connection));
                }
                
                break;
        }
        
    }}
?>

<form action="" method="post">
<table class="table table-bordered table-hover">
    
    <div class="form-group d-inline-block mr-2">
        
        <select name="bulk_option" class="form-control">
            <option>select option</option>
            <option value="published">Published</option>
            <option value="draft">Draft</option>
            <option value="delete">Delete</option>
            <option value="clone">Clone</option>
        </select>
    </div>
    <div class="d-inline-block">
        <input type="submit" value="Apply" name="apply" class="btn btn-success">
        <a href="posts.php?source=add_post" class="btn btn-info">Add Post</a>
    </div>
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="checkBox" id="checkAllSelects"></th>
                                    <th>id</th>
                                    <th>category</th>
                                    <th>title</th>
                                    <th>author</th>
                                    <th>date</th>
                                    <th>image</th>
                                    <th>content</th>
                                    <th>tags</th>
                                    <th>comment_count</th>
                                    <th>status</th>
                                    <th>views</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
<?php
    $query = "SELECT * FROM posts";
    $select_posts = mysqli_query($connection , $query);
    while($row= mysqli_fetch_assoc($select_posts)){
        $post_id = $row['post_id'];
        $post_category_id = $row['post_category_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_status = $row['post_status'];
        $post_views_count = $row['post_views_count'];
        
        echo "<tr>";
        ?>
         <td><input type="checkbox" name="checkBoxArray[]" value="<?php echo $post_id;?>" class="checkBoxes"></td>                       
        <?php
        echo "<td>$post_id</td>";
        
        $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
        $select_categories_id = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($select_categories_id)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            
            
        
        echo "<td>{$cat_title}</td>";
        }
        
        echo "<td>$post_title</td>";
        echo "<td>$post_author</td>";
        echo "<td>$post_date</td>";
        echo "<td><img src='../images/$post_image'class='img-responsive'width=100></td>";
        echo "<td>$post_content</td>";
        echo "<td>$post_tags</td>";
        
        $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
        $find_query = mysqli_query($connection,$query);
        $count_comments = mysqli_num_rows($find_query);
        
        
        echo "<td><a href='post_comments.php?id=$post_id'>$count_comments</a></td>";
        
        
        
        
        
        echo "<td>$post_status</td>";
        echo "<td><a href='posts.php?reset={$post_id}'>$post_views_count</a></td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
        echo "<td><a onClick=\"javascript:return confirm('Are you sure')\" href='posts.php?delete={$post_id}'>Delete</a></td>";
        echo "</tr>";
        
    }
?>
                            </tbody>
                        </table>
    </form>
<?php
if(isset($_GET['delete'])){
    header("location: posts.php");
    $the_post_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
    $delete_query = mysqli_query($connection,$query);

}
if(isset($_GET['reset'])){
    header("location: posts.php");
    $the_post_id = $_GET['reset'];
    $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = {$the_post_id}";
    $reset_query = mysqli_query($connection,$query);

}
?>