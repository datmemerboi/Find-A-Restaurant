<?
require 'connect.inc.php';

if(isset($_POST['UserName']))
{
	$UserName = $_POST['UserName'];

	$sql1 = "SELECT * FROM `members` WHERE `username`='".$UserName."'";
	$run_sql1 = mysqli_query($conn, $sql1);

	if( (mysqli_num_rows($run_sql1) )>0 )
	{	
		?>
		<script type="text/javascript">
			alert('Username is taken. Choose different one.');
			window.location.href='newuser.html';
		</script>
		<?
	}
	else
	{
		$Name = $_POST['Name'];
		$UserName = $_POST['UserName'];
		$Password = $_POST['Password'];
		$Email = $_POST['Email'];
		$Contact = $_POST['Contact'];
		$Address = $_POST['Address'];
		$Area = $_POST['Area'];

		$sql2 = "INSERT INTO `members` (`username`,`password`,`name`,`contact`,`address`,`area`,`email`) VALUES ('$UserName', '$Password', '$Name', '$Contact', '$Address', '$Area', '$Email')";


		$run_sql2 = mysqli_query($conn, $sql2);
		if($run_sql2)
		{
			?>
			<script type="text/javascript">
				alert("New User created :)");
				window.location.href='login.html';
			</script>
			<?
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("Please try again :( ..");
				window.location.href='newuser.html';
			</script>
			<?
		}
	}
}
?>