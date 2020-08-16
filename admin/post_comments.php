<?php include "header_admin.php";?>
<?php include "functions.php";?>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <?php include "sidebar.php";?>
                </div>
                <div class="col-md-10 bg-light">
                    <div class="admin mt-5">
                        <h1>Welcome to admin <small>Author</small></h1>
                    </div>


<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>post_id</th>
                                    <th>Author</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Content</th>
                                    <th>Date</th>
                                    <th>In responsive to</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
    $query = "SELECT * FROM comments WHERE comment_post_id=".mysqli_real_escape_string($connection,$_GET['id'])."";
    $select_posts = mysqli_query($connection , $query);
    while($row= mysqli_fetch_assoc($select_posts)){
        $comment_id = $row['comment_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_author = $row['comment_author'];
        $comment_email = $row['comment_email'];
        $comment_status = $row['comment_status'];
        $comment_content = $row['comment_content'];
        $comment_date = $row['comment_date'];
        
        
        echo "<tr>";
        echo "<td>$comment_id</td>";
        echo "<td>$comment_post_id</td>";
        echo "<td>$comment_author</td>";
        echo "<td>$comment_email</td>";
        echo "<td>$comment_status</td>";
        echo "<td>$comment_content</td>";
        echo "<td>$comment_date</td>";
        
        $query = "SELECT * FROM posts WHERE post_id = '$comment_post_id' ";
        $select_post_id_query = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($select_post_id_query)){
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
           echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
          
            
            }
        
        echo "<td><a href='comments.php?approve=$comment_id'>approve</a></td>";
        echo "<td><a href='comments.php?unapprove=$comment_id'>unapprove</a></td>";
        echo "<td><a href='post_comments.php?delete=$comment_id&id=".$_GET['id']."'>delete</a></td>";
        echo "</tr>";
        
    }
?>
                            </tbody>
                        </table>
<?php
if(isset($_GET['approve'])){
    $the_comment_id = $_GET['approve'];
    $query = "UPDATE comments SET comment_status = 'approve' WHERE comment_id = $the_comment_id ";
    $unapprove_query = mysqli_query($connection,$query);
    //header("Location: comments.php");
}
if(isset($_GET['unapprove'])){
    $the_comment_id = $_GET['unapprove'];
    $query = "UPDATE comments SET comment_status = 'unapprove' WHERE comment_id = $the_comment_id ";
    $unapprove_query = mysqli_query($connection,$query);
    //header("Location: comments.php");
}

if(isset($_GET['delete'])){
    header("location: post_comments.php?id=".$_GET['id']."");
    $the_comment_id = $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
    $delete_query = mysqli_query($connection,$query);
    
}

?>
                    
                    </div>
                    
                </div>
            </div>
            
        
        
        
        
    <?php include "footer_admin.php";?>