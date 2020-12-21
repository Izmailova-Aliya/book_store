<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "book_store";
$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if(mysqli_connect_error())
    echo "Connection Error.";
?>