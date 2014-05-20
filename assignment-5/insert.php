<!doctype html>
<html>
  <head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width"/>
	<title>BrianBailey-itc240-assignment-5</title>
	<link rel="stylesheet" href="css/styles.css"/>
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
  </head>
  <body>
	<h2>Expenses Table Update Form</h2>

    <form action="insert.php" method="POST"><!--form is submitting to itself-->
    	Enter item cost:<br>
        $
      <input name="item_cost" type ="text" size="12" placeholder="Item Cost"><br><br>  
      	Enter item description:<br>
      <input name="item_description" size="40" placeholder="Item Description"><br><br>  
      	Enter transaction location:<br>
      <input name="transaction_location" size="40" placeholder="Transaction Location"><br><br>       
      <input type="submit" value="Submit">    
    </form>
<?php

//get password for database connection
include("passwords.php");

//connect to database
$mysql = new mysqli("localhost", "bbaile02", $mysql_password, "bbaile02");

//$result = $mysql->query('SELECT * from expenses');
//print_r($result);

//only act on post
if ($_SERVER["REQUEST_METHOD"] == "POST")  {
//prepare query
  $query = 'INSERT INTO expenses (item_cost, item_description, transaction_location, transaction_date) VALUES (?, ?, ?, now());';
  $prepared = $mysql->prepare($query);
  $prepared->bind_param('dss', $_REQUEST['item_cost'], $_REQUEST['item_description'], $_REQUEST['transaction_location']);
  $prepared->execute();
//}
}
?>
	<h2><a href="index.php">View Table of Expenses</a></h2>
  </body>
</html>