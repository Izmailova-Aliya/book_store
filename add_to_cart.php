<?php
function addCart($id, $quantity) {
    include "connection.php";
    session_start();
    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $sql = "INSERT INTO `cart`(`cart_book_id`, `cart_quantity`, `cart_customer_email`)VALUES ($id, $quantity, '".$_SESSION['user']['email']."')";
    if (mysqli_query($connection, $sql)) {
        echo '<script type="text/javascript">';
        echo 'alert("Book added successfully"); ';
        echo "location.replace('../index.php');";               
        echo '</script>'; 
      }
      else{
          echo "Failed";
      }
}

?>