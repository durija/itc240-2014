<?php
include("passwords.php");
include("functions.php");

activity_updater("put on kitty jet pack and fly", 5);//Change the activity_type and/or id to update the database
$cat_trackers = get_cat_tracker();

?>
<!doctype html>
<html>
  <head>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width"/>
		<title>BrianBailey-itc240-assignment-8</title>
		<link rel="stylesheet" href="css/styles.css"/>
    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
<!--I tried (for a very long time) to make the next part into a function in functions.php that I could call to output the new activity, but I never could get it to work, so I just stuck it on this page.-->
<?php
$activityQuery = $mysql->prepare('SELECT activity_type AS new from cat_tracker WHERE id = 5');
//no binding required
//execute the query statement
$activityQuery->execute();
//get the result of the query statement execution
$newActivity = $activityQuery->get_result();
//Use fetch_array, since we only need one item. No need to loop.
$new = $newActivity->fetch_array();
?>
	<h1>Brian Bailey &mdash; Assignment 8, Conjunction Function</h1>
  <h2>More Cat Nonsense</h2>
  <h3>New Cat Activity: <?= out($new["new"]) ?></h3>
  
  <h3>New Prices For Cat Entertainment</h3>
    <ul>
    	<!--Whatever prices are placed in the argument will be converted to a higher price according to the function-->
      <li>Mouse Squeaky Toy: $ <?= out(raise_price(6.79)) ?>
      <li>Ping Pong Balls (144pk): $ <?= out(raise_price(8.20)) ?> 
      <li>Laser Pointer: $ <?= out(raise_price(6.00)) ?> 
    </ul      
  </body>
</html>

  