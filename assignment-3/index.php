<?php
//Create a nested array of images
$images = [
	["title" => "Overlapping Rocks", "pic-url" => "images/rocks.jpg", "size" => "12"],
	["title" => "Very Green Plant", "pic-url" => "images/plant.jpg", "size" => "8"],
	["title" => "Doris and Lloyd", "pic-url" => "images/lwbdjb.jpg", "size" => "6"],
	["title" => "Bears Ears", "pic-url" => "images/ears.jpg", "size" => "7"],
	["title" => "Reddish Burl", "pic-url" => "images/burl.jpg", "size" => "11"],	
];

include("sort-me.php");

$show = "all";
if (isset($_REQUEST["show"])) {
	$show = $_REQUEST["show"];
}

include("engine.php");

?>