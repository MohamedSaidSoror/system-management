
    
<?php
                        
    if(isset($_POST['create_post'])){
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_category_id = $_POST['post_category_id'];
        $post_status = $_POST['post_status'];
        
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date("l jS \of F Y h:i:s A");
        $post_comment_count = 4;
        
        move_uploaded_file($post_image_temp , "../images/$post_image");

        $query = "INSERT INTO posts(post_category_id, post_title,post_author, post_date,post_image,post_content,post_tags,post_comment_count,post_status) VALUES ({$post_category_id},'{$post_title}','{$post_author}',now() ,'{$post_image}' ,'{$post_content}','{$post_tags}','{$post_comment_count}','{$post_status}')";
        
        $create_post_query = mysqli_query($connection , $query);
        
        confirmQuery($create_post_query);
        
    }
?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" class="form-control" name="post_title">
                            </div>
                            <div class="form-group">
                                <select name="post_category_id">
                                    <?php
                                        $query="SELECT *FROM categories";
                                        $select_cat = mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($select_cat)){
                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];
                                        echo "<option value='$cat_id'>$cat_title</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            
                            
<!--
                            <div class="form-group">
                                <label for="post_category">Post Category id</label>
                                <input type="text" class="form-control" name="post_category_id">
                            </div>
-->
                            <div class="form-group">
                                <label for="author">Post Author</label>
                                <input type="text" class="form-control" name="post_author">
                            </div>
                            <div class="form-group">
                                <select name="post_status">
                                    
                                    <option value="published">Published</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Post Image</label>
                                <input type="file" name="post_image">
                            </div>
                            <div class="form-group">
                                <label for="tags">Post Tags</label>
                                <input type="text" class="form-control" name="post_tags">
                            </div>
                            <div class="form-group">
                                <label for="content">Post Content</label>
                                <textarea class="form-control" name="post_content" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
                            </div>
                            
                        </form>
                    
            
<!--
        


<form method="post" action="{route ('AdminUsersController')}">

            @csrf
                <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name">
                </div>

                <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email">
                </div>
                    <div class="form-group">
                        <label for="role_id">Role:</label>
                        @if($roles)
                        @foreach($roles as $role)
                        <select class="form-control" name="role_id">
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        </select>



                    </div>
<div class="form-group">
                        <label for="role_id">Role:</label>
                        <select class="form-control" name="role_id">
                            <option value="">choose Role</option>
                        @if($roles)
                            @foreach($roles as $role)
                            
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            
                            @endforeach
                        @endif
                        </select>

                    </div>
                


                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" name="status">
                        <option value="1">Active</option>
                        <option value="0">Not Active</option>

                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Create User">
                </div>

    </form>
-->
        
        
    