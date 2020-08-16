<?php include "includes/db.php";?>
<?php include "includes/header.php";?>
<?php include "includes/nav.php";?>

<?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $password = $_POST['user_password'];
    
    if(!empty($username)&& !empty($user_email) && !empty($password)){
        
    
    
    $username = mysqli_real_escape_string($connection, $username);
    $user_email = mysqli_real_escape_string($connection, $user_email);
    $password = mysqli_real_escape_string($connection, $password);
        
        $password = password_hash($password,PASSWORD_BCRYPT,array('cost' => 12));
    
//    $query = "SELECT randsalt FROM users";
//    $select_randsalt = mysqli_query($connection, $query);
//    
//    $row = mysqli_fetch_array($select_randsalt);
//    $randsalt = $row['randsalt'];
//    //$password = crypt($password,$randsalt);
        
        
    $query= "INSERT INTO users (username , user_email , user_password , user_role) VALUES ('{$username}','{$user_email}','{$password}','subscriber')";
    $register_user = mysqli_query($connection, $query);
        echo  "registeration completed.";
    }else{
        echo "fields are empty.";
    }
    
}
?>





<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div>
                <h1 class="text-center m-5">Register</h1>
                
                <form action="registeration.php" method="post">
                    <div class="form-group">
                        
                        <input type="text" name="username" placeholder="Enter User Name" class="form-control">
                    </div>
                    <div class="form-group">
                        
                        <input type="email" name="user_email" placeholder="Enter Email" class="form-control">
                    </div>
                    <div class="form-group">
                        
                        <input type="password" name="user_password" placeholder="Enter Password" class="form-control">
                    </div>
                    <input type="submit" name="submit" value="Register" class="btn btn-info">
                
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php";?>