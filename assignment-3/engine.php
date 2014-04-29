<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/styles.css"/>
</head>
	<body>
		<h1>About those images</h1>
        <ul>
			<li><a href="?show=size">Show Sizes Only</a></li>
			<li><a href="?show=image">Show Images Only</a></li>
            <li><a href="?show=title">Show Titles Only</a></li>
        	<li><a href="?show=all">Show Me Everything</a></li>
        </ul>
        
        <p>Refresh the page to shuffle the array.</p>
        
		<ul>      
<?php
	
foreach ($images as $image) {
	
	if ($show == "size") {
		include("size.php");
	} else if ($show == "image") {
		include("pic.php");
	} else if ($show == "title") {
		include("title.php");
	} else	{
		include("everything.php");
	} 
}

?>
</ul>
	</body>
</html>