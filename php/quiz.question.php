<div class="question" id="<?php echo $cnt; ?>">
	<?php if($_SESSION["admin"]==1){$state="text";}else{$state="hidden";}?>
	
	<input type="<?php echo $state; ?>" class="game_user ai" id="game_user" value="<?php echo $quiz["game_user"]; ?>" />

	<input type="<?php echo $state; ?>" class="game_id ai" id="game_id" value="<?php echo $quiz["game_id"]; ?>" />
	<input type="<?php echo $state; ?>" class="question_number ai" value="<?php echo $cnt; ?>" />
	<input type="<?php echo $state; ?>" class="question_count ai" value="<?php echo sizeof(explode(",",$quiz["game_questions"])); ?>" /><br />
	
	<input type="<?php echo $state; ?>" class="question_id_<?php echo $cnt; ?> ai" value="<?php echo $questions["id"]; ?>" />
	<input type="<?php echo $state; ?>" class="question_correct_answers_<?php echo $cnt; ?> ai" value="<?php echo $questions["question_answer_Z"]; ?>" />
	<input type="<?php echo $state; ?>" class="question_given_answers_<?php echo $cnt; ?> ai" value="<?php echo $game["game_questions_".$cnt]; ?>" />
	
	<p class="green left"><?php echo "Frage ".$cnt.") [ID: ".$questions["id"]."] - (".$questions["question_answer_Z"].")"; ?></p><br />
	<p class="orange left"><?php echo $questions["question_text"]; ?></p><br /><br /><?php
	
	if($questions["question_answer_A"]!="" && $questions["question_answer_A"]!=" "){ ?>
		<p class="left auswahl">
			<input type="checkbox" class="checkbox" name="answer_<?php echo $cnt; ?>" id="A" />
			<label class="blue f14" for="answer_<?php echo $cnt; ?>">A: <?php echo $questions["question_answer_A"]; ?></label>
		</p><?php
	;}
	if($questions["question_answer_B"]!="" && $questions["question_answer_B"]!=" "){ ?>
		<p class="left auswahl">
			<input type="checkbox" class="checkbox" name="answer_<?php echo $cnt; ?>" id="B" />
			<label class="blue f14" for="answer_<?php echo $cnt; ?>">B: <?php echo $questions["question_answer_B"]; ?></label>
		</p><?php
	;}
	if($questions["question_answer_C"]!="" && $questions["question_answer_C"]!=" "){ ?>
		<p class="left auswahl">
			<input type="checkbox" class="checkbox" name="answer_<?php echo $cnt; ?>" id="C" />
			<label class="blue f14" for="answer_<?php echo $cnt; ?>">C: <?php echo $questions["question_answer_C"]; ?></label>
		</p><?php
	;}
	if($questions["question_answer_D"]!="" && $questions["question_answer_D"]!=" "){ ?>
		<p class="left auswahl">
			<input type="checkbox" class="checkbox" name="answer_<?php echo $cnt; ?>" id="D" />
			<label class="blue f14" for="answer_<?php echo $cnt; ?>">D: <?php echo $questions["question_answer_D"]; ?></label>
		</p><?php
	;}
	if($questions["question_answer_E"]!="" && $questions["question_answer_E"]!=" "){ ?>
		<p class="left auswahl">
			<input type="checkbox" class="checkbox" name="answer_<?php echo $cnt; ?>" id="E" />
			<label class="blue f14" for="answer_<?php echo $cnt; ?>">E: <?php echo $questions["question_answer_E"]; ?></label>
		</p><?php
	;}
	if($questions["question_answer_F"]!="" && $questions["question_answer_F!"]=" "){ ?>
		<p class="left auswahl">
			<input type="checkbox" class="checkbox" name="answer_<?php echo $cnt; ?>" id="F" />
			<label class="blue f14" for="answer_<?php echo $cnt; ?>">F: <?php echo $questions["question_answer_F"]; ?></label>
		</p><?php
	;}?><br />
	
	<div>
		<button id="answer_button_<?php echo $cnt; ?>" class="def_button answer_button">beantworten</button>
	</div>
	
	<div id="answer_<?php echo $cnt; ?>">
		<br /><br />
		<p name="correct_answer_<?php echo $cnt; ?>" class="green left none">
			Richtig<br />
			Die korrekte Antwort ist <span class="green" name="correct_<?php echo $cnt; ?>"></span><br />
		</p>
		<p name="wrong_answer_<?php echo $cnt; ?>" class="red left none">
			Falsch<span class="red" name="wrong_tip_<?php echo $cnt; ?>"></span><br />
			Die richtige Antwort wäre <span class="red" name="wrong_<?php echo $cnt; ?>"></span> gewesen<br />
		</p>
	</div>
	<br /><br /><hr \><br /><br />
</div>