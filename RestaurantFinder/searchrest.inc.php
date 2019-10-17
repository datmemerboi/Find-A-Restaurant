<?php
require 'connect.inc.php';
if(!function_exists('searchrest'))
{
	function searchrest($conn)
	{

		if( isset($_POST['search-bar']) && !empty($_POST['search-bar']))
		{
			$search = $_POST['search-bar'];
			$sql2 = "SELECT * FROM `joints` WHERE name LIKE '%".$search."%'";
			$run_sql2 = mysqli_query($conn,$sql2);
			$num_run_sql2 = mysqli_num_rows($run_sql2);

			if($num_run_sql2 == 0)
			{
				print_r("No such restautrants!");
			}
			else while($row = mysqli_fetch_assoc($run_sql2))
			{
				echo "<a href='".$row['name'].".php' target='_blank'>"; print_r($row['name']); echo "</a>"; 
				print_r("<br>");
				print_r($row['address']);
				print_r("<br>");
				if($row['contact']==NULL){	print_r("Contact not updated yet.");print_r("<br>");	}
				else{	print_r($row['contact']);print_r("<br>");	}
			}
		}
		if(empty($_POST['search-bar']))
		{
			print_r("Enter name to search..");
		}
	}
}
?>