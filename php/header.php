<?php
	session_start();
	if(isset($_SESSION["userid"])){
		
		if($_SESSION["admin"]==1){
			echo '
				<input type="submit" class="def_button" id="logout_button2" value="logout">
				<input type="submit" class="def_button" id="database" value="database">
				<input type="submit" class="def_button" id="showdatabase" value="show database">
				<br /><br />
			';
		} ?>

		<div class="header">
			<?php ($_SESSION["admin"]==1)?$log_color="blue":$log_color="orange"; ?>
			<p> --- Hallo <span class="<?php echo $log_color; ?> f22"><?php echo $_SESSION['username']; ?></span>, willkommen zum AWS Cloud System Quiz ---</p>
			
			<div class="fright">
				<form id="logout_form" name="logout_form" method="post">
					<input class="def_button" type="submit" id="logout_button" value="logout">
				</form>
			</div>
		</div><?php
	}else{ ?>
		<div class="header">
			<p> --- Willkommen zum AWS Cloud System Quiz ---</p>
			<div class="fright">
				<form id="loginform" name="loginform" method="post">
					<input class="inputField" type="text" name="username" id="username" placeholder="username" \>
					<input class="inputField" type="password" name="password" id="password" placeholder="password" \>
					<input class="def_button" type="submit" id="login_button" value="login" \>
					<input class="def_button" type="submit" id="register_button" value="anmelden" \>
				</form>
			</div>
		</div><?php
	}
?>
<script src="./js/header.js"></script>