<?php
	session_start();
	
	if(isset($_session["timeout"]) ) {
		$inactive=10; // 20 mins in seconds are 1200
		$session_life=time()-$_session["timeout"]; 

		if($session_life>$inactive) {
			unset($_session["username"]);
			unset($_session["userid"]);
			unset($_session["opengame"]);
			unset($_session["timeout"]);
			unset($db);

			session_destroy();
			header("Location: index.html");
		}
	}
	$_session["timeout"]=time();
?>

if(isset($_SESSION["timeout"]) ) {
$session_life = time() - $_SESSION["timeout"]; 	if($session_life > $inactive)		 { session_destroy(); header("location: somelocation.php"); } }