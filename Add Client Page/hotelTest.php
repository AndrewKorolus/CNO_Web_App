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
				<a href="FlightInfo.html" class="FlightInfo">FLIGHT</a>
				<a id="currentPage" class="HotelInfo">HOTEL</a>
			</div>
		<form>
			<div class="form">
				<div class="inner_content">
					<h2><u>Hotel Information</u></h2>
					<table>
						<td ><h3><u>Gateway City</u></h3>
	                    Hotel Name:<br>
	                    <?php echo $_POST["GHotel"]; ?><br>

	                    Room Number:<br>
	                    <?php echo $_POST["GRoomNum"]; ?><br>
	                     
	                    Reservation Number:<br>
	                    <?php echo $_POST["GReservationNum"]; ?><br>
	                    </td>
	                    <td width="40%">
	                    <h3><u>Arctic Community</u></h3>
	                    Hotel Name:<br>
	                    <?php echo $_POST["AHotel"]; ?><br>
	                    
	                    Room Number:<br>
	                    <?php echo $_POST["ARoomNum"]; ?><br>
	                    
	                    Reservation Number:<br>
	                    <?php echo $_POST["AReservationNum"]; ?><br>
	                    </td>
	                    </table> 					
					
				</div>
	  		</div>
           </form> <!-- End form -->
		</div>
	</body>
</html>

<?php 
  
  $sql = "INSERT INTO hotelTable ". "(GHotel, GRoomNum, GReservationNum, AHotel, ARoomNum, AReservationNum) ". 
              	"VALUES('$GHotel', '$GRoomNum', '$GReservationNum', '$AHotel', '$ARoomNum', '$AReservationNum', NOW())";

?>