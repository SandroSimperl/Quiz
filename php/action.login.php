<?php 
	session_start();

	require_once("db.connect.php");

	$username=trim($_POST["username"]);
	$password_clean=trim($_POST["password"]);
	$password_md5=MD5($_POST["password"]);

	$query_login="SELECT * from quiz_users WHERE user_name='$username' and user_password_md5='$password_md5'";
	$result_login=$db->query($query_login); if(!$result_login){die("Userlogin failed: (".$db->errno.") ".$db->error);}

	if($result_login->num_rows>0){
		while($user=$result_login->fetch_assoc()){
			$_SESSION["userid"]=$user["id"];
			$_SESSION["username"]=$user["user_name"];
			$_SESSION["admin"]=$user["user_status"];
		}
		echo "success";
	}else{
		echo "fail";
	}

	require_once("db.disconnect.php");
?>