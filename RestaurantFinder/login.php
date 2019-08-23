<?php
	require 'connect.inc.php';
	require 'session.inc.php';
	if(isset($_POST['UserName']) && isset($_POST['Password']))
	{
		$username = htmlentities($_POST['UserName']);
		$password = htmlentities($_POST['Password']);

		$sql1 = "SELECT * FROM `members` WHERE `username`='".$username."' AND `password`='".$password."'";
		if($run_sql1 = mysqli_query($conn,$sql1))
		{
			$num_run_sql1 = mysqli_num_rows($run_sql1);
			if($num_run_sql1 == 0)
			{
				?><script type="text/javascript">
					alert("Wrong Credentials.");
					window.location.href='login.html';
				</script>
				<?php
			}
			else if ($num_run_sql1 == 1)
			{
				$row = mysqli_fetch_assoc($run_sql1);
				$_SESSION['username'] = $username;
				$_SESSION['name'] = $row['name'];
				?>
				<script type="text/javascript">
					window.location.href='index.php';
				</script>
				<?
			}
		}
	}
?>