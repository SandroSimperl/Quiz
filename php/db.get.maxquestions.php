<?php
	require("db.connect.php");
	
	$query_max="SELECT * from quiz_questions";
	$result_max=$db->query($query_max);if(!$result_max){die("Questionlist failed: (".$db->errno.") ".$db->error);}
	$max_questions=mysqli_num_rows($result_max);
	
	require("db.disconnect.php");
?>
