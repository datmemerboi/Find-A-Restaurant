<?php
require 'session.inc.php';
require 'connect.inc.php';
require 'booktable.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
		body{
			background-color: #000;
			color: #FFF;
			font-family: Verdana, Geneva, sans-serif;
			font-size: 32px;
		}
		.choose {
			width: 80vw;
			max-width: 100vw;
			height: 30vh;
			align-self: center;
			/*background-color: #E40;*/
			position: absolute;
			left: 10vw;
			top: 35vh;
		}
		#whatsnew {
			background-color: #2C9B00;
		}
		.btn{
			background-color: #E8E8E8;
			height: 7vh;
			/*width: 25vw;*/
			position: relative;
			border-width: 0;
			outline: none;
			color: #000;
			font-family: Verdana, Geneva, sans-serif;
			font-size: 14px;
			font-weight: bold;
		}
		.bigbtn {
			width: 25vw;
		}
		.smallbtn {
			width: 10vw;
		}
		#placeOrderBtn {
			position: relative;
			left: 10vw;
		}
		#bookTableBtn {
			position: relative;
			left: 20vw;
		}
		#placeOrderDiv{
			display: none;
			/*background-color: #148F77;*/
			position: relative;
			top: 2vw;
			padding:1vw;
		}
		#bookTableDiv{
			display: none;
			/*background-color: #148F77;*/
			position: relative;
			top: 2vw;
			padding:1vw;
		}
		label {
			font-size: 20px;
			display: inline-block;
		}
		.box{
			position: relative;
			left: 1vw;
			width: 10vw;
			height: 1vw;
			background-color: #F2F3F4;
			border-width: 0;
			outline: none;
			padding: 1em;
			display: inline-block;
		}
		#submit-btn {
			position: relative;
			left: 30vw;
		}
		#submit-btn:hover {
			background-color: #234432;
		}
	</style>
</head>
<body>
	<div class="choose">
		<marquee id="whatsnew" scrollamount=10>What's New Here?</marquee>
		<button class="btn bigbtn" id="placeOrderBtn"
			onclick="bookTableDivClose(), placeOrderDivOpen()"
			ondblclick="placeOrderDivClose()" 
		>Place Order</button>
		<button class="btn bigbtn" id="bookTableBtn"
			onclick="placeOrderDivClose(),bookTableDivOpen()"
			ondblclick="bookTableDivClose()"
		>Book Table</button>
		<div id="placeOrderDiv">
			<form action="" method="POST">
				<h3>Order Placement goes here</h3>
			</form>
		</div>
		<div id="bookTableDiv">
			<form action="" method="POST">
				<label>Time of arrival (11:00 to 22:30)</label>
				<input type="time" min="11:00" max="22:30" name="takeaway_time" class="box"><br><br>
				<label>Number of members</label><input type="number" placeholder="chairs" name="chairs" class="box" min="0">
				<input type="submit" class="btn smallbtn" id="submit-btn" name="book_table_submit" value="Confirm Booking">
			</form>
		</div>
	</div>
	<div id="booked-or-not">
		<?php new_table_book($conn); ?>
	</div>
</body>
<script type="text/javascript">
	function placeOrderDivOpen() {
		document.getElementById('placeOrderDiv').style.display='block';
	}
	function placeOrderDivClose() {
		document.getElementById('placeOrderDiv').style.display='none';
	}
	function bookTableDivOpen() {
		document.getElementById('bookTableDiv').style.display='block';
	}
	function bookTableDivClose() {
		document.getElementById('bookTableDiv').style.display='none';
	}
</script>
</html>