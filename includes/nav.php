
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <a class="navbar-brand" href="./index.php">CMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php
        
        $query = "SELECT * FROM categories";
        $cat_query = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($cat_query)){
            $cat_title = $row['cat_title'];
            $cat_id = $row['cat_id'];
            echo "<li><a class='nav-link' href='category.php?category=$cat_id'>{$cat_title}</a></li>";
        }
        ?>
        
        <li><a class="nav-link" href="admin/index_admin.php">Admin</a></li>
        <li><a class="nav-link" href="registeration.php">Register</a></li>
    </ul>
    
  </div>
</nav>