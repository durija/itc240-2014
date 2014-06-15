<?php
include ("bus.php");

$speedingBus = new Bus();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width"/>
    <title>BrianBailey-itc240-assignment-9</title>
    <link rel="stylesheet" href="css/styles.css"/>
    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    </head>
	<body>
  	<h1>Brian Bailey &mdash; ITC 240, A9</h1>
    <p>Initial speed is <?= $speedingBus->getSpeed(); ?> mph</p>
    <p>Armed condition is <?= $speedingBus->getArmed(); ?></p>
    <p>Exploded condition is <?= $speedingBus->getExploded(); ?></p><br>

<?php
$speedingBus->setSpeed(55);
$speedingBus->setExploded(55);
?>
    <p>Speed has changed from 20 mph to <?= $speedingBus->getSpeed(); ?> mph</p>
    <p>Armed condition is <?= $speedingBus->getArmed(); ?></p>
    <p>Exploded condition is <?= $speedingBus->getExploded(); ?></p><br>

<?php
$speedingBus->setSpeed(80);
$speedingBus->setExploded(80);
?>
    <p>Speed has wildly increased to <?= $speedingBus->getSpeed(); ?> mph</p>
    <p>Armed condition is <?= $speedingBus->getArmed(); ?></p>
    <p>Exploded condition is <?= $speedingBus->getExploded(); ?></p><br>

<?php
$speedingBus->setSpeed(30);
$speedingBus->setExploded(30);
?>
    <p>Speed inexplicably dropped to <?= $speedingBus->getSpeed(); ?> mph</p>
    <p>Armed condition is <?= $speedingBus->getArmed(); ?></p>
    <p>Exploded condition is <?= $speedingBus->getExploded(); ?></p><br>

<?php
$speedingBus->clearExploded();	
?>
		<p>Rewrite engaged. Exploded condition is <?= $speedingBus->getExploded(); ?></p>

<?php
$speedingBus->trigger();	
?>
		<p>Explosion triggered. Exploded condition is <?= $speedingBus->getExploded(); ?></p>
  
	</body>
</html>