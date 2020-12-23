<?php
    require "../connection.php";
    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $book_name = $_REQUEST['book_name'];
    $sql = "SELECT book_title FROM books WHERE book_title LIKE '$book_name%' ORDER BY book_title";
    $result = mysqli_query($connection, $sql);
    if($result) {
        while($row = mysqli_fetch_object($result)) {
            echo "<option value='".$row->book_title."'>";
        }
    }
    else {
        echo mysqli_error($connection);
    }
?>
</option>