<?php include "db.php";?>
<?php session_start(); ?>
<?php
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $username = mysqli_real_escape_string($connection,$username);
    $password = mysqli_real_escape_string($connection,$password);
    
    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $select_user = mysqli_query($connection,$query);
    if(!$select_user){
        die("failed".mysqli_error($connection));
    }
    while($row = mysqli_fetch_assoc($select_user)){
         $db_user_id = $row['user_id'];
         $db_username = $row['username'];
         $db_user_password = $row['user_password'];
         $db_user_firstname = $row['user_firstname'];
         $db_user_lastname = $row['user_lastname'];
         $db_user_role = $row['user_role'];
        }
    //$password = crypt($password, $db_user_password);
    
    
        if(password_verify($password, $db_user_password)){
            
            $_SESSION['username'] = $db_username;
            $_SESSION['firstname'] = $db_user_firstname;
            $_SESSION['lastname'] = $db_user_lastname;
            $_SESSION['userrole'] = $db_user_role;
            
            header("location: ../admin/index_admin.php");
            
        }else{
            
            header("location: ../index.php");
        }
        
    
}
?>