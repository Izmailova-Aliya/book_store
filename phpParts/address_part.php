<?php session_start(); 
   include "../connection.php";
   $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
   $sql = "SELECT * FROM address WHERE address_email = '".$_SESSION['user']['email']."'";
   $result = mysqli_query($connection, $sql);
   if ($result) {
      if (mysqli_num_rows($result) > 0) {
         while ($row = mysqli_fetch_array($result)) {
            $street = $row['address_street'];
            $house = $row['address_house'];
            $apartment = $row['address_apartment_num'];
            $zip = $row['address_zip_code'];
            $country = $row['address_country'];
            $city = $row['address_city'];
            $email = $row['address_email'];
         }
      }
   }
?>
<div class="col-sm-4">
   <form action="<?php $_PHP_SELF?>" method="post">
      <div class="form-group">
         <div class="panel panel-default">
            <div class="panel-heading"> Edit address <?php echo $_SESSION['user']['email'] ?> </div>
            <div class="panel-body">
               <div id="city">Country:
                  <input class="form-control" type="text" name="country" value="<?php if(isset($country)) {echo $country;} ?>">
                  </br>
               </div>
               <div id="city" >City:
                  <input class="form-control" type="text" name="city"  value="<?php if(isset($city)) {echo $city;} ?>">
               </div>
               <div id="zip" >Zip-Code:
                  <input class="form-control" type="text" name="zip"  value="<?php if(isset($zip)) {echo $zip;}?>">
               </div>
               <div id="street" >Street:
                  <input class="form-control" type="text" name="street"  value="<?php if(isset($country)) {echo $street;} ?>">
               </div>
               <div id="house" >House:
                  <input class="form-control" type="text" name="house"  value="<?php if(isset($house)) {echo $house;} ?>">
               </div>
               <div id="Apartment" >Apartment:
                  <input class="form-control" type="text" name="apartment" value="<?php if(isset($apartment)) {echo $apartment;}  ?>">
               </div>
            </div>
            <div class="panel-footer">
               <input class="btn btn-primary mb-2" type="submit" name="editAddress" value="Update">
            </div>
         </div>
      </div>
   </form>
</div>
