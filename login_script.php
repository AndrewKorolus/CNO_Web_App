<?php

	$username = strip_tags(trim($_POST["username"]));
	$password = strip_tags(trim($_POST["password"]));

	// Connect to the database
	$host = "localhost";
	$user = "root";
	$pass = "lebensold";
	$db = "canada north outfitting database";

	$con = mysqli_connect($host, $user, $pass, $db);
	if(!$con) echo "<script type='text/javascript'>alert('Error: Cannot connect to the database.')</script>";

	$sql = "SELECT password FROM users WHERE username='" . $username . "'";
	$result = $con->query($sql);

	$authenticated = false;
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			if($row['password'] == $password)
				$authenticated = true;
		}
	}

	if($authenticated)
		echo "<script type='text/javascript'>window.location = './Home Page/home.html';</script>";
	else
	{
		echo "<script type='text/javascript'>alert('Authentification failed.')</script>";
		include("./login.html");
	}



?>