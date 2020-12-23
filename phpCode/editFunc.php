<?php
    function editBook($id) {
        include ("../connection.php");
        $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
        $sql = "SELECT * FROM `books` WHERE book_id = $id";
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
        mysqli_close($connection);
    }

    include ("../edit_book.php");
?>