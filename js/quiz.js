
$(document).ready(function(){
	/**
	 ** define vars and disable buttons as long no answer is given
	 **/
	let current_question;
	let counting_question=$(".question_count").val();
	let game_id=$("#game_id").val();
	let game_user=$("#game_user").val();
	let your_answers_array=new Array();
	for(let ans=1;ans<=counting_question;ans++){
		your_answers_array[ans]=new Array();
	}
	(your_answers_array.length>0)?$("button[id^='answer_button']").prop("disabled",false):$("button[id^='answer_button']").prop("disabled",true);
	/**
	 ** checkboxes
	 **/
	$("input[type=checkbox]").click(function(){
		current_question=$(this).attr("name").replace(/[^\d.]/g,"");
		if(this.checked){
			your_answers_array[current_question].push($(this).attr("id"));
		}else{
			your_answers_array[current_question].splice($.inArray($(this).attr("id"),your_answers_array[current_question]),1);
		}
		(your_answers_array[current_question]!="")?
			$("button[id^='answer_button'][id$='"+current_question+"']").prop("disabled",false):
			$("button[id^='answer_button'][id$='"+current_question+"']").prop("disabled",true)
		;
		$("[class^='question_given_answers_'][class*='"+current_question+"']").val(your_answers_array[current_question]);
	});
	/**
	 ** answering button
	 **/
	$(".answer_button").click(function(){
		current_question=$(this).attr("id").replace(/[^\d.]/g,"");
		
		let correct_answers_string=$(".question_correct_answers_"+current_question).val();
		let given_answers_string=$(".question_given_answers_"+current_question).val();
		
		let current_question_answers=[];
		let match=correct_answers_string.split(',');
		match.forEach(function(item){
			current_question_answers.push(item);
		});
		
		if(your_answers_array[current_question].toString()==current_question_answers.toString()){
			$("input[type='checkbox'][name*='"+current_question+"']:not(:checked)").each(function(){
				$(this).prop("disabled",true).addClass("lightgray").removeClass("blue").css({"opacity":.1});
				$(this).next("label").addClass("lightgray").removeClass("blue").css({"opacity":.1});
			});
			$("input[type='checkbox'][name*='"+current_question+"']:checked").each(function(){
				$(this).prop("disabled",true).addClass("green").removeClass("blue").css({"opacity":.4});
				$(this).next("label").addClass("green").removeClass("blue").css({"opacity":.8});
			});
			
			$("span[name^='correct_"+current_question+"']").html(correct_answers_string);
			$("p[name^='correct_answer_"+current_question+"']").show();
		}else{
			$("input[type='checkbox'][name*='"+current_question+"']:not(:checked)").each(function(){
				$(this).prop("disabled",true).addClass("lightgray").removeClass("blue").css({"opacity":.1});
				$(this).next("label").addClass("lightgray").removeClass("blue").css({"opacity":.1});
			});
			$("input[type='checkbox'][name*='"+current_question+"']:checked").each(function(){
				$(this).prop("disabled",true).addClass("red").removeClass("blue").css({"opacity":.4});
				$(this).next("label").addClass("red").removeClass("blue").css({"opacity":.8});
			});
			
			let half=0;
			for(da=0;da<=current_question_answers.length-1;da++){
				for(ya=0;ya<=your_answers_array[current_question].length-1;ya++){
					if(current_question_answers[da]===your_answers_array[current_question][ya]){
						half+=1;
						break;
					}
				}
			}
			
			$("span[name^='wrong_"+current_question+"']").html(correct_answers_string);
			(half!=0)?
				$("span[name^='wrong_tip_"+current_question+"']").html(", "+number_to_string(half)+" der Antwroten war zwar richtig.\nAber eben nicht alle."):
				$("span[name^='wrong_tip_"+current_question+"']").html("")
			;
			$("p[name^='wrong_answer_"+current_question+"']").show();
		}
		
		(current_question===counting_question)?$("div.done_button").show():$("div.done_button").hide();
		
		$.ajax({
			type:"post",
			url:"php/quiz.update.game.php",
			data:{
				game_id:game_id,
				current_question:current_question,
				current_answers:your_answers_array[current_question].toString()
			},
			success:function(response){
				(response=="success")?reload_footer():alert("Fehler. Bitte lade die Seite neu\n".response);
			}
		});
		
		$("button[id^='answer_button'][id$='"+current_question+"']").prop("disabled",true).hide();
		your_answers_array[current_question]=[];
	});
	/**
	 ** find answered questions
	 **/
	$("input[class^='question_given_answers']").each(function(){
		current_question=$(this).attr("class").replace(/[^\d.]/g,"");
		
		let correct_answered_string=$(".question_correct_answers_"+current_question).val();
		let given_answered_string=$(this).val();
		
		if(given_answered_string!=""){
			
			let given_letter=given_answered_string.split(',');
			given_letter.forEach(function(gl){
				$("input[type='checkbox'][name*='"+current_question+"'][id='"+gl+"']").prop("checked",true)
			});

			if(correct_answered_string==given_answered_string){
				$("input[type='checkbox'][name*='"+current_question+"']:not(:checked)").each(function(){
					$(this).prop("disabled",true).addClass("lightgray").removeClass("blue").css({"opacity":.1});
					$(this).next("label").addClass("lightgray").removeClass("blue").css({"opacity":.1});
				});
				$("input[type='checkbox'][name*='"+current_question+"']:checked").each(function(){
					$(this).prop("disabled",true).addClass("green").removeClass("blue").css({"opacity":.4});
					$(this).next("label").addClass("green").removeClass("blue").css({"opacity":.8});
				});
				
				$("span[name^='correct_"+current_question+"']").html(correct_answered_string);
				$("p[name^='correct_answer_"+current_question+"']").show();
			}else{
				$("input[type='checkbox'][name*='"+current_question+"']:not(:checked)").each(function(){
					$(this).prop("disabled",true).addClass("lightgray").removeClass("blue").css({"opacity":.1});
					$(this).next("label").addClass("lightgray").removeClass("blue").css({"opacity":.1});
				});
				$("input[type='checkbox'][name*='"+current_question+"']:checked").each(function(){
					$(this).prop("disabled",true).addClass("red").removeClass("blue").css({"opacity":.4});
					$(this).next("label").addClass("red").removeClass("blue").css({"opacity":.8});
				});
				
				let half=0;
				for(da=0;da<=correct_answered_string.length-1;da++){
					for(ya=0;ya<=your_answers_array[current_question].length-1;ya++){
						if(correct_answered_string[da]===your_answers_array[current_question][ya]){
							half+=1;
							break;
						}
					}
				}
				
				$("span[name^='wrong_"+current_question+"']").html(correct_answered_string);
				(half!=0)?
					$("span[name^='wrong_tip_"+current_question+"']").html(", "+number_to_string(half)+" der Antwroten war zwar richtig.\nAber eben nicht alle."):
					$("span[name^='wrong_tip_"+current_question+"']").html("")
				;
				$("p[name^='wrong_answer_"+current_question+"']").show();
			}
			
			$("button[id^='answer_button'][id$='"+current_question+"']").prop("disabled",true).hide();
		}
		
		(current_question===counting_question)?$("div.done_button").show():$("div.done_button").hide();
	});
	/**
	 ** finish button
	 **/
	$("#done_button").click(function(){
		alert(game_id);
		alert(game_user);
		$.ajax({
			type:"post",
			url:"php/quiz.finish.game.php",
			data:{
				gameid:game_id,
				gameuser:game_user
			},
			success:function(response){
				if(response=="success"){
					$("main").load("./php/result.php");
					alert("1: "+response)
				}else{
					alert("2: "+response)
				}
			}
		});
	});
});