<!DOCTYPE html>
<html lang="en">
<head>
  <title>Book Store</title>

  <?php
include 'header.php';

?>
<script src="jQuery.js"></script>
<div class="container">
    <div class="row">
    <div class="col-sm-3" style="float:right; z-index:1;">
        <h3> Total price </h3></br>
        <p id="text"> 0 KZT </p>
        <a href="order.php" class="btn btn-primary mb-2">Buy</a>
    </div>
<?php
    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $sql = "SELECT * FROM `cart` WHERE `cart_customer_email` = '".$_SESSION['user']['email']."'";
    if ($res = mysqli_query($connection, $sql)) {
        if (mysqli_num_rows($res) > 0) {

            while ($row = mysqli_fetch_array($res)) {
                $cart_id = $row['cart_id'];
                $cart_book_id = $row['cart_book_id'];
                $quantity = $row['cart_quantity'];

                if($cart_book_id != 0) {
                    $sql2 = "SELECT * FROM `books` WHERE `book_id` = $cart_book_id";
                    if ($res2 = mysqli_query($connection, $sql2)) {
                        if (mysqli_num_rows($res2) > 0) {
                            while ($row2 = mysqli_fetch_array($res2)) {
                                $book_id = $row2['book_id'];
                                $book_title = $row2['book_title'];
                                $book_price = $row2['book_price'];
                                $book_description = $row2['book_description'];
                                $image =$row2['book_cover'];
                                echo '<div id="books" class="col-sm-7">';
                                echo '<form action="'?> <?php $_PHP_SELF?><?php echo '" method = "post">';
                                echo '<div class="panel panel-default">';
                                echo '<div class="panel-heading">' . $book_title;
                                echo '<label style="float:right;">Order</label> &nbsp';
                                echo '<input class="checked" value="'. $book_price .'" type="checkbox" name="check'.$book_id.'" style="float:right;">';
                                echo '</div>';
                                echo '<div class="panel-body">';
                                echo '<img src="img/'.$image.'" style="height:250px; width:200px;" alt="Image">';
                                echo '</div>';
                                echo '<div class="panel-footer">';
                                echo $book_description . "</br></br>";
                                echo $book_price . " KZT" .'</br>';
                                echo '<input type="hidden" value="' . $book_id . '" name="bookID">';
                                echo "</br>";
                                echo "<input class='form-control' type='number' id='quan' name='quan' max='10' min='1' style='width:100px' value='".$quantity."' step='1'>";
                                echo '<button id="delete" style="float:right;" class="btn btn-danger" value="' . $book_id . '" name="delete">Delete</button>';
                                                               
                                                               
                                echo '</div>';
                                echo '</form>';
                                echo '</div>';
                                echo '</div><p>';
                            }
                        }
                        else {
                        echo "Not found.";
                        }
                    }                    
                    else {
                        echo "execution error $sql2. "
                        . mysqli_error($connection);
                    }
                }
            }
        }
    }
        
?>
</div>
</div>
<br><br>

<script>
$(document).ready(function() {        
    $(".checked").click(function(event) {
        var total = 0;
        $(".checked:checked").each(function() {
            total = (parseInt($(this).val())*$('#quan').val()) + total;
        });
        
        if (total == 0) {
            $('#text').val('');
        } else {                
            $('#text').html(total + " KZT");
        }
    });
});


            $(document).ready(function(){ 
                $('#delete').click(function() {
                    $('#books').fadeOut(2000);
                });  
            }); 
</script>


<?php
    
    if(isset($_REQUEST['delete'])) {
        
        $bookID = $_REQUEST['bookID'];
        include "deleteFromCart.php";
        
        deleteFunc($bookID);
    }
    
?>

<footer class="container-fluid text-center" style=" background-color: #383636;">

  <form class="form-inline">
  </form>
</footer>

</body>
</html>