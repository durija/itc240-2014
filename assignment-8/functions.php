<?php
//I like this little function, so I'm adopting it.
function out($unclean) {
  $clean = htmlentities($unclean);
  return $clean;
}

//connect to the mysql server
$mysql = new mysqli("localhost", "bbaile02", $mysql_password, "bbaile02");

//Updates the activity_type of one particular id.
function activity_updater($activity_type, $id) {
  global $mysql;
  $prepared = $mysql->prepare('UPDATE cat_tracker SET activity_type = ? WHERE id = ?');
  $prepared->bind_param("si", $activity_type, $id);
  $prepared->execute();
}

function get_cat_tracker() {
  global $mysql;
  $prepared = $mysql->prepare('SELECT * FROM cat_tracker');
  $prepared->execute();
  return $prepared->get_result();
}
//I never could get this to call correctly on the index page, so I just moved it there.
//function get_new_activity()	{
	
//$activityQuery = $mysql->prepare('SELECT activity_type AS new from cat_tracker WHERE id = 5');
//don't need to bind, no parameters
//execute the query statement
//$activityQuery->execute();
//get the result of the query statement execution
//$newActivity = $activityQuery->get_result();
//avoid looping by using fetch_array
//$new = $newActivity->fetch_array();

//}

function	raise_price($price)	{
	//this will be used to increase the price by a percentage, represented by a decimal value.
	//Change the value of $increase for a different increase!
	$increase = 0.20;
	$new_price = $price + $price * $increase;
	return number_format($new_price, 2);
	//It took me a while to find out how to force 2 decimal places and then where to put it in the code!
}
?>