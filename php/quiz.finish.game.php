<?php
	session_start();

	require_once("db.connect.php");
	
	$userId=$_POST["gameuser"];
	$gameId=$_POST["gameid"];
	
	$query="
		UPDATE 
			quiz_games 
		SET 
			game_done='1'
		WHERE 
			game_user='$userId' AND game_id='$gameId'
	";
	$result=$db->query($query); if(!$result){die("Quiz update failed: (".$db->errno.") ".$db->error);}
	
	$query_delete="
		UPDATE 
			quiz_users 
		SET 
			user_game=''
		WHERE 
			id='$userId' AND user_game='$gameId'
	";
	$result_delete=$db->query($query_delete); if(!$result_delete){die("Quiz update failed: (".$db->errno.") ".$db->error);}
	
	//if($result && $result_delete){
	if($result){
		//unset($_SESSION["opengame"]);
		echo "success";
	} else {
		echo "fail";
	}

	require_once("db.disconnect.php");
?>