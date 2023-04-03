<?php 
	session_start();

	require_once("db.connect.php");

	$username=trim($_POST["username"]);
	$password_clean=trim($_POST["password"]);
	$password_md5=MD5($_POST["password"]);

	$query_reg="SELECT * from quiz_users WHERE user_name='$username'";
	$result_reg=$db->query($query_reg); if(!$result_reg){die("User verifying failed: (".$db->errno.") ".$db->error);}

	if($result_reg->num_rows>0){
		session_destroy();
		echo "isuser";
	} else {
		$query_reg_insert="INSERT INTO quiz_users (user_name,user_password_clean,user_password_md5) VALUES ('$username','$password_clean','$password_md5')";
		$result_reg_insert=$db->query($query_reg_insert); if(!$result_reg_insert){die("User adding failed: (".$db->errno.") ".$db->error);}

		$query_reg_login="SELECT * from quiz_users WHERE user_name='$username' and user_password_md5='$password_md5'";
		$result_reg_login=$db->query($query_reg_login); if(!$result_reg_login){die("Userlogin failed: (".$db->errno.") ".$db->error);}

		if($result_reg_login->num_rows>0){
			while($user=$result_reg_login->fetch_assoc()){
				$_SESSION["userid"]=$user["id"];
				$_SESSION["username"]=$user["user_name"];
			}
			echo "success";
		} else {
			echo "fail";
		}
	}

	require_once("db.disconnect.php");
?>