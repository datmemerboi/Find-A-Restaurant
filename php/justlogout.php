<?php
require '../inc/justsession.inc.php';
$_SESSION=NULL;
session_destroy();
?>
<script type="text/javascript">
	alert("Logged Out.");
	window.location.href='../html/juslogin.html';
</script>