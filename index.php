<!DOCTYPE html>
<html lang="en">
<head>
  <title>Book Store</title>

  <?php
include 'header.php';
?>
<link href="style/style_index.css" rel="stylesheet" type="text/css">
 <!--     $connection = OpenConnection();
    function_alert("Connected defaultfully!");

    function function_alert($connection) {
      echo "<script type='text/javascript'>alert('$connection');</script>";
    }
    CloseConnection($connection);
  ?> -->

<div class="container">
    <div class="row">
    
<?php
    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $sql = "SELECT * FROM `books`";
    if ($res = mysqli_query($connection, $sql)) {
        if (mysqli_num_rows($res) > 0) {

            while ($row = mysqli_fetch_array($res)) {
                $id = $row['book_id'];
                $title = $row['book_title'];
                $price = $row['book_price'];
                $description = $row['book_description'];
                $_SESSION['id'] = $id;
                echo '<div id="books" class="col-sm-3">';
                echo '<form action="phpCode/forIndex.php" method = "post">';
                echo '<div class="panel panel-default">';
                echo '<div class="panel-heading">' . $title . '</div>';
                echo '<div class="panel-body">';
                echo "<img src='img/".$row['book_cover']."' style='height:250px; width:200px;' alt='Image'>";
                echo '</div>';
                echo '<div class="panel-footer">';
                echo $price . ' KZT</br>';
                echo $description . '</br>';
                echo '<input type="hidden" value="' . $id . '" name="bookID">';
                if (isset($_SESSION['login'])) {
                    if ($role == 'admin') {
                        echo "</br>";
                        echo '<input class="btn btn-success mb-2" type="submit" value = "Edit" name="edit">';
                        echo "&nbsp; &nbsp;";
                        echo '<input class="btn btn-danger mb-2" type="submit" value="Delete" name="delete">';
                    } elseif ($role == 'user') {
                        echo "</br>";
                        echo "<input class='form-control' type='number' name='quan' max='10' min='1' value='1' step='1'>";
                        echo '<button class="btn btn-primary mb-2" value="' . $id . '" name="cart">Add to cart</button>';
                        
                    }
                }

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

    include ('phpCode/forIndex.php');
?>

</div>
</div>
<br><br>

  <?php include "footer.php" ?>


</body>
</html>