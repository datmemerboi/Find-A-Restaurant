<?php
require 'session.inc.php';
$_SESSION=NULL;
session_destroy();
?>
<script type="text/javascript">
	alert("Logged Out.");
	window.location.href='login.html';
</script>