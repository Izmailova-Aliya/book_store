<?php 
function delete($id) {
include ('connection.php');

    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $sql = "DELETE FROM `books` WHERE book_id = $id";
    if (!mysqli_query($connection, $sql)) {
        echo mysqli_error();
    }
    else {
        echo "<script>";
        echo "alert ('Deleted')";
        echo "location.replace('index.php');";
        echo "</script>";
    }
}

?>
