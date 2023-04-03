<?php
	require("db.connect.php");
	
	($quiz["game_language"]=="de")?$language="quiz_questions":$language="quiz_questions_en";
	
	$query_questions="SELECT * from ".$language." WHERE id='".$current_question."'";
	$result_questions=$db->query($query_questions); if(!$result_questions){die("Load Quiz failed: (".$db->errno.") ".$db->error);}
	$questions=$result_questions->fetch_assoc();
	
	require("db.disconnect.php");
	
	/**
		$questions["id"]
		$questions["question_tip"]
		$questions["question_text"]
		$questions["question_answer_A"]
		$questions["question_answer_B"]
		$questions["question_answer_C"]
		$questions["question_answer_D"]
		$questions["question_answer_E"]
		$questions["question_answer_F"]
		$questions["question_answer_Z"]
	**/
?>
