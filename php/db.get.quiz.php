<?php
	require("db.connect.php");
	
	$query_quiz="SELECT * from quiz_games WHERE game_user='".$_SESSION["userid"]."' and game_done='0'";
	$result_quiz=$db->query($query_quiz); if(!$result_quiz){die("Load Quiz failed: (".$db->errno.") ".$db->error);}
	$quiz=$result_quiz->fetch_assoc();
	
	require("db.connect.php");
	
	/*
			$quiz["game_id"];
			$quiz["game_user"];
			$quiz["game_done"];
			$quiz["game_language"];
			$quiz["game_questions"];
			
			$quiz["game_questions_".$current_question];
			
			$game_questions_num=sizeof(explode(",",$quiz["game_questions"];));
	*/
?>