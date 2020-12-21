<!DOCTYPE html>
<html lang="en">
<head>
  <title>Book Store</title>
  <link rel="stylesheet" href="style/style_index.css">
  <link rel="stylesheet" href="style/style_edit_user.css">
  <?php
include 'header.php';
?>


<div class="container">
    <div class="row">


<?php 
        $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
        $sql = "SELECT * FROM `blogs`";
        if ($res = mysqli_query($connection, $sql)) {
            if (mysqli_num_rows($res) > 0) {

                while ($row = mysqli_fetch_array($res)) {
                    $blog_id = $row['blog_id'];
                    $blog_title = $row['blog_text'];
                    echo '<div id="blogs" class="col-sm-3">';
                    echo '<form action="';?> <?php $_PHP_SELF?><?php echo '" method = "post">';
                    echo '<div class="panel panel-default">';
                    echo '<div class="panel-heading"></div>';
                    echo '<div class="panel-body">';
                    echo $blog_title;
                    echo '</div>';
                    echo '<div class="panel-footer">'; 
                    echo '</div>';
                    echo '</form>';
                    echo '</div>';
                    
                    echo '</div>';
                }
            } else {
                echo "Not found.";
            }
        } else {
            echo "execution error $sql. "
            . mysqli_error($connection);
        }
?>


    </div>
</div>

</body>
</html>