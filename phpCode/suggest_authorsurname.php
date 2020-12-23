<?php
    require "../connection.php";
    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $lname = $_REQUEST['surname'];
    $sql = "SELECT author_lname FROM author WHERE author_lname LIKE '$lname%' ORDER BY author_lname";
    $result = mysqli_query($connection, $sql);
    if($result) {
        while($row = mysqli_fetch_object($result)) {
            echo "<option value='".$row->author_lname."'>";
        }
    }
    else {
        echo mysqli_error($connection);
    }
?>
</option>