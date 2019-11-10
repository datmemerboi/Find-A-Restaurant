<?php
require 'connect.inc.php';
if(!function_exists('searcharea'))
{
	function searcharea($conn)
	{
		if(isset($_POST['search-bar']) && !empty($_POST['search-bar']))
		{
			$searcharea = $_POST['search-bar'];
			$sql1 = "SELECT * FROM joints WHERE area LIKE '%".$searcharea."%'";
			$run_sql1 = mysqli_query($conn,$sql1);
			$num_run_sql1 = mysqli_num_rows($run_sql1);
			if($num_run_sql1 == 0)
			{
				print_r("<br>");
				print_r("No such areas!");
			}
			while($row = mysqli_fetch_assoc($run_sql1))
			{
				print_r("<br>");
				echo "<a href='./Restaurants/".$row['name'].".php' target='_blank'>"; print_r($row['name']); echo "</a>";
				print_r("<br>");
				print_r($row['address']);
				print_r("<br>");
				if($row['contact']==0){	print_r("Contact not updated yet");print_r("<br>");	}
				else{	print_r($row['contact']);print_r("<br>");	}
			}
		}
	}
}
?>