


<div class="col-md-4 mt-5">
    
    
    <div class="bg-light p-4">
        <h4>Blog search</h4>
    <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
      <input type="text" name="search" class="form-control">
        <button name="submit" type="submit"><i class="fas fa-search"></i></button>
        
    </form>
        </div>
    <div class="well mt-3 p-3 bg-light">
        
        <?php if(isset($_SESSION['user_role'])):?>
        <h4>Logged in as <?php echo $_SESSION['username'];?></h4>
        <a href="includes/logout.php" class="btn btn-info">Logout</a>
        <?php else:?>
            <h4>Login</h4>
        <form action="includes/login.php" method="post">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="input-group">
                <input type="password" name="password" class="form-control" placeholder="Enter password">
                <span class="input-group-btn">
                    <button class="btn btn-primary" name="login" type="submit">Submit</button>
                </span>
            </div>
        </form>
        <?php endif;?>
                
    </div>
    <div class="category bg-light p-4 mt-4">
        <h4>Blog Categories</h4>
        <ul class="list-unstyled">
            <?php
        
        $query = "SELECT * FROM categories";
        $cat_query = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($cat_query)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
        }
        ?>
        </ul>
    </div>
</div>