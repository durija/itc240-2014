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
	<title>BrianBailey-itc240-assignment-5</title>
	<link rel="stylesheet" href="css/styles.css"/>
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
  </head>
  <body>
    <h2>Table of Expenses</h2>    
        <table>
            <tr>
                <th>Item Cost</th>
                <th>Item Description</th>
                <th>Transaction Location</th>
                <th>Transaction Date</th> 
            </tr>
<?php
//use single quotes for protection
$select = 'SELECT item_cost, item_description, transaction_location, transaction_date FROM expenses ORDER BY transaction_date;';

//prepare the string as a query
$prepared = $mysql->prepare($select);
//bind - nothing to bind
//send query to be executed
$prepared->execute();
//get rows of the table
$expenses = $prepared->get_result();
//loop through the rows to fill the table 
foreach ($expenses as $expense) {
?>
            <tr> 
                <td>$<?= $expense["item_cost"] ?></td>
                <td><?= $expense["item_description"] ?></td>     	
                <td><?= $expense["transaction_location"] ?></td>
                <td><?= $expense["transaction_date"] ?></td>      
            </tr>
<?php
}
      ?>
</table>
<h2><a href="insert.php">Insert New Transactions</a></h2>
<h2><a href="month.php">View a month</a></h2>
  </body>
</html>