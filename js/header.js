$(document).ready(function(){
	/**
	 ** login button
	 **/
	$("#login_button").click(function(){
		let username=$("#username").val(),password=$("#password").val();
		if(username!=""&&password!=""){
			$.ajax({
				type:"post",
				url:"./php/action.login.php",
				data:{
					username:username,
					password:password
				},
				success:function(response){
					(response.startsWith("success"))?reload_content():alert("Falsche Daten eingegeben");
				}
			});
		}else{
			alert("Leere Felder?? Echt jetzt");
		}
		return false;
	})
	/**
	 ** logout button
	 **/
	$("#logout_button, #logout_button2").click(function(){
		$.ajax({
			type:"post",
			url:"./php/action.logout.php",
			success:function(response){
				(response=="success")?reload_page():alert("Error, try again");
			}
		});
	})
	/**
	 ** register button
	 **/
	$("#register_button").click(function(){
		let username=$("#username").val(),password=$("#password").val();
		if(username!="" && password!=""){
			$.ajax({
				type:"post",
				url:"./php/action.register.php",
				data:{
					action:"register",
					username:username,
					password:password
				},
				success:function(response){
					(response=="isuser")?alert("Den user gibt es schon.\nLogge Dich ein, oder nimm einen anderen Usernamen"):(response=="success")?reload_content():alert("Konnte Dich nicht anmelden");
				}
			});
		}else{
			alert("Leere Felder?? Echt jetzt");
		}
		return false;
	})
	/**
	 ** creating default database
	 **/
	$("#database").click(function(){
		$.ajax({
			type:"post",
			url:"./php/db.create.php",
			success:function(response){
				if(response=="success"){
					$.ajax({
						type:"post",
						url:"./php/action.logout.php",
						success:function(response){
							(response=="success")?reload_page():alert("Error, try again\n"+response);
						}
					});
				}else{
					alert("Error, try again\n"+response);
				}
			}
		});
	})
	/**
	 ** show whole database
	 **/
	$("#showdatabase").click(function(){
		$("main").load("./php/db.show.php");
	})
});