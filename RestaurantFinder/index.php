<?php
	require 'searchrest.inc.php';
	require 'session.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=0.7">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
	<title>Find Your Restaurant</title>
	<style type="text/css">
		html {
			font-family: Verdana, Geneva, sans-serif;
			font-family: Quicksand;
			font-size: 19px;
		}
		body {
			background-color: #000;
			color:white;
		}
		#user-half {
			width: 48%;
			height: 96%;
			padding: 1%;
			position: absolute;
			background-color: #101010;
			top: 0;
			left: 0;
		}
		.btn{
			background-color: #E8E8E8;
			height: 44px;
			width: 12%;
			position: relative;
			border-width: 0;
			outline: none;
			color: #000;
			font-family: Quicksand;
			font-size: 14px;
			font-weight: bold;
		}
		.btn:hover,.btn:focus {
			background-color: #C0C0C0;
			cursor: pointer;
		}
		.logout {
			left: 40em;
			top: -4em;
		}
		#bookings {
			/*background-color: rgba(73, 240, 5, 0.5);*/
			background-color: #2C9B00;
			width: 80%;
			position: relative;
			left: 8%;
			height: auto;
			padding: 1%;
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
		<button class="btn logout" onclick=" window.location.href='logout.php';"><label>Log Out</label></button>
		<div id="bookings">
			<p>Your Upcoming Bookings:</p>
		</div>
	</div>

		<!-- <script>
			window.onload = function() {
			var PlaceholderIntervalVar = setInterval(function() {
				var placeholderTimeoutVar = setTimeout(function() {
					document.getElementById("search-bar").placeholder = "Search Restaurant Name";
				}, 1000)
				var placeholderTimeoutVar = setTimeout( function(){
					document.getElementById("search-bar").placeholder = "Search Restaurant Area";
				}, 3000)
			}, 6000);
		}
		modalCloseBtn.onclick = function() {
			modal.style.display = "none";
			// show = false;
		}
		</script> -->
</body>
</html>