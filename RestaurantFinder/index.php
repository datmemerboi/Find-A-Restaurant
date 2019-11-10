<?php
	require 'searchrest.inc.php';
	require 'searcharea.inc.php';
	require 'session.inc.php';
	require 'booktable.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Find Your Restaurant</title>
	<style type="text/css">
		html {
			font-family: Verdana, Geneva, sans-serif;
			/*font-family: Quicksand;*/
			font-size: 19px;
		}
		body {
			background-color: #000;
			color:white;
			max-width: 100vw;
		}
		#user-half {
			width: 48%;
			height: 100vh;
			padding: 1%;
			position: absolute;
			top: 0;
			left: 0;
			background-color: #101010;
		}
		.btn{
			background-color: #E8E8E8;
			height: 7vmin;
			width: 12vmin;
			position: relative;
			border-width: 0;
			outline: none;
			color: #000;
			/*font-family: Quicksand;*/
			font-family: Verdana, Geneva, sans-serif;
			font-size: 14px;
			font-weight: bold;
		}
		.btn:hover,.btn:focus {
			background-color: #C0C0C0;
			cursor: pointer;
		}
		.logoutBtn {
			position: relative;
			left: 40vw;
			top: -7vh;
		}
		#bookings {
			/*background-color: rgba(73, 240, 5, 0.5);*/
			background-color: #2C9B00;
			width: 36vw;
			position: relative;
			left: 8vmin;
			height: auto;
			padding: 1%;
			padding-left: 4%;
		}
		#search-half{
			width: 48%;
			height: 100vh;
			padding: 1%;
			position: absolute;
			top: 0;
			left: 50%;
		}
		#search-bar {
			/*background-color: #2C9B00;*/
			background-color: #F0F0F0;
			width: 38vw;
			position: relative;
			left: 2vw;
			top: 17vh;
			height: auto;
			padding: 2%;
			border: none;
			outline: none;
			color: black;
			font-size: 20px;
		}
		.searchBtn {
			width: 10vmin;
			position: relative;
			top: 16.7vh;
			left: -3.5vw;
			/*background-color: orange;*/
		}
		#search-result {
			width: 38vw;
			height: auto;
			padding: 2%;
			position: relative;
			top: 30vmin;
			left: 2vw;
			background-color: #101010;
			border: none;
			outline: none;
			align-content: center;
			text-align: center;
			/*display: none;*/
		}
		a {
			color: #005DFF;
		}
		p{
			user-select: none;
		}
	</style>
</head>
<body>
	<div id="user-half">
		<p>
			Hello, <b><?php 
				if(isset($_SESSION['name']) ){ 
					print_r($_SESSION['name']);
				}
			?> </b>!
		</p>
		<button class="btn logoutBtn" onclick=" window.location.href='logout.php';"><label>Log Out</label></button>
		<div id="bookings">
			<p>Your Upcoming Bookings:</p>
			<?php booked($conn); ?>
		</div>
	</div>
	<div id="search-half">
		<form action="" method="POST">
			<input type="text" id="search-bar" name="search-bar" placeholder="Search">
			<button class="btn searchBtn"><i class="fa fa-search"></i></button>
		</form>
		<div id="search-result">
			<?php searchrest($conn);
			searcharea($conn); ?>
		</div>
	</div>

		<script>
		window.onload = function() {
		var PlaceholderIntervalVar = setInterval(function() {
			var placeholderTimeoutVar = setTimeout(function() {
				document.getElementById("search-bar").placeholder ="Search Restaurant Name";
			}, 1000)
			var placeholderTimeoutVar = setTimeout( function(){
				document.getElementById("search-bar").placeholder = "Search Restaurant Area";
			}, 4000)
		},6000);
		}
		</script>
</body>
</html>