<?php 
	session_start();
	
	echo "<div class=\"main\">";
	
	if(isset($_SESSION["userid"])){ 
		include("db.get.result.php"); ?>
		
		<p class="green">--- Auswertung - Spiel ID: <?php echo $current_result["game_id"]; ?> ---</p><br /><?php
				
		foreach(explode(",",$current_result["game_questions"]) as $result_question){
			include("quiz.result.php");
		}
		echo"<div class=\"done_button none\"><button id=\"done_button\" class=\"def_button done_button\">abschliessen</button></div>";

	} else { ?>
		<br /><br /><p>Irgendwas ist schief gelaufen. Bitte starte diese Seite neu!</p><?php
	}
	
	echo "</div>";
?>
<script src="./js/quiz.js"></script>