<?php
    require "../connection.php";
    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $genre = $_GET['genre'];
    $sql = "SELECT genre_name FROM genre WHERE genre_name LIKE '$genre%' ORDER BY genre_name";
    $result = mysqli_query($connection, $sql);
    if($result) {
        while($row = mysqli_fetch_object($result)) {
            echo "<option value='".$row->genre_name."'>";
        }
    }
    else {
        echo mysqli_error($connection);
    }
?>
</option>