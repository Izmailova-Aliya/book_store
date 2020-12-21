<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="styles/style.css" rel="stylesheet" type="text/css">
    <?php
      include 'connection.php';
      include 'header.php'; 
    ?>


<div class="col-sm-4"></div>
<div id="reg" class="col-sm-4">
    <form action="<?php $_PHP_SELF ?>" method = "post">
        <div class="form-group">
        <div class="panel panel-default">
            <div class="panel-heading">Registration form</div>
            <div class="panel-body">
                
                Personal information</br></br>
                <input class="form-control" type="email" name="email" placeholder="Email"></br>
                <input class="form-control" type="password" name="password" placeholder="password"></br>
                <input class="form-control" type="text" name="fname" placeholder="First name"></br>
                <input class="form-control" type="text" name="lname" placeholder="Surname"></br>
                <input class="form-control" type="tel" name="phone" placeholder="Phone number"></br></br>

            </div>
            <div class="panel-footer">
                <input class="btn btn-primary mb-2" type="submit" name="reg" value="Sing Up">
            </div>
        </div>
        </div>
    </form>
</div>
<div class="col-sm-4"></div>

<?php
if(isset($_REQUEST['reg'])) { 
    $email = $_POST['email'];
    $password=$_POST['password'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $phone=$_POST['phone'];
    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $personal = "INSERT INTO customer (customer_email,
        customer_password, customer_fname, customer_lname,
        customer_phone)
        VALUES ('".$email."', '".md5($password)."', '".$fname."',
        '".$lname."', '".$phone."')";
   
    if(mysqli_query($connection, $personal)){
        echo '<script type="text/javascript">';
        echo 'alert("Registered."); ';
        echo "location.replace('login.php');"; 
        echo '</script>';
    } else{
        echo "ERROR: Could not able to execute $personal. " . mysqli_error($connection);
    }
}
?>

<!--Address for delivery</br></br>
                <input type="number" name="zip_code" placeholder="Zip Code"></br>
                <input type="text" name="country" placeholder="Country"></br>
                <input type="text" name="city" placeholder="City"></br>
                <input type="text" name="street" placeholder="Street"></br>
                <input type="number" name="house" placeholder="House number"></br>
                <input type="number" name="apartment_num" placeholder="Apartment number"></br>
                 // $city = $_POST['city'];
    // $country =$_POST['country'];
    // $address_city = "INSERT INTO city VALUES";