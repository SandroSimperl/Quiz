<?php
	session_start();

	require_once("db.connect.php");

	$query_max="SELECT * from quiz_questions";
	$result_max=$db->query($query_max); if(!$result_max){die("Questionlist failed: (".$db->errno.") ".$db->error);}
	$max_questions=mysqli_num_rows($result_max);

	$userId=$_SESSION["userid"];
	$spielId=$_POST["game_id"];
	$fragenNum=$_POST["how_many_questions"];
	$language=$_POST["language"];
	
	$random_number_array=range(1,$max_questions);
	shuffle($random_number_array);
	$random_number_array=array_slice($random_number_array,0,$fragenNum);
	$random_number_array=implode(",",$random_number_array);
	
	for($i=1;$i<=$fragenNum;$i++){
		try {
			$db->query("ALTER TABLE quiz_games ADD `game_questions_".$i."` varchar(15) NOT NULL");
		}catch(Exception $e){}
	}
	
	$query_insert="INSERT INTO quiz_games (game_id,game_user,game_questions,game_language) VALUES ('$spielId','$userId','$random_number_array','$language')";
	$result_insert=$db->query($query_insert); if(!$result_insert){die("Quiz start failed: (".$db->errno.") ".$db->error);}
	
	$query_update="UPDATE quiz_users SET user_game='$spielId' WHERE id='$userId'";
	$result_update=$db->query($query_update); if(!$result_update){die("Set gameid failed: (".$db->errno.") ".$db->error);}

	if($result_insert && $result_update){
		echo "success";
	}else{
		echo "fail";
	}

	require_once("db.disconnect.php");
?>