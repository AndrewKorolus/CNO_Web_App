<html>
	<head>
		<title>Canada North Outfitting - Home</title>
		<link rel="stylesheet" type="text/css" href="header_styles.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="list_styles.css">

		<script type="text/javascript">
			function backToHome()
			{
				window.location = "../Home Page/home.html";
			}
		</script>

	</head>

	<body>
		<header>
			<img src="Usable Logos/logo_horizontal.png" alt="Logo (polar bear...)" id="logo"/>
			<input type="button" value="Sign Out" id="signout_button"/>
		</header>

		<div class="wrapper">
			<div class= "background">
				<div class= "content" id="content">
					<h1>Search Results</h1>
					<img src="contactsImages/home.png" alt="homeImage" id="home" onClick="backToHome()"/>

					<table id="contactsTable">
						<tr id="labels">
							<td width="13%">Hunter Names</td>
							<td width="13%">Observer Names</td>
							<td width="13%">Species</td>
							<td width="13%">Location</td>
							<td width="13%">Starting Date</td>
							<td width="13%">Ending Date</td>
							<td width="13%">Clothing Rentals</td>
							<td width="13%">Gun Rentals</td>
						</tr>
						<?php

	$array = json_decode($_POST['selected']);
	$ids = array();
	for($x = 0; $x < count($array); $x++)
	{
		$temp = explode('_', $array[$x]);
		//echo "<script type='text/javascript'>alert('" . $temp[0] . "')</script>";
		array_push($ids, $temp);
	}

	// search for the records that match the selected fields
	$sql = "SELECT hunt_id, clothing_rentals, gun_rentals FROM client WHERE ";

	$clientsTemp = "";
	$speciesTemp = "";
	$seasonsTemp = "";
	$locationTemp = "";
	$otherTemp = "";

	$priorArray = array();
	$postArray = array();

	//echo "<script type='text/javascript'>alert('" . $sql . "')</script>";

	for($x = 0; $x < count($ids); $x++)
	{
		$field = $ids[$x][0];

		switch($field)
		{
			case "hunters":
			case "observers":
			case "clothes":
			case "rifleRentals": array_push($priorArray, $field); break;

			case "polarBear":
			case "muskox":
			case "walrus":
			case "centralCaribou":
			case "arcticCaribou":
			case "grizzlyBear":
			case "wolf":
			case "goose":
			case "spring":
			case "summer":
			case "fall":
			case "arcticBay":
			case "cambridgeBay":
			case "coralHarbour":
			case "igloolik":
			case "kimmirut":
			case "pondInlet":
			case "resolute":
			case "umingmaktok": array_push($postArray, $field); break;
		}
	}

	for($x = 0; $x < count($priorArray); $x++)
	{
		switch($priorArray[$x])
		{
			case "hunters": $clientsTemp = ($x == count($priorArray) - 1) ? "hvo=1" : "hvo=1 OR "; break;
			case "observers": $clientsTemp = ($x == count($priorArray) - 1) ? "hvo=0" : "hvo=0 OR"; break;

			case "clothes": $otherTemp .= ($x == count($priorArray) - 1) ? "clothing_rentals IS NOT NULL " : "clothing_rentals IS NOT NULL OR "; break;
			case "rifleRentals": $otherTemp .= ($x == count($priorArray) - 1) ? "gun_rentals IS NOT NULL " : "gun_rentals IS NOT NULL OR "; break;
		}
	}

	for($x = 0; $x < count($postArray); $x++)
	{
		switch($postArray[$x])
		{
			case "polarBear": $speciesTemp .= ($x == count($postArray) - 1) ? "species LIKE '%polar bear%'" : "species LIKE '%polar bear%' OR "; break;
			case "muskox": $speciesTemp .= ($x == count($postArray) - 1) ? "species LIKE '%muskox%'" : "species LIKE '%muskox%' OR "; break;
			case "walrus": $speciesTemp .= ($x == count($postArray) - 1) ? "species LIKE '%walrus%'" : "species LIKE '%walrus%' OR "; break;
			case "centralCaribou": $speciesTemp .= ($x == count($postArray) - 1) ? "species LIKE '%central barren ground caribou%'" : "species LIKE '%central barren ground caribou%' OR "; break;
			case "arcticCaribou": $speciesTemp .= ($x == count($postArray) - 1) ? "species LIKE '%arctic islands caribou%'" : "species LIKE '%arctic islands caribou%' OR "; break;
			case "grizzlyBear": $speciesTemp .= ($x == count($postArray) - 1) ? "species LIKE '%grizzly bear%'" : "species LIKE '%grizzly bear%' OR "; break;
			case "wolf": $speciesTemp .= ($x == count($postArray) - 1) ? "species LIKE '%wolf%'" : "species LIKE '%wolf%' OR "; break;
			case "goose": $speciesTemp .= ($x == count($postArray) - 1) ? "species LIKE '%goose%'" : "species LIKE '%goose%' OR "; break;

			case "spring": // UPDATE DATE SPANS
				$seasonsTemp .= ($x == count($postArray) - 1) ? "(MONTH(starting_date) BETWEEN 03 AND 06) AND
																 (MONTH(ending_date) BETWEEN 03 AND 06)" :
																"(MONTH(starting_date) BETWEEN 03 AND 06) AND
																 (MONTH(ending_date) BETWEEN 03 AND 06) OR "; break;
			case "summer":
				$seasonsTemp .= ($x == count($postArray) - 1) ? "(MONTH(starting_date) BETWEEN 07 AND 09) AND
																 (MONTH(ending_date) BETWEEN 07 AND 09)" :
																"(MONTH(starting_date) BETWEEN 07 AND 09) AND
																 (MONTH(ending_date) BETWEEN 07 AND 09) OR "; break;
			case "fall":
				$seasonsTemp .= ($x == count($postArray) - 1) ? "(MONTH(starting_date) BETWEEN 10 AND 12) AND
																 (MONTH(ending_date) BETWEEN 10 AND 12)" :
																"(MONTH(starting_date) BETWEEN 10 AND 12) AND
																 (MONTH(ending_date) BETWEEN 10 AND 12) OR "; break;

			case "arcticBay": $locationTemp .= ($x == count($postArray) - 1) ? "hunt_location='arctic bay'" : "hunt_location='arctic bay' OR "; break;
			case "cambridgeBay": $locationTemp .= ($x == count($postArray) - 1) ? "hunt_location='cambridge bay'" : "hunt_location='cambridge bay' OR "; break;
			case "coralHarbour": $locationTemp .= ($x == count($postArray) - 1) ? "hunt_location='coral harbour'" : "hunt_location='coral harbour' OR "; break;
			case "hallBeach": $locationTemp .= ($x == count($postArray) - 1) ? "hunt_location='hall beach'" : "hunt_location='hall beach' OR "; break;
			case "igloolik": $locationTemp .= ($x == count($postArray) - 1) ? "hunt_location='igloolik'" : "hunt_location='igloolik' OR "; break;
			case "kimmirut": $locationTemp .= ($x == count($postArray) - 1) ? "hunt_location='kimmirut'" : "hunt_location='kimmirut' OR "; break;
			case "pondInlet": $locationTemp .= ($x == count($postArray) - 1) ? "hunt_location='pond inlet'" : "hunt_location='pond inlet' OR "; break;
			case "resolute": $locationTemp .= ($x == count($postArray) - 1) ? "hunt_location='resolute'" : "hunt_location='resolute' OR "; break;
			case "umingmaktok": $locationTemp .= ($x == count($postArray) - 1) ? "hunt_location='umingmaktok'" : "hunt_location='umingmaktok' OR "; break;
		}
	}

	$whereTemp = ($clientsTemp == "" && $otherTemp == "") ? "hunt_id=(SELECT hunt_id FROM hunt WHERE " . $speciesTemp . $seasonsTemp . $locationTemp . ")" : " AND hunt_id=(SELECT hunt_id FROM hunt WHERE " . $speciesTemp . $seasonsTemp . $locationTemp . ")";
	if($speciesTemp == "" && $seasonsTemp == "" && $locationTemp == "") $whereTemp = "";

	$sql .= $clientsTemp . $otherTemp . $whereTemp;

	if($clientsTemp == "" && $otherTemp == "" && $speciesTemp == "" && $seasonsTemp == "" && $locationTemp == "")
		$sql = "SELECT hunt_id, clothing_rentals, gun_rentals FROM client";

	echo $sql . "<br/><br/>";

	// Connect to the database
	$host = "localhost";
	$user = "root";
	$pass = "lebensold";
	$db = "canada north outfitting database";

	$huntIds = "(";
	$gunRentals = array();
	$clotheRentals = array();

	$clientInfo['hunt_ids'] = array();

	$con = mysqli_connect($host, $user, $pass, $db);
	if(!$con) echo "<script type='text/javascript'>alert('Error: Cannot connect to the database')</script>";

	$result = $con->query($sql);
	if($result && $result->num_rows > 0)
	{
		$counter = 0;
		while($row = $result->fetch_assoc())
		{
			array_push($gunRentals, $row['gun_rentals']);
			array_push($clotheRentals, $row['clothing_rentals']);
			if ($counter == $result->num_rows - 1)
			{
        		// last row
        		$huntIds .= $row['hunt_id'];
    		}
    		else
    		{
        		// not last row
        		$huntIds .= $row['hunt_id'] . ", ";
    		}
    		$counter++;
		}
	}
	else
	{
		echo "<script type='text/javascript'>alert('Error: No matches')</script>";
	}

	$huntIds .= ")";

	echo $huntIds;

	$sql = "SELECT hunter_names, observer_names, species, hunt_location, starting_date, ending_date FROM hunt WHERE hunt_id IN " . $huntIds;
	$result = $con->query($sql);

	$counter = 0;
	if($result && $result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			echo "
				<tr>
					<td>" . $row['hunter_names'] . "</td>
					<td>" . $row['observer_names'] . "</td>
					<td>" . $row['species'] . "</td>
					<td>" . $row['hunt_location'] . "</td>
					<td>" . $row['starting_date'] . "</td>
					<td>" . $row['ending_date'] . "</td>
					<td>" . $clotheRentals[$counter] . "</td>
					<td>" . $gunRentals[$counter] . "</td>
				</tr>
			";
			$counter++;
		}
	}

?>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>