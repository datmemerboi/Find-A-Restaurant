<?
require '../inc/justsession.inc.php';
require '../inc/justconnect.inc.php';
if(isset($_SESSION['username']))
{
	$sql1 = "SELECT * FROM `members` WHERE `username`='".$_SESSION['username']."'";
	$runsql1 = mysqli_query($conn, $sql1);
	if($runsql1)
	{
		$_SESSION=mysqli_fetch_assoc($runsql1);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
	<style type="text/css">
		html {
			font-family: Quicksand;
			font-size: 28px;
		}
		.nav {
			position: absolute;
			top: 0;
			left: 0;
			width: 20%;
			height: 100%;
			background-color: rgba(73, 240, 5, 0.7);
			display: inline;
			padding-top: 3em;
		}
		.deets {
			position: absolute;
			top: 0;
			left: 20%;
			display: inline;
			width: 80%;
			height: 111.25%;
			background-color: rgba(0,0,0,0.8);
			color: #fff;
		}
		.contain_deets {
			position: absolute;
			top: 6em;
			left: 10%;
		}
		.nav_btn {
			font-family: Quicksand;
			font-size: 23px;
			position: relative;
			height: 4em;
			width: 100%;
			border: none;
			margin: none;
			background-color: transparent;
		}
		.nav_btn:hover {
			background-color: #199E0E;
		}
		.inputBox {
			margin: none;
			border: none;
			width: 23em;
			height: 3em;
			padding: 2%;
			font-family: Quicksand;
			font-size: 18px;
		}
		.btns {
			border: none;
			margin: none;
			background-color: #f0faf0;
			height: 3em;
			width: 13em;
			font-family: Quicksand;
			font-size: 18px;
		}
		#changePwd {
			display: none;
		}
		#changeContact {
			display: none;
		}
		#changeAddress {
			display: none;
		}
		#changeEmail {
			display: none;
		}
	</style>
</head>
<body>
	<div class="nav">
		<button class="nav_btn" onclick="closeAll(); document.getElementById('changePwd').style.display='block';" ondblclick="closeAll(); document.getElementById('contain_deets').style.display='block';">Change Password</button><br><br>
		<button class="nav_btn" onclick="closeAll(); document.getElementById('changeContact').style.display='block'; " ondblclick="closeAll(); document.getElementById('contain_deets').style.display='block';">Change Phone Number</button><br><br>
		<button class="nav_btn" onclick="closeAll(); document.getElementById('changeAddress').style.display='block'; " ondblclick="closeAll(); document.getElementById('contain_deets').style.display='block';">Change Address</button><br><br>
		<button class="nav_btn" onclick="closeAll(); document.getElementById('changeEmail').style.display='block'; " ondblclick="closeAll(); document.getElementById('contain_deets').style.display='block';">Change Email ID</button>
	</div>
	<div class="deets">
		<div class="contain_deets" id="contain_deets">
			<?php if(isset($_SESSION['username']))
			{
				echo "Hello there <b>".$_SESSION['name']."</b> !!";
				echo "<br>".$_SESSION['contact']."<br>";
				echo "<br>".$_SESSION['address']."<br>";
				echo "<br>".$_SESSION['email']."<br>";
			} ?>
		</div>
		<div class="contain_deets" id="changePwd">
			<input type="text" name="ChangePwd" class="inputBox" placeholder="Enter New Password">
			<br><br><input type="submit" value="Change Password" class="btns">
		</div>
		<div class="contain_deets" id="changeContact">
			<input type="text" name="ChangeContact" class="inputBox" placeholder="Enter New Phone Number">
			<br><br><input type="submit" value="Change Number" class="btns">
		</div>
		<div class="contain_deets" id="changeAddress">
			<input type="text" name="ChangeAddress" class="inputBox" placeholder="Enter New Address">
			<br><br><input type="text" name="ChangeArea" class="inputBox" placeholder="Enter Area">
			<br><br><input type="submit" value="Change Address" class="btns">
		</div>
		<div class="contain_deets" id="changeEmail">
			<input type="text" name="ChangeEmail" class="inputBox" placeholder="Enter New Mail ID">
			<br><br><input type="submit" value="Change Mail ID" class="btns">
		</div>
	</div>
</body>
<script type="text/javascript">
	function closeAll()
	{
		document.getElementById('contain_deets').style.display = 'none';
		document.getElementById('changePwd').style.display='none';
		document.getElementById('changeContact').style.display='none';
		document.getElementById('changeAddress').style.display='none';
		document.getElementById('changeEmail').style.display='none';
	}
</script>
</html>