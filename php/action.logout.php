<?php
	session_start();

	unset($_SESSION["username"]);
	unset($_SESSION["userid"]);
	unset($_SESSION["opengame"]);
	unset($_session["timeout"]);
	unset($db);

	session_destroy();

	echo "success";
?>