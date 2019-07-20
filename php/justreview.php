<?php
require '../inc/justconnect.inc.php';
require '../inc/justsession.inc.php';

if( empty($_POST['review_box']) )
{
	?>
	<script type="text/javascript">
		alert("No Reviews to enter");
		var link = "<?php echo $_SESSION['JOINT']['name'] ?>";
		window.location.href = "../reslist/"+link+".php";
	</script>
	<?
}
if( isset($_SESSION['JOINT']['id']) && isset($_SESSION['username']) && !empty($_POST['review_box']))

	$sql1 = "INSERT INTO `comments`(`jointid`, `username`, `reviewid` , `review`) VALUES ('".$_SESSION['JOINT']['id']."', '".$_SESSION['username']."', '".rand(2000,4000)."' , '".$_POST['review_box']."') ";
	$runsql1 = mysqli_query($conn, $sql1);

	if($runsql1)
	{
		?>
		<script type="text/javascript">
			alert("Review has been posted");
			var link = "<?php echo $_SESSION['JOINT']['name'] ?>";
			window.location.href = "../reslist/"+link+".php";
		</script>
		<?
	}
	else
	{
		?>
		<script type="text/javascript">
			alert("Review not entered");
			console.log("<?php echo $sql1; ?>");
			var link = "<?php echo $_SESSION['JOINT']['name'] ?>";
			window.location.href = "../reslist/"+link+".php";
		</script>
		<?
	}
?>