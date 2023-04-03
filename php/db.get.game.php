<?php
	require("db.connect.php");
	
	$query_game="SELECT * from quiz_games WHERE game_id='".$quiz["game_id"]."'";
	$result_game=$db->query($query_game); if(!$result_game){die("Load Quiz failed: (".$db->errno.") ".$db->error);}
	$game=$result_game->fetch_assoc();
	
	require("db.disconnect.php");
	
	/**
		$game["id"]
		$game["game_id"]
		$game["game_user"]
		$game["game_done"]
		$game["game_language"]
		$game["game_questions"]
	**/
?>
