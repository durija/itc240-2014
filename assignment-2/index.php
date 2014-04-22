<!doctype html>
<html>
<?php
//Set variables to null before form is posted
if (isset($_REQUEST["noun"])) {
$noun = htmlentities($_REQUEST["noun"]);
} else {
$noun = "";
}

if (isset($_REQUEST["verb"])) {
$verb = htmlentities($_REQUEST["verb"]);
} else {
$verb = "";
}

if (isset($_REQUEST["adj"])) {
$adj = htmlentities($_REQUEST["adj"]);
} else {
$adj = "";
}

if (isset($_REQUEST["num1"])) {
$num1 = htmlentities($_REQUEST["num1"]);
} else {
$num1 = "";
}

if (isset($_REQUEST["num2"])) {
$num2 = htmlentities($_REQUEST["num2"]);
} else {
$num2 = "";
}

$luckyNum = 4;
?>
	<head>
	<meta charset="UTF-8">
	<title>Assignment 2</title>
	</head>
	<body>
	<h1>Brian Bailey &mdash; ITC 240, Assignment 2</h1>
    <form method="POST">
    Please enter a noun:</label> <input type="text" name="noun" placeholder="noun"/><br>
    Then add a verb: <input type="text" name="verb" placeholder="verb"/><br>
    And then an adjective: <input type="text" name="adj" placeholder="adjective" /><br>
    Now enter a whole number from 1 to 9. It could be lucky: <input type="text" name="num1" placeholder="1" /><br>
    Now enter a whole number from 9 to 999: <input type="text" name="num2" placeholder="9" /><br>
    <input type="submit" value="Send"/><br>
    </form>
				<!--The Mad Lib-->
<?php
if ($noun != "" || $verb != "" || $adj != "")	{
?>	
	<p>
    A
<?= $noun; ?>
	sees a mountain and decides to 
<?= $verb; ?>
	. This made for a very 
<?= $adj; ?>
	situation.
	</p>
<?php
}
?>
					<!--First number conditionals-->
<?php
if ($num1 != "") 	{
//If $num1 is not null, write.
	if ($num1 == $luckyNum) {
	?>
		<p>You picked <?= $num1 ?>. It's the lucky number! You win a million dollars!</p>
	<?php
	} else if ($num1 <= 0){
	?>
		<p>You picked <?= $num1 ?>. That's not a valid number.</p>
	<?php
	} else if ($num1 >= 10){
	?>
		<p>You picked <?= $num1 ?>. That's not a valid number.</p>
	<?php
	} else if ($num1 != $luckyNum){
	?>
		<p>You picked <?= $num1 ?>. That's too bad. It's not so lucky.</p>
	<?php
	}
	}
	?>
				<!--Second number conditionals-->
<?php
if ($num2 != "") 	{
//If $num2 is not null, write.
	if ($num2 >= 495 && $num2 <= 999) {
	?>
		<p>You picked <?= $num2 ?>. You're thinking above average.</p>
	<?php
	} else if ($num2 < 495 && $num2 >=9){
	?>
		<p>You picked <?= $num2 ?>. You're thinking below average.</p>
	<?php
	} else if ($num2 < 9 || $num2 > 999){
	?>
		<p>You picked <?= $num2 ?>. That's not a valid number.</p>
	<?php
	} 
	}
	?>


</body>
</html>