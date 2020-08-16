<?php include "../includes/db.php";?>

<?php ob_start(); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>cms</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/fontawesome-free-5.9.0-web/css/fontawesome.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <a class="navbar-brand" href="view_all_posts.php">CMS admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      
        <!--<li class="nav-link" href="">Users Online : <?php //echo users_online();?></li>-->
        <li class="nav-item active">
        <a class="nav-link" href="../index.php">Home page <span class="sr-only">(current)</span></a>
      </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<?php
        if(isset($_SESSION['username'])){
            echo $_SESSION['username'];
        }
?>            
            
            
          
            
            
            
            
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Profile</a>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
    </ul>
    
  </div>
</nav>