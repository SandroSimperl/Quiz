<?php 
	require_once("db.connect.php");

	echo "
		<br /><br />
		Users Database<br />
		<table><tr><td>id</td><td>user_name</td><td>user_status</td><td>user_game</td><td>user_password_clean</td><td>user_password_md5</td></tr><tr>&nbsp;</tr>
	";
	$query="SELECT * from quiz_users";
	$result=$db->query($query);
	if(!$result){die("Userlist failed: (".$db->errno.") ".$db->error);}

	if($result->num_rows>0){
		while($users=$result->fetch_assoc()){
			echo "<tr><td>".$users["id"]."</td><td>".$users["user_name"]."</td><td>".$users["user_status"]."</td><td>".$users["user_game"]."</td><td>".$users["user_password_clean"]."</td><td>".$users["user_password_md5"]."</td></tr>";
		}
	}

	echo "
		</table>
		<br /><br />
		Games Database<br />
		<table><tr><td>id</td><td>game_id</td><td>game_user</td><td>game_done</td><td>game_stage</td><td>game_questions</td><td>game_questions_correct</td><td>game_questions_wrong</td></tr><tr>&nbsp;</tr>
	";

	$query="SELECT * from quiz_games";
	$result=$db->query($query);
	if(!$result){die("Gamelist failed: (".$db->errno.") ".$db->error);}

	if($result->num_rows>0){
		while($games=$result->fetch_assoc()){
			echo "<tr><td>".$games["id"]."</td><td>".$games["game_id"]."</td><td>".$games["game_user"]."</td><td>".$games["game_done"]."</td><td>".$games["game_stage"]."</td><td>".$games["game_questions"]."</td><td>".$games["game_questions_correct"]."</td><td>".$games["game_questions_wrong"]."</td></tr>";
		}
	}

	echo "
		</table>
		<br /><br />
		Questions Database<br />
		<table><tr><td>id</td><td>question_text</td><td>question_answer_A</td><td>question_answer_B</td><td>question_answer_C</td><td>question_answer_D</td><td>question_answer_E</td><td>question_answer_F</td><td>question_answer_Z</td><td>question_tip</td></tr><tr>&nbsp;</tr>
	";

	$query="SELECT * from quiz_questions";
	$result=$db->query($query);
	if(!$result){die("Questionlist failed: (".$db->errno.") ".$db->error);}

	if($result->num_rows>0){
		while($questions=$result->fetch_assoc()){
			echo "<tr><td>".$questions["id"]."</td><td>".$questions["question_text"]."</td><td>".$questions["question_answer_A"]."</td><td>".$questions["question_answer_B"]."</td><td>".$questions["question_answer_C"]."</td><td>".$questions["question_answer_D"]."</td><td>".$questions["question_answer_E"]."</td><td>".$questions["question_answer_F"]."</td><td>".$questions["question_answer_Z"]."</td><td>".$questions["question_tip"]."</td></tr>";
		}
	}

	echo "
		</table>
	";

	require("db.disconnect.php");
?>