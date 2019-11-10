<?php
require 'booktable.inc.php';
require 'session.inc.php';
require 'connect.inc.php';
?>
<form action="" method="POST">
	<label>Time of arrival (11:00 to 22:30)</label>
	<input type="time" min="11:00" max="22:30" name="takeaway_time" class="box"><br><br>
	<label>Number of members</label><input type="number" placeholder="chairs" name="chairs" class="box" min="0">
	<input type="submit" class="btn smallbtn" id="submit-btn" name="book_table_submit" value="Confirm Booking">
</form>