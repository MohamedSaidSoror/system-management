<?php include "header_admin.php";?>
<?php include "functions.php";

if(isset($_SESSION['username'])){
    

?>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <?php include "sidebar.php";?>
                </div>
                <div class="col-md-10 bg-light">
                    <div class="admin mt-5">
                        <h1>Welcome to admin <small>Users</small></h1>
                    </div>
                    
<?php
if(isset($_GET['source'])){
    $source = $_GET['source'];
}else{
    $source = '';
}
switch($source){
    case 'add_user';
    include "add_user.php";
    break;
    case 'edit_user';
        include "edit_user.php";
        break;
    case '3';
        echo "this 3";
        break;
    default:
        include "view_all_users.php";
        break;
}
?>
                    </div>
                    
                </div>
            </div>
            
        
        
        
        
    <?php include "footer_admin.php";
}else{
    header("location: ../index.php");
}
?>