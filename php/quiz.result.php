<div class="result" id="<?php echo $cnt; ?>">
	<p class="orange left"><?php echo "Auswertung Quiz ".$current_result["game_id"]; ?></p><br /><?php
	
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