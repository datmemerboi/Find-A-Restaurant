<?php
	require '../inc/justsearchrest.inc.php';
	require '../inc/justsearcharea.inc.php';
	require '../inc/justbook.inc.php';
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
			scroll-behavior: smooth;
		}
		.search_half{
			width: 100%;
			height: 45%;
			position: fixed;
			top: 0px;
			left: 0px;
			background-color: rgba(0,0,0,0.8);
			overflow: auto;
		}
		.search_bar{
			font-family: Quicksand;
			font-weight: bold;
			width: 500px;
			height: 25px;
			position: relative;
			top: 17px;
			left: 32%;
			background-color: rgba(240,230,220,0.8);
			resize: none;
			padding: 14px;
			outline: 0px;
			border-width: 0px;
			padding: 2%;
		}
		.user_profile_half{
			width: 100%;
			height: 45%;
			position: fixed;
			top: 50%;
			left: 0%;
			background-color: #CCD1D1;
			padding: 1%;
			overflow: auto;
		}
		.btn{
			background-color: #E8E8E8;
			height: 16%;
			width: 10%;
			position: relative;
			border-width: 0;
			outline: none;
			box-shadow: 5px 8px 15px #000000;
		}
		.btn:hover,
		.btn:focus {
		background-color: #C0C0C0;
		cursor: pointer;
		}
		.search{
			position: absolute;
			left: 45%;
			top: 37%;
		}
		@-webkit-keyframes openModel {
			from { opacity: 0; }
			to { opacity: 1; }
		}
		@-webkit-keyframes openMovement {
			from { position:relative; top:-20%; }
			to{ position:relative; top:0%; }
		}
		@-webkit-keyframes closeMovement {
			from { position:relative; top:0%;  }
			to { position:relative; top:-20%;  }
		}
		.modal_bg{
			display: hidden;
			position: fixed;
			z-index: 1;
			padding-top: 100px;
			left: 0;
			top:0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: rgba(0,0,0,0.7);
			animation: openModel 1s;
		}
		.modal_box{
			background-color: #f0f0f0;
			display: block;
			margin:auto;
			padding:20px;
			text-align: center;
			width: 80%;
			outline: 0px;
			border-radius: 70px;
			animation: openMovement 1s;
		}
		#booking_check_result{
			background-color: #0FAFBC;
			width: 560px;
			position: relative;
			top: 40px;
			left: 7%;
			padding: 2%;
			display: block;
		}
		.logout{
			display: inline-block;
			position: absolute;
			top: 100px;
			left: 60%;
		}
		.track_order {
			background-color: #0FAFBC;
			display: inline-block;
			width: 250px;
			position: absolute;
			top: 100px;
			left: 77%;
		}
		.track_order:hover, .track_order:focus {
			transform: scale(1.1, 1.1);
			background-color: #5FD6EE;
		}
		label{
			color: #000000;
			font-family: Quicksand;
			font-size: 16px;
			font-weight: bold;
		}
		input[type=submit]{
			font-family: Quicksand;
			font-size: 16px;
			font-weight: bold;
		}
		a {
			color: #1A5276;
		}
	</style>
</head>
<body>
	<div class="search_half">
		<div class="search_div">
			<form action="" method="POST">
				<input type="text" class="search_bar" placeholder="Search" name="search" onmouseover=" this.style = 'transform: scale(1.1,1.1)'; " onmouseout=" this.style='transform: scale(1,1)'; "><br>
				<input type="submit" name="search_btn" id="submi_btn" value="Search" class="search btn">
			</form>
		</div>
	</div>

	<div class="user_profile_half">
		<label for="User_Profile" class="label" style="font-size: 18px;">User Profile</label><br>
		<div class="user_profile_name">
			<label>Hello, </label>
			<?php 
				if(isset($_SESSION['name']))
				{
					print_r( $_SESSION['name'] );
				}
			?>
			<label> !</label>
		</div>
		<div  id="booking_check_result">
			<label style="font-size: 18px;">Your current bookings:</label><br>
			<?php
				booked($conn);
			?>
		</div>
		<input type="submit" id="logout_btn" class="logout btn" value='Logout' onclick=" window.location.href='justlogout.php';"> <button id="track_order_btn" class="btn track_order" onclick="redirect_track()"><label>TRACK YOUR ORDER</label></button>		
	</div>
	<div class="modal_bg" id='moDal'>
		<div class="modal_box" id='modal_box'>
			<?php
				searchrest($conn);
				print_r("<br>");
				searcharea($conn);
			?>
		</div>
	</div>

	<script type="text/javascript">
		var modal = document.getElementById('moDal');
		var modalBtn = document.getElementById('submi_btn');	
		var logout = document.getElementById('logout_btn');
		var messages = document.getElementById('modal_box');

		modalBtn.onclick = function() {
			modal.style.display = "block";
		}

		window.onclick = function(event){
			if(event.target == modal){
				document.getElementById('modal_box').WebkitAnimation="closeMovement 1s";
				modal.style.display = "none";
			}
		}
		function redirect_track() {
			window.location.href='justtrack.php';
		}
	</script>
</body>
</html>