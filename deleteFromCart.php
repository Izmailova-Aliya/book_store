<?php 
function deleteFunc($id) {
include ('connection.php');

    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $sql = "DELETE FROM `cart` WHERE cart_book_id = $id";
    if (!mysqli_query($connection, $sql)) {
        echo mysqli_error();
    }
}

?>
