<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add a book</title>
  <meta charset="utf-8">
  
  <link href='https://fonts.googleapis.com/css?family=Fredoka One' rel='stylesheet'>
    <?php
      include 'connection.php';
      include 'header.php';
    ?>

    <style>
        h3 {
            font-family: "Fredoka One";
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <form action="<?php $_PHP_SELF ?>" method="get">
        <div class="form-group" style="width:40%; margin:auto">
            <h3>Genre</h3>
            <input class="form-control" type="text" name="genre" placeholder="Genre">

            <input class="btn btn-primary mb-2" type="submit" name="add" value="Submit">
        </div>
        </form>


    </div>
</div></br></br></br></br></br>

<?php
if(isset($_GET['add'])) {
    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $genre = $_GET['genre'];
    $sql = "INSERT INTO genre(genre_name) VALUES('".$genre."')";
    $res = mysqli_query($connection, $sql);
    if($res) {
        echo "<script>";
        echo "alert('Genre was added!');";
        echo "location.replace('index.php');";
        echo "</script>";
        
    }
    else {
        mysqli_error($connection);
        echo "This genre already in the list, try to add another";
    }
}
?>



