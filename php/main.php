<?php 
	session_start();
	if(isset($_SESSION["userid"])){
		include("db.get.maxquestions.php");
		if(!isset($_SESSION["opengame"])){ ?>
			<div class="main">
				<p class="green">--- Auswahl Quiz starten ---</p><br />
				
				<p class="orange">Wieviele Fragen möchtest Du beantworten?</p>
				<p class="orange f14">Es gibt insgesamt <?php echo $max_questions; ?> Fragen</p><br /><br />
				
				<input type="hidden" name="maxfragen" id="maxfragen" value="<?php echo $max_questions; ?>" />
				<input class="inputField w50" maxlength="3" min="1" max="<?php echo $max_questions; ?>" type="number" name="fragen" id="fragen" value="3" />

				<p class="orange">
					<input type="checkbox" class="checkbox2" name="language" id="language" value="en" />
					<label class="orange f14" for="language">Möchtest Du die Fragen in Englisch?</label>
				</p><br /><br />
				
				
				<p class="blue"><input class="def_button" type="submit" id="new_quiz_start" value="Quiz starten" /></p>
			</div><?php
		}
	}else{ ?>
		<div class="main">
			<p class="green">
				<br />
				Hier kannst du Dich entweder einloggen und an einem Quiz teilnehmen<br />
				und Deine Auswertung anschauen, oder Dich neu anmelden, um teilzunehmen. <br />
				Gib dazu einen Usernamen und ein Passwort ein und klicke auf anmelden. <br /><br />
				Ohne Anmeldung ist diese Seite nicht nutzbar. <br /><br />
			</p>
			<p class="orange">“Viel Spaß beim Raten“</p>
		</div><?php
	}
?>
<script src="./js/main.js"></script>