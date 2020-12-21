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
    <div class="col-sm-2 sidenav">
        <ul class="nav nav-pills nav-stacked">
            <li><a href="#section1" onclick="book()">Book</a></li>
            <li><a href="#section2" onclick="author()">Author</a></li>
           <li><a href="#section3" onclick="genre()">Genre</a></li>
        </ul>
    </div>

        <div class="col-sm-7" id="halfChange">
            <form action="<?php $_PHP_SELF?>" method="post" enctype="multipart/form-data">
            <div class="form-group" style="width:40%; margin:auto">
                <h3>Book</h3>
                <label for="title">Title: </label></br>
                <input class="form-control" type="text" name="title" placeholder="Title"></br></br>
                <label for="price">Price: </label></br>
                <input class="form-control" type="number" name="price" placeholder="Price"></br></br>
                <label for="description"> Description: </label></br>
                <textarea class="form-control" name="description" placeholder="Description" cols="20" rows="10"></textarea></br></br>
                <label for="image"> Cover: </label></br>
                <input type="file" name="image">


                <h3>Author</h3>
                <input class="form-control" type="text" placeholder="Author's name" name="name" id="suggestAuthorName" list="name_data"></br>
                    <datalist id="name_data">

                    </datalist></br>

                
                <input class="form-control" type="text" placeholder="Author's surname" name="surname" id="suggestAuthorSurname" list="surname_data"></br></br>

                <datalist id="surname_data">

                </datalist></br></br>

                <h3>Genre</h3>
                <input class="form-control" type="text" name="genre" id="suggest" list="genre_data" placeholder="Genre">
                <datalist id="genre_data">

                </datalist></br></br>

                <input class="btn btn-primary mb-2" type="submit" name="add" value="Submit">
            </div>
            </form>
        </div>


    </div>
</div></br></br></br></br></br>

<?php
$msg = "";
if (isset($_POST['add'])) {

    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $fname = $_POST['name'];
    $lname = $_POST['surname'];
    $genre = $_POST['genre']; //string(name of genre)
    $image = $_FILES['image']['name'];
    $target = "img/" . basename($image);
    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    $sqlAuthor = "SELECT author_id FROM author WHERE author_fname='".$fname."' AND author_lname='".$lname."'";
    $sqlGenre = "SELECT genre_id FROM genre WHERE genre_name = '".$genre."'";

    if(($res1 = mysqli_query($connection, $sqlAuthor) or trigger_error(mysql_error())) && ($res2 = mysqli_query($connection, $sqlGenre) or trigger_error(mysql_error()))) {

            while ($row = mysqli_fetch_array($res1)) {
                $authorID = $row['author_id'];
            }
            while ($row2 = mysqli_fetch_array($res2)) {
                $genreID = $row2['genre_id'];
            }
            $addQuery = "INSERT INTO books (book_title, book_price, book_description, book_cover, book_author_id, book_genre_id)
                        VALUES('$title', $price, '$description',  '$image', $authorID, $genreID)";
            if (mysqli_query($connection, $addQuery)) {
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    $msg = "Image uploaded successfully";
                } else {
                    $msg = "Failed to upload image";
                }
                echo "UPLOADED SUCCESSFULLY!";
            } else {
                echo mysqli_error($connection);
            }
        
        
    }

    
    //$addQueryAuthor = "INSERT INTO author(author_fname, author_lname) VALUES('".$fname."', '".$lname."')";
    // $b_g_genre_id = mysqli_query($connection,"SELECT genre_id FROM genre WHERE genre_name = '".$genre."'");
    // $row = mysqli_fetch_assoc($b_g_genre_id);//id=> number

    //check is author already in the table or not in order to escape from repeationg data in the author's table
    // $sql1 = "SELECT author_fname FROM author WHERE author_fname='".$fname."'";
    // $sql2 = "SELECT author_lname FROM author WHERE author_lname='".$lname."'";
    // if((mysqli_query($connection, $sql1)) == false && (mysqli_query($connection, $sql2))==false) {
    //     $r = mysqli_query($connection, $addQueryAuthor);
    // }
    //book adding
    
    // $selectID = "SELECT book_id FROM books WHERE book_title = '".$title."'";
    // $idB= mysqli_fetch_array(mysqli_query($connection, $selectID));

    //we choose ID of the book and add data to the table, which connect book table with genre table

    // $addQueryGenreBook = "INSERT INTO book_and_genre(b_g_book_id, b_g_genre_id) VALUES (".$idB.", ".$row.")";
    //         if(mysqli_query($connection, $addQueryGenreBook)) {
    //             echo "genre ok!";
    //         }
    //         else {
    //             echo mysqli_error($connection);
    //         }

    //choosing the ID of the Author
    // $selectAuthorID = "SELECT author_id FROM author WHERE author_fname = '".$fname."' AND author_lname = '".$lname."'";
    // $resSelectAuthorID = mysqli_query($connection, $selectAuthorID);
    //     //then add IDs to the table that combines author's id and book's id
    //     $idA =(mysqli_query($connection,$resSelectAuthorID));

    //     $bookAndAuthor = "INSERT INTO book_and_author(b_a_author_id, b_a_book_id) VALUES (".$idA.", ".$idB.")";
    //         if(mysqli_query($connection, $bookAndAuthor)) {
    //            echo "author ok";
    //         }
    //         else {
    //             echo mysqli_error($connection);
    //         }

}


if(isset($_GET['addAuthor'])) {
    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $fname = $_GET['fname'];
    $lname = $_GET['lname'];
    $sql = "INSERT INTO author(author_fname, author_lname) VALUES('".$fname."', '".$lname."')";
    $res = mysqli_query($connection, $sql);
    if($res) {
        echo "<script>";
        echo "alert('Author was added!');";
        echo "location.replace('add_book.php#section1');";
        echo "</script>";
        
    }
    else {
        mysqli_error($connection);
        echo "This genre already in the list, try to add another";
    }
}




if(isset($_GET['addGenre'])) {
    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $genre = $_GET['genre'];
    $sql = "INSERT INTO genre(genre_name) VALUES('".$genre."')";
    $res = mysqli_query($connection, $sql);
    if($res) {
        echo "<script>";
        echo "alert('Genre was added!');";
        echo "location.replace('add_book.php#section1');";
        echo "</script>";
        
    }
    else {
        mysqli_error($connection);
        echo "This genre already in the list, try to add another";
    }
}
?>




<script>

function book() {
     var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
         if(this.readyState == 4 && this.status == 200) {
             document.getElementById("halfChange").innerHTML = this.responseText;
         }
     };
     xhttp.open("POST", "phpParts/book.php", true);
     xhttp.send();
 }

 function author() {
     var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
         if(this.readyState == 4 && this.status == 200) {
             document.getElementById("halfChange").innerHTML = this.responseText;
         }
     };
     xhttp.open("POST", "phpParts/author.php", true);
     xhttp.send();
 }

 function genre() {
     var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
         if(this.readyState == 4 && this.status == 200) {
             document.getElementById("halfChange").innerHTML = this.responseText;
         }
     };
     xhttp.open("POST", "phpParts/genre.php", true);
     xhttp.send();
 }

</script>