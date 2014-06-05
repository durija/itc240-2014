<?php
//get password for database connection
include("passwords.php");
//connect to database
$mysql = new mysqli("localhost", "bbaile02", $mysql_password, "bbaile02");

$option = "title";//sets default option
//if you already havve an option cookie use it
if (isset($_COOKIE["option"]))	{
		$option = $_COOKIE["option"];
}
//if you specify an option in the url, use it instead
if (isset($_REQUEST["option"]))	{
	$option = $_REQUEST["option"];
	setcookie("option", $option, time() + 60 * 5, "/");
}
$optionWhitelist = ["title" => true, "author" => true];
	//if $option isn't set, title is the default option
if (!isset($optionWhitelist[$option]))	{
	$option = "title";
}
$libraryQuery = $mysql->prepare("SELECT * FROM library ORDER BY $option DESC;");
$libraryQuery->execute();
$libraries = $libraryQuery->get_result();

$background = "dark";//default option for background
if (isset($_COOKIE["background"]))	{
		$background = $_COOKIE["background"];
}

setcookie("background", $background, time() + 60 * 5, "/");

?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width"/>
		<title>BrianBailey-itc240-assignment-7</title>
		<link rel="stylesheet" href="css/styles.css"/>
    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	</head>
	<body>
  	<div>
      <h1>Brian Bailey, Assignment 7</h1>
      <h2>Small Sample of Earthquake Information Resources</h2>
      <p>Prefered Environment: <a href="#">Light</a> or <a href="#">Dark</a>
      <p>Preferred Viewing: <a href="#">Cover</a> or <a href="#">Listing</a>
      <table class="<?= htmlentities($background) ?>">
        <thead>
          <tr>
            <th><a href="?option=title">Sort by Title</a>
            <th><a href="?option=author">Sort by Author</a>
            <th>Cover Art
        <tbody>
<?php
foreach ($libraries as $media)	{ ?>
          <tr>
            <td><?= htmlentities($media["title"]) ?>
            <td><?= htmlentities($media["author"]) ?>
            <td><img src="<?= htmlentities($media["cover"]) ?>"/>
<?php	
}
?>
    	</table>
      <form action="index.php" method="POST">
    		<input type="submit" value="Checkout" class="button">
      </form>
    </div>
	</body>
</html>