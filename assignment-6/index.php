<?php
//get password for database connection
include("passwords.php");
//connect to database
$mysql = new mysqli("localhost", "bbaile02", $mysql_password, "bbaile02");
?>
<!doctype html>
<html>
  <head>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width"/>
		<title>BrianBailey-itc240-assignment-6</title>
		<link rel="stylesheet" href="css/styles.css"/>
    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
  	<h1>Brian Bailey&apos;s ITC240 A6</h1>
  	<h2>Cat Activity Tracker</h2>
			<table>
        <tr>
          <th colspan="2">Activity Type</th>
          <th>Calories Expended</th>
          <th>Activity Date</th>
        </tr>
    
<?php
//use single quotes for protection
$select = 'SELECT activity_type, calories_expended, activity_date FROM cat_tracker ORDER BY activity_date DESC;';

//prepare the string as a query
$prepared = $mysql->prepare($select);
//bind - nothing to bind
//execute the select query
$prepared->execute();
//get rows of the table
$activities = $prepared->get_result();

//loop through the rows to fill the table 
foreach ($activities as $activity) {
?>
        <tr> 
          <td colspan="2"><?= htmlentities($activity["activity_type"]) ?></td>
          <td><?= htmlentities($activity["calories_expended"]) ?></td>     	
          <td><?= htmlentities($activity["activity_date"]) ?></td>   
        </tr>
<?php
}
?>
			</table>

<?php
$sumQuery = $mysql->prepare('SELECT SUM(calories_expended) AS sum FROM cat_tracker;');
//don't need to bind, no parameters
//execute the query statement
$sumQuery->execute();
//get the result of the query statement exectution
$sumResult = $sumQuery->get_result();
//avoid looping by using fetch_array
$sum = $sumResult->fetch_array();
?>
    <!-- display total calories expended -->
    <!-- I'm pretty sure I don't need htmlentities here, but it can't hurt -->
    <p>Total Calories Expended to Date: <?= htmlentities($sum["sum"]) ?></p>
    
<?php
$maxQuery = $mysql->prepare('SELECT MAX(calories_expended) AS max FROM cat_tracker;');
//don't need to bind, no parameters
//execute the query statement
$maxQuery->execute();
//get the result of the query statement exectution
$maxResult = $maxQuery->get_result();
//avoid looping by using fetch_array
$max = $maxResult->fetch_array();
?>    
    <!-- display maximum calories expended in a single activity -->
    <!-- I'm less sure about htmlentities here. If MAX can come from a type of string, it DOES seem advisable. -->
    <p>Maximum Calories Expended in a Single Activity: <?= htmlentities($max["max"]) ?></p>  
    
		<h2>Add New Entry &darr;</h2>
    <form action="edit.php" method="POST" >
    	Enter Activity Type:
      <input name="activity_type" placeholder="enter activity"><br>
      Enter Calories Expended:
      <input name="calories_expended" placeholder="enter calories"><br>
      <input type="submit" value="Submit New Entry" class="button"><br>
		</form>
   
  </body>
</html>