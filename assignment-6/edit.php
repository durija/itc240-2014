<?php
//get password for database connection
include("passwords.php");
//connect to database
$mysql = new mysqli("localhost", "bbaile02", $mysql_password, "bbaile02");
//create select statement
$query = 'INSERT INTO cat_tracker (activity_type, calories_expended, activity_date) VALUES (?, ?, NOW());';
//create prepared statement
$prepared = $mysql->prepare($query);
//request data from form and bind parameters
$prepared->bind_param("si",$_REQUEST["activity_type"],$_REQUEST["calories_expended"]);
//execute the statement
$prepared->execute();

header("Location: index.php");
?>