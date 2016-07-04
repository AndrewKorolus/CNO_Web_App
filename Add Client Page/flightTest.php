<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Canada North Outfitting - Add Client</title>
		<link rel="stylesheet" type="text/css" href="header_styles.css">
		<link rel="stylesheet" type="text/css" href="AddClient_Styles.css">
	</head>

	<body>
		<header>
			<a href="home.html"><img src="logo_horizontal.png" alt="Logo (polar bear...)" id="logo"/></a>			
			<input type="button" value="Sign Out" id="signout_button"/> 
		</header>

		<div class="wrapper">
            
			<div class="InfoButtons">
				<a href="AddClient.html" class="ContactInfo" >CONTACT</a>
				<a class="FlightInfo" id="currentPage">FLIGHT</a>
				<a href="HotelInfo.html" class="HotelInfo">HOTEL</a>
			</div>
			<form>
			<div class="form">
				<div class="inner_content">
					<h2><u>Flight Information</u></h2>
					
	                    Passport Number:<br>
	                    <?php echo $_POST["passportNum"]; ?><br>
						
						<table>
						<td><h3><u>Gateway City</u></h3>
	                    Airline:<br>
	                    <?php echo $_POST["GAirline"]; ?><br>

	                    Flight Number:<br>
	                    <?php echo $_POST["GFlightNum"]; ?><br>
	                    
	                    Confirmation Code:<br>
	                    <?php echo $_POST["GConfirmationNum"]; ?><br>
	                    <br>

	  					Arrival Date/Time:<br>
	  					<?php echo $_POST["GArrival"]; ?><br>
                        
                        Departure Date/Time:<br>
                        <?php echo $_POST["GDeparture"]; ?><br>
                    	</td>
                        <br>
                        <td width="40%">
	                    <h3><u>Arctic Community</u></h3>
	                    Airline:<br>
	                    <?php echo $_POST["AAirline"]; ?><br>

	                    Flight Number:<br>
	                    <?php echo $_POST["AFlightNum"]; ?><br>
	                    
	                    Confirmation Code:<br>
	                    <?php echo $_POST["AConfirmationNum"]; ?><br>
	                    <br>

	  					Arrival Date/Time:<br>
	  					<?php echo $_POST["AArrival"]; ?><br>
                        
                        Departure Date/Time:<br>
                        <?php echo $_POST["ADeparture"]; ?><br>
						</td>
                        </table>
				</div>
			</div> <!-- End form -->
           </form>
		</div>
	</body>
</html>

<?php 
  
  $sql = "INSERT INTO flightTable ". "(passportNum, GAirline, GFlightNum, GConfirmationNum, GArrival, 
  				GDeparture, AAirline, AFlightNum, AConfirmationNum, AArrival, ADeparture) ". 
              	"VALUES('$passportNum', '$GAirline', '$GFlightNum', '$GConfirmationNum', '$GArrival', 
              	'$GDeparture', '$AAirline', '$AFlightNum', '$AConfirmationNum', '$AArrival','$ADeparture', NOW())";

?>