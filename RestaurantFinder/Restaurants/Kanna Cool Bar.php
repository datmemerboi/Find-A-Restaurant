<?php
require '../restaurantpage.php';
$sql1 = "SELECT * FROM `joints` WHERE `name` LIKE '%Kanna Cool Bar%'";
$run_sql1 = mysqli_query($conn,$sql1);
$_SESSION['JOINT'] = mysqli_fetch_assoc(mysqli_query($conn,$sql1));

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php print_r($_SESSION['JOINT']['name']) ?></title>
	<style type="text/css">
		#name_of_rest{
			font-family: Arial;
			font-weight: 900;
			font-size: 40px;
			text-align: center;
		}
		p{
			font-family: Arial;
			font-weight: 600;
			font-size: 20px;
			text-align: center;
		}
		.rest_deets{
			opacity: 1;
			/*position: absolute;
			top: 0;*/
			max-width: 100vw;
		}
	</style>
</head>
<body>
	<div class="rest_deets">
		<p id="name_of_rest"><?php print_r($_SESSION['JOINT']['name']) ?></p>
		<div><p><?php print_r($_SESSION['JOINT']['address']); ?></p></div>
		<div><p><?php
			if(isset($_SESSION['JOINT']['contact']))
			{
				print_r($_SESSION['JOINT']['contact']);
			}
			else
				print_r("<i>No contacts provided yet</i>");
			?></p>
		</div><br>
	</div>
</body>
</html>