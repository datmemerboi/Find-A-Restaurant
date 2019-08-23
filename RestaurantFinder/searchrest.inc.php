<?php
require 'connect.inc.php';
if(!function_exists('searchrest'))
{
	function searchrest($conn)
	{
		$returnArray = array();

		if( isset($_POST['search']) && !empty($_POST['search']))
		{
			$search = $_POST['search'];
			$sql2 = "SELECT * FROM `joints` WHERE name LIKE '%".$search."%'";
			$run_sql2 = mysqli_query($conn,$sql2);
			$num_run_sql2 = mysqli_num_rows($run_sql2);

			if($num_run_sql2 == 0)
			{
				print_r("No such restautrants!");
				// array_push($returnArray, "No such restautrants!");
			}
			else while($row = mysqli_fetch_assoc($run_sql2))
			{
				// array_push($returnArray,$row['name'],$row['address'],$row['contact']);
				print_r("<br>");
				echo "<a href='../reslist/".$row['name'].".php'>"; print_r($row['name']); echo "</a>"; print_r("<br>");
				print_r($row['address']);print_r("<br>");

				if($row['contact']==NULL){	print_r("Contact not updated yet.");print_r("<br>");	}
				else{	print_r($row['contact']);print_r("<br>");	}
			}
		}
		if(empty($_POST['search']))
		{
			print_r("Enter name to search..");
			// array_push( $returnArray, "Enter search name..");
		}
		return($returnArray);
	}
}
?>