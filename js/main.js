$(document).ready(function(){
	/**
	 ** find opened game
	 **/
	$("new_quiz_start").prop("disabled",true);
	
	$.ajax({
		type:"post",
		url:"php/quiz.find.game.php",
		success:function(response){
			if(response=="success"){
				$("main").load("./php/quiz.php");
			}
		}
	});
	
	$("new_quiz_start").prop("disabled",false);
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
	 ** start new game button
	 **/
	$("#new_quiz_start").click(function(){
		let how_many_questions=parseInt($("#fragen").val());
		let game_id=((+new Date)+Math.random()*100).toString(32);
		let language=($("#language").is(":checked"))?$("#language").val():"de";
		let max_questions=parseInt($("#maxfragen").val());

		if(how_many_questions>=1&&how_many_questions<=max_questions){
			$.ajax({
				type:"post",
				url:"php/quiz.create.game.php",
				data:{
					how_many_questions:how_many_questions,
					game_id:game_id,
					language:language
				},
				success:function(response){
					(response=="success")?reload_content():alert("Fehler. Bitte lade die Seite neu\n"+response);
				}
			});
		}else{
			alert("Hmm. Eine Zahl zwischen 1 und "+max_questions+",\nist echt schwer, was?");
		}
		return false;
	})
})