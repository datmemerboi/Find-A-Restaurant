<?php

function new_table_book($conn)
{
	if(isset($_POST['book_table_submit']) )
	{
		if(isset($_SESSION['JOINT']['id']) && isset($_POST['takeaway_time']) && isset($_POST['chairs']) && isset($_SESSION['username']))
		{
			$bookingid = rand(2000,7000);
			// $jointid = $_SESSION['JOINT']['id'];
			$takeaway_time = $_POST['takeaway_time'];
			$chairs = $_POST['chairs'];
			$tablenmbr = rand(1,120);
			
			 $sql2 = "INSERT INTO `bookings` (`bookingid`, `tablenumber`, `username`, `time`, `chairs`, `jointid`) VALUES ('".$bookingid."', '".$tablenmbr."', '".$_SESSION['username']."', '".$takeaway_time."', '".$chairs."' , '".$_SESSION['JOINT']['id']."') ";
			$run_sql2 = mysqli_query($conn, $sql2);
			if(!($run_sql2))
			{
				echo "<script> alert('Not Booked.'); </script>";
			}
			else
			{
				echo "<script> alert('Booked!'); </script>";
			}
		}
		else
		{
			echo "<script> alert('Enter necessry fields to book'); </script>";
		}
	}
}

if(!function_exists('booked'))
{
	function booked($conn){
		if( isset($_SESSION['username']) )
		{
			$sql1 = "SELECT * FROM `bookings` WHERE `username` = '".$_SESSION['username']."' ";
			$run_sql1 = mysqli_query($conn, $sql1);
			if($run_sql1)
			{
				while ($big_row = mysqli_fetch_assoc($run_sql1))
				{
					$sql3 = "SELECT `name` FROM `joints` WHERE `id`='".$big_row['jointid']."'";
					$run_sql3 = mysqli_query($conn,$sql3);
					$joint_row = mysqli_fetch_assoc($run_sql3);

					$time = date_create($big_row['time']);
					print_r("<b>".date_format($time, "g:i A")."</b>");print_r(" for ");
					print_r("<b>".$big_row['chairs']."</b>");print_r(" members at ");
					print_r("<b>".$joint_row['name']."</b>");print_r(".<br><t>");
					print_r("BOOKING ID: ");print_r("<b>".$big_row['bookingid']."</b>");print_r("<br>");
				}
				if(mysqli_num_rows($run_sql1)==0)
				{
					print_r("No bookings, yet.");
				}
			}
			else
				print_r("No bookings.");
		}
	}
}
?>