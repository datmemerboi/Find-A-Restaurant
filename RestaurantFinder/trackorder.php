<?php 
	require 'connect.inc.php';
	require 'session.inc.php';

	$sql1 = "SELECT * FROM `orders` WHERE `username`='".$_SESSION['username']."'";
	$row00 = mysqli_fetch_assoc( mysqli_query($conn, $sql1) );
	print_r($row00);

	$sql2 = "SELECT `name` FROM `joints` WHERE `id`= '".$row00['jointid']."'";
	// print_r($sql2);
	$row01 = mysqli_fetch_assoc( mysqli_query($conn, $sql2) );
?>
<!DOCTYPE html>
<html>
<head>
	<title>Track Your Order</title>
	<style type="text/css">
		html {
			font-family: Arial;
			font-size: 24px;
			background-color: #000;
			color: #FFF;
		}
		#progress-bar {
			max-width: 98.7vw;
			width: 98.7vw;
			background-color: #F4F4F4;
			height: 2vh;
			position: absolute;
			top: 20vh;
			border-radius: 20px;
		}
		#progress {
			background-color: #E40;
			position: relative;
			max-width: 98.7vw;
			height: 2vh;
		}
	</style>
</head>
<body>
	<div id="details">
		Order ID: <b><?php print_r($row00['orderid']); ?></b>
		<br>
		Restaurant Name: <b><?php print_r($row01['name']); ?></b>
		<br>
		Order: <b><?php print_r($row00['items']); ?></b>
	</div>
	<div id="progress-bar">
		<div id="progress"></div>
	</div>
</body>
<script type="text/javascript">
	var status = <?php  print_r($row00['status']); ?>
	console.log(status);
	document.getElementById('progress').innerText = status;
</script>
</html>