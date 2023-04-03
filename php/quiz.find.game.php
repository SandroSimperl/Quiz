<?php 
	session_start();

	if(isset($_SESSION["userid"])){
		require_once("db.connect.php");

		$query="SELECT * from quiz_users WHERE id='".$_SESSION["userid"]."'";
		$result=$db->query($query); if(!$result){die("User verifying failed: (".$db->errno.") ".$db->error);}
		
		if($result->num_rows>0){
			while($user=$result->fetch_assoc()){
				if($user["user_game"]!=null || $user["user_game"]!=""){
					$_SESSION["opengame"]=$user["user_game"];
					echo "success";
				} else {
					unset($_SESSION["opengame"]);
					echo "fail";
				}
			}
		} else {
			unset($_SESSION["opengame"]);
			echo "fail";
		}
		
		require_once("db.disconnect.php");
	}
?>