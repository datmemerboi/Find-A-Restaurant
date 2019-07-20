<?php 
	require '../inc/justconnect.inc.php';
	require '../inc/justsession.inc.php';

	$sql1 = "SELECT `orderid` FROM `placement` WHERE `username`='".$_SESSION['username']."'";
	$runsql1 = mysqli_query($conn, $sql1);
	$row00 = mysqli_fetch_array($runsql1);
	$OrderId = $row00['orderid'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Track Order</title>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
	<style type="text/css">
		html{
			font-family: Quicksand;
			font-size: 15px;
		}
		@-webkit-keyframes orderedAnim {
			from { left:0%; background-color: #FAFAFA;border:solid 1px; }
			to { left:13%; background-color: #45B39D;border:solid 10px; }
		}
		@-webkit-keyframes preparationAnim {
			from { left: 0%;background-color: #FAFAFA;border:solid 1px; }
			to { left: 38%;background-color: #F0F4C3;border:solid 10px; }
		}
		@-webkit-keyframes otwAnim {
			from { left: 0%;background-color: #FAFAFA;border:solid 1px; }
			to { left: 63.5%;background-color: #FB8C00;border:solid 10px; }
		}
		@-webkit-keyframes deliveredAnim {
			from { left: 0%;background-color: #FAFAFA;border:solid 1px; }
			to { left: 89%;background-color: #E64A19;border:solid 10px; }
		}
		.dot {
			height: 65px;
			width: 65px;
			border-radius: 50%;
			display: inline-block;
			position: relative;
			top: -25px;
			animation: infinite;
			animation-duration: 4s;
			opacity: 0.8;
		}
		@-webkit-keyframes makeVisible {
			from { opacity:0;top: 0% }
			to { opacity:0.9;top: 27% }
		}
		p {
			position: relative;
			top: 15px;
		}
		.bar {
			width: 100%;
			background-color: #f0f0f0;
			height: 25px;
			position: relative;
			top: 27px;
		}
		.wordstatus {
			width: 180px;
			height: 100px;
			background-color: #90A4AE;
			display: inline-block;
			position: absolute;
			top: 27%;
			animation: infinite;
			animation-duration: 4s;
			border: solid;
			border-width: 5px;
			border-radius: 15px 15px;
			border-color: rgba(90, 240, 29, 0.5);
			opacity: 0.6;
		}
		.wordstatus:after {
	      content: "";
	      position: absolute;
	      right: 45%;
	      top: -25px;
	      width: 0;
	      height: 0;
	      border-left: 12px solid transparent;
	      border-bottom: 26px solid #90A4AE; 
	      border-right: 12px solid transparent;
	    }
		.ordered {
			left: 10%;
		}
		.preparing {
			left: 35%;
		}
		.otw {
			left: 60%;
		}
		.delivered {
			left: 86%;
		}
		label {
			font-weight: bold;
		}
		label.labelThis {
			position: relative;
			top: 2.5em;
			left: 27%;
		}
	</style>
</head>
<body>
	Order ID: <label><?php if(isset($OrderId)){echo $OrderId;} ?></label>
	<div class="bar">
		<div class="dot" id="dotts">
			<p><label style=" position:relative; top: -17px; left: 18%; ">Your<br>Order</label></p>
		</div>
	</div>
	<div class="wordstatus ordered" id="orderedID"><label class="labelThis">Ordered</label></div>
	<div class="wordstatus preparing" id="preparingID"><label class="labelThis">Preparing</label></div>
	<div class="wordstatus otw" id="otwID"><label class="labelThis">On the way</label></div>
	<div class="wordstatus delivered" id="deliveredID"><label class="labelThis">Delivered</label></div>
</body>
</html>
<?php
	$sql2 = "SELECT `status` FROM `placement` WHERE `orderid`='".$OrderId."'";
	$runsql2 = mysqli_query($conn, $sql2);
	if($runsql2)
	{
		$row = (mysqli_fetch_assoc($runsql2));
		if($row['status']=='P')
		{
			?>
			<script type="text/javascript">
				document.getElementById('dotts').style.animationName = "preparationAnim";
				document.getElementById('preparingID').style.animationName = "makeVisible";
			</script>
			<?
		}
		if($row['status']=='D')
		{
			?>
			<script type="text/javascript">
				document.getElementById('dotts').style.animationName = "deliveredAnim";
				document.getElementById('deliveredID').style.animationName = "makeVisible";
			</script>
			<?
		}
		if($row['status']=='T')
		{
			?>
			<script type="text/javascript">
				document.getElementById('dotts').style.animationName = "otwAnim";
				document.getElementById('otwID').style.animationName = "makeVisible";
			</script>
			<?
		}
		else
		{
			?>
			<script type="text/javascript">
				document.getElementById('dotts').style.animationName = "orderedAnim";
				document.getElementById('orderedID').style.animationName = "makeVisible";
			</script>
			<?
		}
	}
?>
