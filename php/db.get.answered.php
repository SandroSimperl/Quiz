<?php 
	session_start();

	require("db.connect.php");

	$query="SELECT * from quiz_games WHERE game_user='".$_SESSION["userid"]."' AND game_id='".$quiz["game_id"]."'";
	$result=$db->query($query); if(!$result){die("Answered searching failed: (".$db->errno.") ".$db->error);}
	$answered=$result->fetch_assoc();
	
	$get_answered=[];
	
	if($result->num_rows>0){
		for($i=1;$i<$max_questions+1;$i++) {
			$query="SELECT game_questions_".$i." from quiz_games";
			$result=$db->query($query); 
			if($result){
				array_push($get_answered,$answered["game_questions_".$m]);
			}else{
				$get_answered=["LEER"];
			}
			unset($query3);
			unset($result3);
		}
		echo "1: ".$get_answered;
		
	} else {
		echo "fail";
	}
	
	require("db.disconnect.php");
?>