<html xmlns="http://www.w3.org/1999/xhtml">
      <head>
            <title>Canada North Outfitting - Client Page</title>
            <link rel="stylesheet" type="text/css" href="header_styles.css">
            <link rel="stylesheet" type="text/css" href="AddClient_Styles.css">
            <script type="text/javascript" src="AddClient_Functions.js"></script>
      </head>
      <body >
            <header>
                  <a href="../Home Page/home.html"><img src="logo_horizontal.png" alt="Logo (polar bear...)" id="logo"/></a>
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
                                    <?php
                                      echo $_POST["firstname"];
                                      $firstname = $_POST["firstname"];
                                     ?><br>

                              Middle name:<br>
                                    <?php
                                      echo $_POST["middlename"];
                                      $middlename = $_POST["middlename"];
                                     ?><br>

                              Last name:<br>
                                    <?php
                                     echo $_POST["lastname"];
                                     $lastname = $_POST["lastname"];
                                     ?><br>
                                    <br>

                              <?php $hunter_names = $_POST["firstname"] . " " . $_POST["middlename"] . " " . $_POST["lastname"]; ?>

                              Date of Birth:<br>
                                    <?php
                                      echo $_POST["dob"];
                                      $dob = $_POST["dob"];
                                     ?><br>
                                    <br>
                              Home Phone Number:<br>
                                    <?php
                                      echo $_POST["homephone"];
                                      $homephone = $_POST["homephone"];
                                     ?><br>

                              Cell Phone Number:<br>
                                    <?php
                                      echo $_POST["cellphone"];
                                      $cellphone = $_POST["cellphone"];
                                     ?><br>

                              Business Phone Number:<br>
                                    <?php
                                      echo $_POST["businessPhone"];
                                      $businessPhone = $_POST["businessPhone"];
                                     ?><br>
                                    <br>

                              E-Mail:<br>
                                    <?php
                                      echo $_POST["email"];
                                      $email = $_POST["email"];
                                     ?><br>
                                    <br>

                              Country:<br>
                                    <?php
                                      echo $_POST["country"];
                                      $country = $_POST["country"];
                                     ?><br>
                                    <br>
                              Address Line 1:<br>
                                    <?php
                                      echo $_POST["addline1"];
                                      $addline1 = $_POST["addline1"];
                                     ?><br>

                              Address Line 2:<br>
                                    <?php
                                      echo $_POST["addline2"];
                                      $addline2 = $_POST["addline2"];
                                     ?><br>

                              City:<br>
                                    <?php
                                      echo $_POST["city"];
                                      $city = $_POST["city"];
                                     ?><br>

                               State/Province/Region:<br>
                                    <?php
                                      echo $_POST["state"];
                                      $state = $_POST["state"];
                                     ?><br>

                              ZIP/Postal Code:<br>
                                    <?php
                                      echo $_POST["zipcode"];
                                      $zipcode = $_POST["zipcode"];
                                     ?>
                                    <br>
                                    <br>

                                    <?php $fulladdress = $_POST["country"] . " " . $_POST["addline1"] . " " . $_POST["city"] . " " . $_POST["state"] . " " . $_POST["zipcode"]; ?>

                              Observer(s):<br>
                                    <?php
                                      echo $_POST["observers"];
                                      $observers = $_POST["observers"];
                                    ?>
                                    <br>
                    </div> <!--End inner_content -->

                  </div>

                  <div class="huntPackages">
                        <h2><u>Hunt Packages</u></h2>

                        Species:<br>
                        <?php
                          echo $_POST["species"];
                          $species = $_POST["species"];
                        ?>
                        <br>

                        Hunt Start Date:<br>
                        <?php
                          echo $_POST["tripSDate"];
                          $tripSDate = $_POST["tripSDate"];
                        ?><br>

                        Hunt End Date:<br>
                        <?php
                          echo $_POST["tripEDate"];
                          $tripEDate = $_POST["tripEDate"];
                        ?><br>

                        Location:<br>
                        <?php
                          echo $_POST["location"];
                          $location = $_POST["location"];
                        ?>

                        <br>Guide:<br>
                        <?php
                          echo $_POST["guide"];
                          $guide = $_POST["guide"];
                        ?>
                        <br>

                        Price:<br>
                        <?php
                          echo $_POST["price"];
                          $price = $_POST["price"];
                        ?>
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
  $db = "canada north outfitting database";

  $con = mysqli_connect($host, $user, $pass, $db);

  $sql = "INSERT INTO hunt (hunter_names, observer_names, species, starting_date, ending_date, hunt_location, guide_name, price, bow_or_rifle)
            VALUES('$hunter_names', '$observers', '$species', '$tripSDate', '$tripEDate', '$location', '$guide', '$price', '$GvsB')";

  $sql = "INSERT INTO client (hvo, first_name, middle_name, last_name, email, date_of_birth, business_phone,
            cell_phone, home_phone, address, clothing_rentals, gun_rentals, observer_names, notes)
            VALUES('$HvsO', '$firstname', '$middlename', '$lastname', '$email', '$dob', '$businessPhone',
              '$cellphone', '$homephone', '$fulladdress', '$clothing', '$YNGun', '$observers', '$notes')";

  if ($con->query($sql) === TRUE)
  {
    //echo "New record created successfully";
  }
  else
  {
    echo "Error: " . $sql . "<br>" . $con->error;
  }

?>