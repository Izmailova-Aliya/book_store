    <?php
    require "../connection.php";
    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $fname = $_REQUEST['name'];
    $sql = "SELECT author_fname FROM author WHERE author_fname LIKE '$fname%' ORDER BY author_fname";
    $result = mysqli_query($connection, $sql);
    if($result) {
        while($row = mysqli_fetch_object($result)) {
            echo "<option value='".$row->author_fname."'>";
        }
    }
    else {
        echo mysqli_error($connection);
    }
?>
</option>