<?php 
	session_start();
	if(isset($_SESSION["userid"])){
		require("db.get.quiz.php");

		if(isset($_SESSION["userid"])){ 
			$done_questions=1;?>
			<div class="footer">
				<p class="green">--- Auswertung aktuelles Quiz ---</p>
				<br /><?php
				if(isset($_SESSION["opengame"])){ ?>
					<p class="orange">Erledigte Frage<?php if($done_Questions>0){echo"n ";}else{echo" ";}; echo $done_questions ?> von <?php echo sizeof(explode(",",$quiz["game_questions"])); ?></p>
					<p class="orange"><?php echo $game_questions_correct_num; ?> Richtig <?php echo $game_questions_wrong_num; ?> Falsch | <?php echo $game_questions_percentage; ?>%</p>
					<br /><?php
				} ?>
				<p class="blue"><?php echo $all_games_num;($all_games_num=1)?" Spiel":" Spiele"; ?> gesamt <a name="summary">(Ansicht)</a></p>
				<br /><br />
				<p class="f12">--- Copyright &copy; 2023 sandrosimperl.cc@outlook.de ---</p>
			</div><?
		}
	}else{ ?>
		<div class="footer">
			<br /><br />
			<p>--- Copyright &copy; 2023 sandrosimperl.cc@outlook.de ---</p>
		</div><?php
	}
?>