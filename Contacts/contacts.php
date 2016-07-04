<html>
	<head>
		<title>Canada North Outfitting - Home</title>
		<link rel="stylesheet" type="text/css" href="header_styles.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="contacts_styles.css">

		<script>
			function clickEnter(event) {
    			var x = event.which || event.keyCode;
    			var name = document.getElementById('search').value;
    			var year = document.getElementById("selectYear").value;
    			var x = document.getElementsByName();

    			if (x == 13) {
    				if(name == 'Search by Name' || name == '')
    				{
    					alert("Please write a name");
    				}
    				else if(year == 'year')
    				{
    					alert("please select an year");
    				}
    				else
    				alert ("You want to search for " + name +" in " + year + "!");
   		 		}
			}
		</script>

		<?php
			// Get a connection for the database
			//require_once('connect.php');

	$host = "localhost";
	$user = "root";
	$pass = "lebensold";
	$db = "canada north outfitting database";

	$con = mysqli_connect($host, $user, $pass, $db);

			// Create a query for the database
			$query = "SELECT * FROM client order by first_name";

			// Get a response from the database by sending the connection
			// and the query
			//$response = mysqli_query($con, $query);
			$response = $con->query($query);


			if(isset($_GET['delete'])) {

				if(isset($_GET['multiple']))
				{
					$multiple = $_GET['multiple'];
					$i = 0;
					$sql = "DELETE FROM `client`";
					foreach ($multiple as $key) {
						$i++;
						if($i == 1)
						{
							$sql .= " WHERE `client`.`client_id` =". $key;
						}
						else
						{
							$sql .= " OR `client`.`client_id` =". $key;
						}

						mysqli_query($con,$sql);
						header("location:contacts.php");
					}
				}
			}
		?>
	</head>

	<body>

		<header>
			<img src="Usable Logos/logo_horizontal.png" alt="Logo (polar bear...)" id="logo"/>
			<input type="button" value="Sign Out" id="signout_button"/>
		</header>


		<div class="wrapper">
			<div class= "background">
				<div class= "content" id="content">
					<form action = " <?php echo $_SERVER['PHP_SELF']; ?>" method = "GET" id="mainForm">
						<a href="../Home Page/home.html" ><img src="contactsImages/home.png" alt="homeImage" id="home"/></a>
						<a href="../Add Client Page/addClient.html"><img src="contactsImages/add.png" alt="addImage" id="add"/></a>
						<input id="trash" src="contactsImages/trash.png" name="delete" type="image" value="delete" alt="Submit Form">

						<div id = "searchDiv">
							<input type="text" name="search" value="Search by Name" id="search"
									onblur="if (value == '') {value = 'Search by Name';}"
 									onfocus="if (value == 'Search by Name') {value = '';}"
 									onkeydown="clickEnter(event)">

 							</input>
 							<select name ="select" id="selectYear" onkeydown="clickEnter(event)">
 								<option value="year">Year</option>
  								<option value="2010">2010</option>
 								<option value="2011">2011</option>
 								<option value="2012">2012</option>
 								<option value="2013">2013</option>
 								<option value="2014">2014</option>
 								<option value="2015">2015</option>
 								<option value="2016">2016</option>
 								<option value="2017">2017</option>
							</select>
							<input id="searchBtn" type="image" src="contactsImages/search.png" alt="Submit">
						</div>


						<table id="TitleTable" align = "left">
							<thead>
								<tr>
									<td max-width="15%">Name</td>
									<td max-width="10%">Email</td>
									<td max-width="20%">Address</td>
									<td max-width="10%">Home Phone</td>
									<td max-width="10%">Cell Phone</td>
									<td max-width="10%">Work Phone</td>
									<td max-width="20%">Date Added</td>
									<td max-width="5%"></td>
								</tr>
							</thead>

							<tbody>
								<?php
								while($row = $response->fetch_assoc())
								{
									echo '<tr>
									<td align="left">' . $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'] .'</td>
									<td align="left">' . $row['email'] . '</td>
									<td align="left">' . $row['address'] . '</td>
									<td align="left">' . $row['home_phone'] . '</td>
									<td align="left">' . $row['cell_phone'] . '</td>
									<td align="left">' . $row['business_phone'] . '</td>
									<td align="left">' . $row['date_created'] . '</td>
									<td>

									<a href="../Add Client Page/EditClient.html"id='.$row['client_id'].'"edit">edit</a><br>

									<input type="checkbox" name="multiple[]" value="'.$row['client_id'].'">
									</td>
									</tr>';
								};
								?>
							</tbody>
						</table>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>