<html xmlns="http://www.w3.org/1999/xhtml">
      <head>
            <title>Canada North Outfitting - Client Page</title>
            <link rel="stylesheet" type="text/css" href="header_styles.css">
            <link rel="stylesheet" type="text/css" href="AddClient_Styles.css">
            <script type="text/javascript" src="AddClient_Functions.js"></script>
      </head>
      <body >
            <header>
                  <img src="logo_horizontal.png" alt="Logo (polar bear...)" id="logo"/>
                  <input type="button" value="Sign Out" id="signout_button"/>
            </header>

            <div class="wrapper">

                  <div class="InfoButtons">
                        <a class="ContactInfo" id="currentPage">CONTACT</a>
                        <a href="FlightInfo.html" class="FlightInfo">FLIGHT</a>
                        <a href="HotelInfo.html" class="HotelInfo">HOTEL</a>
                  </div>

            <form>
                  <div class="form">
                    <div class="inner_content">
                        <h2><u>New Client</u></h2>
                        <?php
                          $sql = "SELECT hunter_names, observer_names, species, starting_date, ending_date, hunt_location, guide_name, price, bow_or_rifle FROM hunt WHERE hunt_id = 2";

                          $species = "";
                          $HvsO = "";
                          $firstname = "";
                          $middlename = "";
                          $lastname = "";
                          $email = "";
                          $dob = "";
                          $businessPhone = "";
                          $cellphone = "";
                          $homephone = "";
                          $fulladdress = "";
                          $clothing = "";
                          $YNGun = "";
                          $observers = "";
                          $notes = "";
                          $hunter_names = "";
                          $observers = "";
                          $species = "";
                          $tripSDate = "";
                          $tripEDate = "";
                          $location = "";
                          $guide = "";
                          $price = "";
                          $GvsB = "";



                          if ($result->num_rows > 0)
                          {
                            // output data of each row
                            while($row = $result->fetch_assoc())
                              {
                                  $species = $row["species"];
                                  $HvsO = $row["hvo"];
                                  $firstname = $row["first_name"];
                                  $middlename = $row["middle_name"];
                                  $lastname = $row["last_name"];
                                  $email = $row["email"];
                                  $dob = $row["date_of_birth"];
                                  $businessPhone = $row["business_phone"];
                                  $cellphone = $row["cell_phone"];
                                  $homephone = $row["home_phone"];
                                  $fulladdress = $row["address"];
                                  $clothing = $row["clothing_rentals"];
                                  $YNGun = $row["gun_rentals"];
                                  $observers = $row["observer_names"];
                                  $notes = $row["notes"];
                                  $hunter_names = $row["hunter_names"];
                                  $observers = $row["observer_names"];
                                  $species = $row["species"];
                                  $tripSDate = $row["starting_date"];
                                  $tripEDate = $row["ending_date"];
                                  $location = $row["hunt_location"];
                                  $guide = $row["guide_name"];
                                  $price = $row["price"];
                                  $GvsB = $row["bow_or_rifle"];
                              }

                        ?>
                             Status:
                             <?php

                                $HvsO = -1;

                                $selected_radio = $_POST['HvsO'];

                                if($selected_radio == 'hunter')
                                {
                                  echo "Hunter";
                                  $HvsO = 1;

                                }
                                else if($selected_radio == 'observer')
                                {
                                  echo "Observer";
                                  $HvsO = 0;
                                }
                                else
                                {
                                  echo "Unknown";
                                }

                              ?>
                             <br>
                              <br>
                              First name:<br>
                              <input type="text" name="firstname" value="$row['first_name']" required><br>

                              Middle name:<br>
                              <input type="text" name="middlename" value="$row['middle_name']"><br>

                              Last name:<br>
                              <input type="text" name="lastname" value="$row['last_name']" required><br>
                              <br>
                              Date of Birth:<br>
                              <input type="date" name="dob" value="$row['date_of_birth']" required><br>
                              <br>
                              Home Phone Number:<br>
                              <input type="text" name="homephone" value="$row['home_phone']"><br>

                              Cell Phone Number:<br>
                              <input type="text" name="cellphone" value="$row['cell_phone']"><br>

                              Business Phone Number:<br>
                              <input type="text" name="businessPhone" value="$row['business_phone']"><br>
                              <br>

                              E-Mail:<br>
                              <input type="email" name="email" value="$row['email']"><br>
                              <br>


                              Country:<br>
                                    <?php
                                      echo $_POST["country"];
                                      $country = $_POST["country"];
                                     ?><br>
                                    <br>
                              Address Line 1:<br>
                              <input type="text" name="addline1" value="$row['']" required><br>
                              <div id="subtitle">Street address, P.O. Box, Company Name, etc</div>

                              Address Line 2:<br>
                              <input type="text" name="addline2" value="$row['']"><br>
                              <div id="subtitle">Apartment, Suite, Unit, Building, Floor, etc</div>
                              City:<br>
                              <input type="text" name="city" value="$row['']" required><br>

                              State/Province/Region:<br>
                              <input type="text" name="state" value="$row['']" required><br>

                              ZIP/Postal Code:<br>
                              <input type="text" name="zipcode" value="$row['']" required><br>
                              <br>
                              <br>

                              Observer(s):<br>
                              <input type="text" name="observers" value="$row['observer_names']" id="observers"><br>
                              <br>
                              <br>
                    </div> <!--End inner_content -->
                             <input type="submit" value="Update">
                  </div>

                  <div class="huntPackages">
                        <h2><u>Hunt Packages</u></h2>

                        Species:<br>
                        <select name="species" required>
                              <option selected disabled>Select</option>
                              <optgroup label="Single Hunts">
                                    <option value="Polar Bear">Polar Bear</option>
                                    <option value="Atlantic Walrus">Atlantic Walrus</option>
                                    <option value="Arctic Island Caribou">Arctic Island Caribou</option>
                                    <option value="Central Barren Ground Caribou">Central Barren Ground Caribou</option>
                                    <option value="Greenland Muskox">Greenland Muskox</option>
                                    <option value="Barren Ground Grizzly Bea">Barren Ground Grizzly Bear</option>
                                    <option value="Snow Goose">Snow Goose</option>
                              </optgroup>
                              <optgroup label="Combo Hunts">
                                    <option value="Polar Bear + Walrus">Polar Bear + Walrus</option>
                                    <option value="AI Caribou + Greenland Muskox">AI Caribou + Greenland Muskox</option>
                                    <option value="Polar Bear + Walrus + Caribou">Polar Bear + Walrus + Caribou</option>
                              </optgroup>
                        </select>
                        <br>

                        Hunt Start Date:<br>
                        <input type="date" name="tripSDate" id="start" value="$row['starting_date']" required><br>

                        Hunt End Date:<br>
                        <input type="date" name="tripEDate" id="end" value="$row['ending_date']" required><br>

                        Location:<br>
                        <select name="location">
                              <option selected disabled>Select</option>
                              <option value="Arctic Bay">Arctic Bay</option>
                              <option value="Cambridge Bay">Cambridge Bay</option>
                              <option value="Coral Harbour">Coral Harbour</option>
                              <option value="Hall Beach">Hall Beach</option>
                              <option value="Igloolik">Igloolik</option>
                              <option value="Kimmirut">Kimmirut</option>
                              <option value="Pond Inlet">Pond Inlet</option>
                              <option value="Resolute">Resolute</option>
                              <option value="Umingmaktok">Umingmaktok</option>

                        </select>

                        <br>Guide:<br>
                        <input type="text" name="guide" id="guide" value="$row['guide_name']" >
                        <br>

                        Price:<br>
                        <input type="text" name="price" id="price" value="$row['price']" >
                        <br>
                        <br>
                        <h3><u>Weapon of Choice</u></h3>

                        <?php

                            $GvsB = "Unknown";
                            $selected_radio2 = $_POST['yesNoGun'];

                            if($selected_radio2 == 'gun')
                            {
                                echo "Yes";
                                $GvsB = "Yes";
                            }
                            else if($selected_radio2 == 'bow')
                            {
                                echo "No";
                                $GvsB = "No";
                            }
                            else
                            {
                                echo "Unknown";
                            }
                        ?>

                        <br>

                    <h3><u>Included</u></h3>
                    <div id="included">
                        <?php
                          $included = "";


                        ?>
                    </div>
                  </div>

                <div class="rentals">
                    <h2><u>Gun Rental</u></h2>
                    <?php
                            $YNGun = "Unknown";
                            $selected_radio3 = $_POST['yesNoGun'];

                            if($selected_radio3 == 'yes')
                            {
                                echo "Yes";
                                $YNGun = "Yes";
                            }
                            else if($selected_radio3 == 'no')
                            {
                                echo "No";
                                $YNGun = "No";
                            }
                            else
                            {
                                echo "Unknown";
                            }
                      ?>
                    <h2><u>Clothing Rental</u></h2>
                    <?php
                          $clothing = "";



                      ?>

                    <h3><u>Size</u></h3>
                    <table>
                    <tr><td><input type="radio" name="size" <?php if (isset($size) && $size=="S") echo "checked";?> value="S">S</td>
                        <td><input type="radio" name="size" <?php if (isset($size) && $size=="M") echo "checked";?> value="M">M</td></tr>
                    <tr><td><input type="radio" name="size" <?php if (isset($size) && $size=="L") echo "checked";?> value="L">L</td>
                        <td><input type="radio" name="size" <?php if (isset($size) && $size=="XL") echo "checked";?> value="XL">XL</td></tr>
                    <tr><td><input type="radio" name="size" <?php if (isset($size) && $size=="XXL") echo "checked";?> value="XXL">XXL</td>
                        <td><input type="radio" name="size" <?php if (isset($size) && $size=="XXXL") echo "checked";?> value="XXXL">XXXL</td></tr>
                    </table>
                </div>

                <div class="notes">
                    <h2><u>Notes</u></h2>
                    <?php
                      echo $_POST["notes"];
                      $notes = $_POST["notes"];
                    ?>
                </div>
           </form> <!-- End form -->
            </div>
      </body>
</html>

<?php

// Connect to the database
  $host = "localhost";
  $user = "root";
  $pass = "lebensold";
  $db = "test";

  $con = mysqli_connect($host, $user, $pass, $db);
/*
  $sql = "UPDATE hunt SET hunter_names='Doe' WHERE id=2";
  $sql = "UPDATE hunt SET observer_names='Doe' WHERE id=2";
  $sql = "UPDATE hunt SET species='Doe' WHERE id=2";
  $sql = "UPDATE hunt SET starting_date='Doe' WHERE id=2";
  $sql = "UPDATE hunt SET ending_date='Doe' WHERE id=2";
  $sql = "UPDATE hunt SET hunt_location='Doe' WHERE id=2";
  $sql = "UPDATE hunt SET guide_name='Doe' WHERE id=2";
  $sql = "UPDATE hunt SET price='Doe' WHERE id=2";
  $sql = "UPDATE hunt SET bow_or_rifle='Doe' WHERE id=2";

  $sql = "UPDATE client SET hvo='Doe' WHERE id=2";
  $sql = "UPDATE client SET first_name='Doe' WHERE id=2";
  $sql = "UPDATE client SET middle_name='Doe' WHERE id=2";
  $sql = "UPDATE client SET last_name='Doe' WHERE id=2";
  $sql = "UPDATE client SET email='Doe' WHERE id=2";
  $sql = "UPDATE client SET date_of_birth='Doe' WHERE id=2";
  $sql = "UPDATE client SET business_phone='Doe' WHERE id=2";
  $sql = "UPDATE client SET cell_phone='Doe' WHERE id=2";
  $sql = "UPDATE client SET home_phone='Doe' WHERE id=2";
  $sql = "UPDATE client SET address='Doe' WHERE id=2";
  $sql = "UPDATE client SET clothing_rentals='Doe' WHERE id=2";
  $sql = "UPDATE client SET gun_rentals='Doe' WHERE id=2";
  $sql = "UPDATE client SET observer_names='Doe' WHERE id=2";
  $sql = "UPDATE client SET notes='Doe' WHERE id=2";
*/
  if ($con->query($sql) === TRUE)
  {
    echo "Record updated successfully";
  }
  else
  {
    echo "Error: " . $sql . "<br>" . $con->error;
  }

?>