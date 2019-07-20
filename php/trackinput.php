<?
require '../inc/justconnect.inc.php';
if(isset($_POST['TrackOrderId']) && isset($_POST['TrackOrderStatus']) && !empty($_POST['TrackOrderId']))
{
	$TrackOrderId = $_POST['TrackOrderId'];
	$TrackOrderStatus = $_POST['TrackOrderStatus'];

	$sql1 = "UPDATE `placement` SET `status` = '$TrackOrderStatus' WHERE `orderid` = '$TrackOrderId'";
	$runsql1 = mysqli_query($conn,$sql1);
	if($runsql1)
	{
		?>
		<script type="text/javascript">
			alert("Status Updated");
		</script>
		<?
	}
	else
	{
		?>
		<script type="text/javascript">
			alert("Something went wrong");
		</script>
		<?
		print_r($sql1);
		print_r($runsql1);
	}
}
if(isset($_POST['Track_order_submit']) && empty($_POST['TrackOrderId']) )
{
	echo "<script> alert('Enter details properly'); </script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Track Input</title>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
	<style type="text/css">
		html {
			font-family: Quicksand;
		}
		.input_bar{
			font-family: Quicksand;
			font-weight: bold;
			width: 500px;
			height: 25px;
			background-color: rgba(240,230,220,1);
			resize: none;
			padding: 14px;
			outline: 0px;
			border-width: 0px;
			padding: 2%;
		}
		.btn{
			font-family: Quicksand;
			font-weight: bold;
			background-color: #E8E8E8;
			height: 50px;
			width: 150px;
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
		.option {
			width: 100px;
			height: 100px;
			border-radius: 50%;
			background-color: #FF7043;
			display: inline-block;
		}
		.icon {
			position: relative;
			top: 25%;
		}
	</style>
</head>
<body>
	<form action="" method="POST">
		<center>
		<input type="text" name="TrackOrderId" class="input_bar" placeholder="Enter Order ID"><br><br>
		<!-- <div class="option"><p class="icon">Preparation</p></div> <div class="option"><p class="icon">Delivery</p></div> <div class="option"><p class="icon">Recieved</p></div> -->
		<input type="text" name="TrackOrderStatus" maxlength="1" placeholder="P(Preparing) / T(On the way) / D(Delivered)" class="input_bar">
		<br><br>
		<input type="submit" name="Track_order_submit" value="Post Status" class="btn">
		</center>
	</form>
</body>
</html>