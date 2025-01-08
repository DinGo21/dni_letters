<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
if (!$conn)
{
	die("Connection failed: " . mysqli_connect_error());
}

try
{
	if (!mysqli_query($conn, "DROP DATABASE letters"))
	{
		die("Error creating database: " . mysqli_error($conn));
	}
}
catch (mysqli_sql_exception $e)
{
	$e;
}

if (!mysqli_query($conn, "CREATE DATABASE letters"))
{
	die("Error creating database: " . mysqli_error($conn));
}

if (!mysqli_query($conn, "CREATE TABLE letters.letters(
														id INT PRIMARY KEY AUTO_INCREMENT,
														letter VARCHAR(1) NOT NULL)"))
{
	die("Error creating table: " . mysqli_error($conn));
}

$letters = ['T', 'R', 'W', 'A', 'G', 
			'M', 'Y', 'F', 'P', 'D', 
			'X', 'B', 'N', 'J', 'Z', 
			'S', 'Q', 'V', 'H', 'L', 
			'C', 'K', 'E'];

foreach ($letters as $letter)
{
	if (!mysqli_query($conn, "INSERT INTO letters.letters (`letter`) VALUES ('$letter')"))
	{
		die("Cannot insert element into table: " . mysqli_error($conn));
	}
}

echo "Database successfully imported";
