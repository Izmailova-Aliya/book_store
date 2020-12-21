<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit</title>
  <link rel="stylesheet" href="style/style_index.css">
  <link rel="stylesheet" href="style/style_edit_user.css">
  <?php
include 'header.php';
?>




<div class="col-sm-4"></div>
<div id="user_post" class="col-sm-4">
    <form action="<?php $_PHP_SELF ?>" method = "post">
        <div class="panel panel-default">
            <div class="panel-heading">Post Blog</div>
            <div class="panel-body">
                
                Blog title:</br>
                <input type="text" name="blog_title" placeholder="Title"></br>
                Blog content: </br>
                <textarea name='content' cols = "30" rows ="10">

                </textarea>
            </div>
            <div class="panel-footer">
                <input type="submit" name="post" value="Post">
            </div>
        </div>
    </form>
</div>


<?php
if(isset($_POST['post'])){
    $blog_title = $_POST['blog_title'];
    $blog_content =$_POST['content'];
    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $postSql = "INSERT INTO blog(customer_email, blog_title, blog_content) VALUES ('".$_SESSION['user']['email']."', '".$blog_title."', '".$blog_content."')";
    $res = mysqli_query($connection, $postSql);
        if ($res) {
          echo '<script type="text/javascript">';
          echo 'alert("Blog posted successfully"); ';               
          echo '</script>'; 
        }else{
            echo "Failed";
    }
}
?>

</body>
</html>