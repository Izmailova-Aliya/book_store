<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Book Store</title>
      <link rel="stylesheet" href="style/style_index.css">
      <link rel="stylesheet" href="style/style_edit_user.css">
      <?php
include 'header.php';
?>
      <div class="container-fluid">
         <div class="row content">
            <div class="col-sm-2 sidenav">
               <ul class="nav nav-pills nav-stacked">
                  <li><a href="#section1" onclick="profile()">Profile</a></li>
                  <li><a href="#section2" onclick="pswd()">Password</a></li>
                  <li><a href="#section3" onclick="address()">Address</a></li>
               </ul>
            </div>
            <div class="col-sm-2"></div>
            <div id="halfChange" class="col-sm-8">
                <div class="col-sm-4">
                    <form action="<?php $_PHP_SELF?>" method="post">
                        <div class="form-group">
                            <div class="panel panel-default">
                                <div class="panel-heading"> Edit profile <?php echo $_SESSION['user']['email'] ?> </div>
                                <div class="panel-body">
                                    <div id="name">Name:
                                        <input class="form-control" type="text" name="name" value="<?php echo $_SESSION['user']['fname'] ?>">
                                        </br>
                                    </div>
                                    <div id="surname" >Surname:
                                        <input class="form-control" type="text" name="surname" value="<?php echo $_SESSION['user']['lname'] ?>">
                                    </div>
                                    <div id="phoneNum" >Phone:
                                        <input class="form-control" type="text" name="phoneNum" value="<?php echo $_SESSION['user']['phone'] ?>">
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <input class="btn btn-primary mb-2" type="submit" name="editProfile" value="Edit">
                                </div>
                            </div>
                        </div>
                    </form>
               </div>
</div></br>
            <div class="col-sm-4"></div>
            
        
    </div>
</div>
      <?php
if (isset($_POST['editProfile'])) {
    $_SESSION['user']['fname'] = $_POST['name'];
    $_SESSION['user']['lname'] = $_POST['surname'];
    $_SESSION['user']['phone'] = $_POST['phoneNum'];
    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $editProfileSql = "UPDATE customer SET customer_fname = '" . $_POST['name'] . "', customer_lname = '" . $_POST['surname'] . "', customer_phone = '" . $_POST['phoneNum'] . "' WHERE customer_email = '" . $_SESSION['user']['email'] . "'";
    if (mysqli_query($connection, $editProfileSql)) {
        echo '<script type="text/javascript">';
        echo 'alert("Your profile was updated successfully."); ';
        echo '</script>';
    } else {
        echo "Could not able to execute $editProfileSql. " . mysqli_error($connection);
    }
    mysqli_close($connection);
}

if (isset($_POST['editPassword'])) {
    if (md5($_POST['oldPass']) != $_SESSION['user']['password']) {
        echo 'Password does not match with your old one';

    } elseif ($_POST['oldPass'] == '' || $_POST['newPass'] == '' || $_POST['confirm'] == '') {
        echo 'Fieds should not be empty';
    } elseif (md5($_POST['oldPass']) == $_SESSION['user']['password']) {
        if ($_POST['newPass'] != $_POST['confirm']) {
            echo "New and Confirmation password do not match";
        } else {
            $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
            $editPassword = "UPDATE customer SET customer_password = '" . md5($_POST['newPass']) . "' WHERE customer_email = '" . $_SESSION['user']['email'] . "'";
            if (mysqli_query($connection, $editPassword)) {
                echo '<script type="text/javascript">';
                echo 'alert("Your profile was updated successfully."); ';
                echo '</script>';
            } else {
                echo "Could not able to execute $editPassword. " . mysqli_error($connection);
            }
            mysqli_close($connection);
        }
    }

}

if(isset($_POST['editAddress'])) {
    $country = $_POST['country'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $street = $_POST['street'];
    $house = $_POST['house'];
    $apartment = $_POST['apartment'];
    $email = $_SESSION['user']['email'];
    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    $q = "SELECT address_email FROM `address` WHERE address_email='$email'";
    if ($rs = mysqli_query($connection, $q)) {
        if (mysqli_num_rows($rs) == 0) {
            $sql = "INSERT INTO address(address_street, address_house, address_apartment_num, address_zip_code, address_country, address_city, address_email) 
                    VALUES('$street', $house, $apartment, $zip, '$country', '$city', '$email')";
            $res = mysqli_query($connection, $sql);
            if($res) {
                echo "Address inserted successfully!";
            }
            else {
                echo mysqli_error($connection);
            }
        }

        else{
            $sql = "UPDATE address SET address_street = '$street', address_house =$house, address_apartment_num =$apartment,
                address_zip_code =$zip, address_country ='$country', address_city = '$city'
                WHERE address_email = '$email'";
            $res = mysqli_query($connection, $sql);
            if($res) {
                echo "Address updated successfully!";
            }
            else {
                echo mysqli_error($connection);
            }
        }
    }
    else {
        echo mysqli_error($connection);
    }

    
}
?>
      <script>

        function profile() {
             var xhttp = new XMLHttpRequest();
             xhttp.onreadystatechange = function() {
                 if(this.readyState == 4 && this.status == 200) {
                     document.getElementById("halfChange").innerHTML = this.responseText;
                 }
             };
             xhttp.open("POST", "phpParts/profile_part.php", true);
             xhttp.send();
         }

         function address() {
             var xhttp = new XMLHttpRequest();
             xhttp.onreadystatechange = function() {
                 if(this.readyState == 4 && this.status == 200) {
                     document.getElementById("halfChange").innerHTML = this.responseText;
                 }
             };
             xhttp.open("POST", "phpParts/address_part.php", true);
             xhttp.send();
         }

         function pswd() {
             var xhttp = new XMLHttpRequest();
             xhttp.onreadystatechange = function() {
                 if(this.readyState == 4 && this.status == 200) {
                     document.getElementById("halfChange").innerHTML = this.responseText;
                 }
             };
             xhttp.open("POST", "phpParts/password_part.php", true);
             xhttp.send();
         }

      </script>
      </body>
</html>