
<?php
                        
    if(isset($_POST['add_user'])){
        $username = $_POST['username'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_password = $_POST['user_password'];
        $user_role = $_POST['user_role'];
       // $post_image = $_FILES['post_image']['name'];
       // $post_image_temp = $_FILES['post_image']['tmp_name'];
        
        $user_email = $_POST['user_email'];
        
        
       // move_uploaded_file($post_image_temp , "../images/$post_image");
        $user_password = password_hash($user_password, PASSWORD_BCRYPT,array('cost' => 10));

        $query = "INSERT INTO users(username,user_firstname,user_lastname, user_password,user_email,user_role) VALUES ('$username','{$user_firstname}','{$user_lastname}','{$user_password}','{$user_email}','{$user_role}') ";
        
        $create_user_query = mysqli_query($connection , $query);
        
        if(!$create_user_query){
            die("failed" . mysqli_error($connection));
        
    } 
    
        echo "User Created: " ." "."<a href='users.php'>View Users</a>";
    
    }
?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" name="user_firstname">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" name="user_lastname">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="user_email">
                            </div>
<!--
                            <div class="form-group">
                                <label for="image">Post Image</label>
                                <input type="file" name="post_image">
                            </div>
                
-->                 <div class="form-group">
                            <select name="user_role">
                                <option value="subscriber">Select Options</option>
                                <option value="admin">Admin</option>
                                <option value="subscriber">subscriber</option>
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="user_password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="add_user" value="Add User">
                            </div>
                            
                        </form>
