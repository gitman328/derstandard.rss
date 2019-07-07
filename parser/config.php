<?php 
//
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	
	@$dbmysqli = mysqli_connect("localhost", "sql-benutzername", "sql-passwort", "sql-datenbank");
	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

?>