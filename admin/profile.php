<?php include "header_admin.php";?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
<?php include "sidebar.php";?>
        </div>
        <div class="col-md-10 mt-5">
<?php
     if(isset($_SESSION['username'])){
         $username = $_SESSION['username'];
         }
         $query = "SELECT * FROM users WHERE username = '$username' ";
         $select_user = mysqli_query($connection , $query);
         while($row= mysqli_fetch_assoc($select_user)){
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_password = $row['user_password'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
     }                   
    if(isset($_POST['edit_user'])){
        $username = $_POST['username'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_password = $_POST['user_password'];
        $user_role = $_POST['user_role'];
       // $post_image = $_FILES['post_image']['name'];
       // $post_image_temp = $_FILES['post_image']['tmp_name'];
        
        $user_email = $_POST['user_email'];
        
        
       // move_uploaded_file($post_image_temp , "../images/$post_image");

        $query = "UPDATE users SET username='$username',user_firstname='{$user_firstname}',user_lastname='{$user_lastname}', user_password='{$user_password}',user_email='{$user_email}',user_role='{$user_role}' WHERE username = $username";
        
        $create_user_query = mysqli_query($connection , $query);
        
        if(!$create_user_query){
            die("failed" . mysqli_error($connection));
        
    }  }
?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" value="<?php echo $username;?>">
                            </div>
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname;?>">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname;?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="user_email" value="<?php echo $user_email;?>">
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
                                <input type="password" name="user_password" class="form-control" value="<?php echo $user_password;?>">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">
                            </div>
                            
                        </form>
        </div>
</div>
</div>
