<?php

//function users_online(){
//    global $connection;
//    $session = session_id();
//$time = time();
//$time_out_in_seconds = 30;
//$time_out = $time - $time_out_in_seconds ;
//$query = "SELECT * FROM users_online WHERE session = '$session'";
//$send_query = mysqli_query($connection,$query);
//$count = mysqli_num_rows($send_query);
//if($count == NULL){
//    mysqli_query($connection,"INSERT INTO users_online(session,time) VALUES ('$session','$time') ");
//}else{
//    mysqli_query($connection,"UPDATE users_online SET time = '$time' WHERE session = '$session' ");
//}
//$users_online_query = mysqli_query($connection,"SELECT * FROM users_online WHERE time > '$time_out'");
//return $count_users = mysqli_num_rows($users_online_query);
//}


function confirmQuery($result){
    if(!$result){
            die("failed" . mysqli_error($connection));
        }
}
function addCategory(){
    
    global $connection;
if(isset($_POST['submit'])){
  $cat_title = $_POST['cat_title'];
    if($cat_title == "" || empty($cat_title)){
        echo "there is no data";
    }else
    {
    $query = "INSERT INTO categories(cat_title) VALUES ('{$cat_title}')";
    $add_query = mysqli_query($connection,$query);
        if(!$add_query){
            die("FAILEd".mysqli_error($connection));
        }
}}
}
function addCategoryToTable(){
    global $connection;
    $query = "SELECT * FROM categories";
        $select_category = mysqli_query($connection , $query);
        while($row = mysqli_fetch_assoc($select_category)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            echo "<tr><td>{$cat_id}</td><td>{$cat_title}</td><td><a href='category.php?delete={$cat_id}'>Delete</a></td><td><a href='category.php?edit={$cat_id}'>Edit</a></td></tr>";
            
        }
}
function deleteCategory(){
    global $connection;
    if(isset($_GET['delete'])){
                $the_cat_id = $_GET['delete'];
                $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
                $delete_query = mysqli_query($connection , $query);
                //header("Location: category.php");
        
            }
    }
//function deleteAnyThing($lock,$table,$id){
//    global $connection;
//    if(isset($_GET['delete'])){
//        $the_id =$_GET['delete'];
//    header("location: ".$lock.".php");
//    
//    $query = "DELETE FROM $table WHERE $id = $the_id";
//    $delete_query = mysqli_query($connection,$query);
//    
//}
//}
//


?>