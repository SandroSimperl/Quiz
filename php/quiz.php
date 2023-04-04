<?php 
	session_start();
	
	echo "<div class=\"main\">";
	
	if(isset($_SESSION["userid"])){ 
		include("db.get.quiz.php"); ?>
		
		<p class="green">--- <?php echo $_SESSION["username"]; ?> - Spiel ID: <?php echo $quiz["game_id"]; ?> ---</p><br />
		<!--//<div id="tooltip" class="none"><p class="none"></p></div>//--><?php
		
		$cnt=1;
		
		foreach(explode(",",$quiz["game_questions"]) as $current_question){
			include("db.get.questions.php");
			include("db.get.game.php");
			include("quiz.question.php");
			$cnt=$cnt+1;
		}
		echo"<div class=\"done_button none\"><button id=\"done_button\" class=\"def_button done_button\">abschliessen</button></div>";

	} else { ?>
		<br /><br /><p>Irgendwas ist schief gelaufen. Bitte starte diese Seite neu!</p><?php
	}
	
	echo "</div>";
?>
<script src="./js/quiz.js"></script>