<?php
	session_start();

	require_once("db.connect.php");
	
	$userId=$_SESSION["userid"];
	$gameId=$_POST["game_id"];
	$current_question=$_POST["current_question"];
	$current_answers=$_POST["current_answers"];
	
	$query="
		UPDATE 
			quiz_games 
		SET 
			game_questions_".$current_question."='".$current_answers."'
		WHERE 
			game_user='$userId' AND game_id='$gameId' AND game_done='0'
	";
	$result=$db->query($query); if(!$result){die("Quiz update failed: (".$db->errno.") ".$db->error);}
	
	if($result){
		echo "success";
	} else {
		echo "fail";
	}

	require_once("db.disconnect.php");
?>