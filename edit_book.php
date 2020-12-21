<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit</title>
  <?php
include 'header.php';

?>

<div class="container">
  <div class="row">

        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form action = "<?php $_PHP_SELF?>" method = "post">
            <div class="form-group">
                <div class="panel panel-default">

                    <div class="panel-heading">
                    <?php

function editBook($id) {
    include ("../connection.php");
    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $sql = "SELECT * FROM `books` WHERE book_id = ".$_SESSion['id'];
    if ($res = mysqli_query($connection, $sql)) {
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_array($res)) {
                $id = $row['book_id'];
                $title = $row['book_title'];
                $price = $row['book_price'];
                $description = $row['book_description'];
                $image = $row['book_cover'];
            }
        } else {
            echo "No matching records are found.";
        }
    }
}
                   echo' <input class="form-control" type="text" name="title" value="'. $title .'">';
                    echo '</div>';
                   echo ' <div class="panel-body">
                        <img src="" style="height:250px; width:200px;" alt="Image">
                    </div>
                </div>';
                echo '<div class="panel-footer">
                    <input class="form-control" type="number" name="price" value="'.$price.'"></br>
                    <textarea cols="30" rows="10" name="description">
                    '.$description.'
                    </textarea></br>
                    <input type="hidden" name="id" value="'.$id.'">'; 
                    mysqli_close($connection); ?>
                    <input class="btn btn-primary mb-2" type="submit" name="buttonUpdate" value = "Edit">
                </div>
                </div>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
<br>


<?php
if (isset($_REQUEST['buttonUpdate'])) {
    $book_id = $_REQUEST['id'];
    $title = $_REQUEST['title'];
    $price = $_REQUEST['price'];
    $description = $_REQUEST['description'];
    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $updateSql = "UPDATE books SET book_title = '" . $title . "', book_price = '" . $price . "', book_description='" . $description . "' WHERE book_id ='".$book_id."'";
    if (mysqli_query($connection, $updateSql)) {
        echo '<script type="text/javascript">';
        echo 'alert("Book was updated successfully."); ';
        echo "location.replace('index.php');"; 
        echo '</script>';
    } else {
        echo "Could not able to execute $updateSql. "
        . mysqli_error($connection);
    }
    mysqli_close($connection);
}
?>

<footer class="container-fluid text-center" style=" background-color: #383636;">

  <form class="form-inline">
  </form>
</footer>

</body>


</html>