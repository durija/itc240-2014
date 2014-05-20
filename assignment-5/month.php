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
	<title>Choose a Single Month to View</title>
	<link rel="stylesheet" href="css/styles.css"/>
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
  </head>
  <body>
	<h2>What Month Do You Want To See?</h2>
<form action="month.php" method="POST">
	<select name="myMonth">
    	<option value="">Select Month</option>
		<option value="1">January</option>
        <option value="2">February</option>
        <option value="3">March</option>
        <option value="4">April</option>
        <option value="5">May</option>
        <option value="6">June</option>
        <option value="7">July</option>
        <option value="8">August</option>
        <option value="9">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
    </select><br><br>
	<input type="submit" value="Submit">    
</form>
        <table>
            <tr>
                <th>Item Cost</th>
                <th>Item Description</th>
                <th>Transaction Location</th>
                <th>Transaction Date</th> 
            </tr>
<?php
$myMonth = '';
if ($_SERVER["REQUEST_METHOD"] == "POST")  {
$myMonth = $_POST['myMonth'];
}
echo $myMonth;//just to show variable comes from the form. I also tested (not shown) to make sure it is a number, and it is.

//use single quotes for protection
$select = "SELECT item_cost, item_description, transaction_location, transaction_date FROM expenses WHERE MONTH(transaction_date)='$myMonth';";
//This only worked when I used double quotes on the outside and single quotes around the variable. I don't see any way to just use single quotes here. I'm curious to know if I'm lacking security. I'm sure you'll tell me!!!

//prepare the string as a query
$prepared = $mysql->prepare($select);
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
<h2><a href="index.php">View Expenses Table</a></h2>
  </body>
</html>