<?php
//For security, password is hidden in an include
include("../passwords.php");

//Enable connection to the MySQL server and database
// Parameters: server, username, password, database
$mysql = new mysqli("localhost", "bbaile02", $mysql_password, "bbaile02");

//SELECT statement. This is only safe because all input has been created by me. Nothing is from outside.
$result = $mysql->query('SELECT * FROM myphotos ORDER BY year ASC, size DESC;');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width"/>
	<title>BrianBailey-itc240-assignment-4</title>
	<link rel="stylesheet" href="css/styles.css"/>
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
<div class="content">
	<h1>Photos From a Tiny Database &#10549;</h1>
<table>
	<tr>
    	<th>Item ID</th>
        <th>Year</th>
        <th>Title</th>
        <th>Location</th> 
        <th>File Size</th> 
    </tr>
<?php
//Foreach loop to run through the database according to the SELECT statement
//Thomas used $row here. $col makes more sense to me. It doesn't really matter but I want to ask about it
foreach ($result as $col) {
?>
<!--Thomas used $row here. $col makes more sense to me. It doesn't really matter but I want to ask about it-->
    <tr class="mid"> 
    	<td><?= $col["id"] ?></td>
    	<td><?= $col["year"] ?></td>     	
        <td><?= $col["title"] ?></td>
        <td><?= $col["location"] ?></td>
        <td><?= $col["size"] ?> KB</td>          
    </tr>
    <tr>  
    	<td class="last" colspan="5"><img src="<?= $col["picUrl"] ?>"/></td> 
    </tr>

<?php
}
?>
</table>
</div>
</body>
</html>
