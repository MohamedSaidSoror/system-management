<?php include "header_admin.php";?>
<?php include "functions.php";?>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"><?php include "sidebar.php";?></div>
                <div class="col-md-9">
                    <div class="admin mt-5">
                        <h1>Welcome to admin <small>Author</small></h1>
                        <div class="row">
                            <div class="col-md-6">
                                <?php                   // adding category
                                    addCategory();
                                ?>
                                <h5>Adding category</h5>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <input type="text" name="cat_title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" name="submit"
                                               value="Add Category">
                                    </div>
                                </form>
                                
                                <?php 
                                if(isset($_GET['edit'])){
                                    $cat_id = $_GET['edit'];
                                    $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
                                    $select_category_id = mysqli_query($connection , $query);
                                    while($row = mysqli_fetch_assoc($select_category_id)){
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title']; 
                                ?>
                                <h5>Update category</h5>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <input type="text" name="cat_title" class="form-control" value="<?php if(isset($cat_title)){echo $cat_title; } ?>">
                                        </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" name="update_category"
                                               value="update category" >
                                    </div>
                                </form>
                              <?php } } ?>
                               <?php 
                                    
                                if(isset($_POST['update_category'])){
                                    $the_cat_title = $_POST['cat_title'];
                                    $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = '{$cat_id}' ";
                                    $update_query = mysqli_query($connection,$query);
                                    if(!$update_query){
                                        die("failed".mysqli_error($connection));
                                    }
                                }
                                ?> 
                                                       
                            
                            
                            
                                        
                                    
                            </div>
                            
                            
                            <div class="col-md-6">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>cat title</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php                               // adding category to table
        addCategoryToTable();
                                            //delete category
            deleteCategory();
            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
    <?php include "footer_admin.php";?>