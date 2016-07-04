<html moznomarginboxes mozdisallowselectionprint>
	<head>
		<title>Canada North Outfitting - Home</title>
		<link rel="stylesheet" type="text/css" href="../../header_styles.css">
		<link rel="stylesheet" type="text/css" href="print_styles.css">
		<link rel="stylesheet" type="text/css" media="print" href="print.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
		<script type="text/javascript" src="printPage.js"></script>
	</head>

	<body>
		<header>
			<img src="../../Usable Logos/logo_horizontal.png" alt="Logo (polar bear...)" id="logo"/>			
			<input type="button" value="Sign Out" id="signout_button"/>
			<button id="print_button" onclick="printListener()">Print</button>
		</header>

		<!--<div class="wrapper">-->
			<?php
				$link = @mysqli_connect('localhost', 'root', '', 'test')
				OR die('Could not connect to MySQL: ' . mysqli_connect_error());
				
				$query = "SELECT 	flight.arrival_date,
									client.first_name,
									client.middle_name,
									client.last_name,
									flight.flight_number,
									hunt.starting_date,
									hunt.guide_name,
									hunt.hunt_location,
									client.gun_rentals,
									client.clothing_rentals,
									client.notes 
									FROM 	flight,
											client,
											hunt 
											WHERE client.client_id = flight.client_id AND client.hunt_id = hunt.hunt_id;";

				$response = @mysqli_query($link, $query);
				
				echo '<table><tr>
					<th class="col1">Client Arrival <br/>in Ottawa</th>
					<th class="col2">Client Name</th>
					<th class="col3">Flight # <!--& Arrival Time / From--></th>
					<th class="col4">Departure <br/>to Arctic</th>
					<th class="col5">Guide</th>
					<th class="col6">Community</th>
					<th class="col7 needsBorder">Rifle</th>
					<th class="col8 needsBorder">Arctic <br/>Clothing</th>
					<th class="col9">Notes</th></tr>';
						
				if($response){
					//for($i = 0; $i < 50; $i++){
					while($row = mysqli_fetch_array($response)){
						echo '<tr><td class="col1">' .
						$row[0] . '</td><td class="col2">' .
						$row[1];
						
						if($row[2])
							echo ' ' . $row[2];
						
						echo ' ' . $row[3] . '</td><td class="col3">' .
						$row[4] . '</td><td class="col4">' .
						$row[5] . '</td><td class="col5">' .
						$row[6] . '</td><td class="col6">' .
						$row[7] . '</td><td class="col7 needsBorder">';
						
						if($row[8])
							echo 'X</td><td class="col8 needsBorder">';
						else
							echo '</td><td class="col8 needsBorder">';
						
						echo $row[9] . '</td><td class="col9">' .
						$row[10] . '</td></tr>';
					}
				}
				echo '</table>';
			?>
		<!--</div>-->	
	</body>
</html>