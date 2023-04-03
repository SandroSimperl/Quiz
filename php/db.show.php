<?php 
	require_once("db.connect.php");

	$query="SELECT * from quiz_users";
	$result=$db->query($query);
	if(!$result){die("Userlist failed: (".$db->errno.") ".$db->error);}

	echo "Users Database<br /><table>";

	if($result->num_rows>0){
		$first_row=true;
		while($users=$result->fetch_assoc()){
			if ($first_row) {
				$first_row=false;
				echo "<tr>";
				foreach($users as $key=>$value) {
					echo "<td>".htmlspecialchars($key)."</td>";
				}
				echo "</tr><tr style=\"height:5px;\"></tr>";
			}
			echo "<tr>";
			foreach($users as $key=>$value) {
				echo "<td>".htmlspecialchars($value)."</td>";
			}
			echo "</tr>";
		}
	}
	echo "</table><br /><br />";

	$query="SELECT * from quiz_games";
	$result=$db->query($query);
	if(!$result){die("Gamelist failed: (".$db->errno.") ".$db->error);}

	echo "Games Database<br /><table>";

	if($result->num_rows>0){
		$first_row=true;
		while($users=$result->fetch_assoc()){
			if ($first_row) {
				$first_row=false;
				echo "<tr>";
				foreach($users as $key=>$value) {
					echo "<td>".htmlspecialchars($key)."</td>";
				}
				echo "</tr><tr style=\"height:5px;\"></tr>";
			}
			echo "<tr>";
			foreach($users as $key=>$value) {
				echo "<td>".htmlspecialchars($value)."</td>";
			}
			echo "</tr>";
		}
	}
	echo "</table><br /><br />";

	$query="SELECT * from quiz_questions";
	$result=$db->query($query);
	if(!$result){die("Questionlist failed: (".$db->errno.") ".$db->error);}

	echo "Questions Database<br /><table>";

	if($result->num_rows>0){
		$first_row=true;
		while($users=$result->fetch_assoc()){
			if ($first_row) {
				$first_row=false;
				echo "<tr>";
				foreach($users as $key=>$value) {
					echo "<td>".htmlspecialchars($key)."</td>";
				}
				echo "</tr><tr style=\"height:5px;\"></tr>";
			}
			echo "<tr>";
			foreach($users as $key=>$value) {
				echo "<td>".htmlspecialchars($value)."</td>";
			}
			echo "</tr>";
		}
	}
	echo "</table>";

	require_once("db.disconnect.php");
?>