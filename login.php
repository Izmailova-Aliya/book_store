<!DOCTYPE html>
<html lang="en">
<head>
  <title>Authorization</title>
  <?php  
    include ('header.php');
  ?>


<div class="col-sm-4"></div>
<div id="reg" class="col-sm-4">
    <form action="<?php $_PHP_SELF?>" method = "post">
    <div class="form-group">
        <div class="panel panel-default">
            <div class="panel-heading">Authorization form</div>
            <div class="panel-body">

                Personal information</br></br>
                <input class="form-control" type="email" name="email" placeholder="Email"></br>
                <input class="form-control" type="password" name="password" placeholder="Password"></br>
            </div>
            <div class="panel-footer">
                <input class="btn btn-primary mb-2" type="submit" name="login" value="Log In">
            </div>
        </div>
        </div>
    </form>
</div>
<div class="col-sm-4"></div>

<?php
if (isset($_REQUEST['login'])) {
  $_SESSION['login'] = $_REQUEST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    $query = "SELECT * FROM `customer` WHERE customer_email='$email'
    and customer_password='" . md5($password) . "'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $num_rows = mysqli_num_rows($result);    
    if ($num_rows == 0) {
        echo "You are not registered or incorrect data in the fields";
    } 
    else if($num_rows == 1) {
        $_SESSION['user'] = array (
            'email' => $row['customer_email'],
            'password' => $row['customer_password'],
            'fname' => $row['customer_fname'],
            'lname'=>$row['customer_lname'],
            'phone'=>$row['customer_phone'],
            'role' => $row['role'],
        );
        $role = $_SESSION['user']['role'];
        switch($role) {
            case 'admin':
                header('location: index.php');
            break;
            case 'user':
                header('location: index.php');
            break;
        }
    }
}
  
?>