<?php
	require("db.connect.php");
	
	$game_id=trim($_POST["game_id"]);
	
	$query_current_result="SELECT * from quiz_games WHERE game_user='".$_SESSION["userid"]."' and game_id='".$game_id."' and game_done='1'";
	$result_current_result=$db->query($query_current_result); if(!$result_current_result){die("Load current Result failed: (".$db->errno.") ".$db->error);}
	$current_result=$result_current_result->fetch_assoc();
	
	$query_result="SELECT * from quiz_games WHERE game_user='".$_SESSION["userid"]."' and game_done='1'";
	$result_result=$db->query($query_result); if(!$result_result){die("Load Result failed: (".$db->errno.") ".$db->error);}
	$result=$result_result->fetch_assoc();
	
	require("db.connect.php");
	
	if($current_result->num_rows>0){
		echo "success";
	} else {
		echo "fail";
	}
	
	/*
			$current_result["game_id"];
			$current_result["game_user"];
			$current_result["game_done"];
			$current_result["game_language"];
			$current_result["game_questions"];
			
			$current_result["game_questions_".$current_question];
			
			$game_questions_num=sizeof(explode(",",$current_result["game_questions"];));
	*/
?>