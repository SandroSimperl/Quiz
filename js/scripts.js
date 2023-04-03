/**
 **
 ** main functions
 **
 **/
function reload_content(){
	$("header").load("./php/header.php");
	$("main").load("./php/main.php");
	$("footer").load("./php/footer.php");
}
function reload_footer(){
	$("footer").load("./php/footer.php");
}
function reload_page(){
	location.href="//quiz.sandrosimperl.de/index.php";
	reload_content();
}
function number_to_string(nr) {  
	nr=nr.toString();
	var digit = ['Null','Eine','Zwei','Drei','Vier','Fünf','Sechs','Sieben','Acht','Neun'];  
	var str='';
	for(var i=0;i<1;i++){str+=digit[nr[i]];}
	str=str.replace(/\nr+/g, '');
	return str.trim();
}
/**
 **
 ** main action
 **
 **/
$(window).on("load",function(){
	reload_content();
});

$(document).ready(function(){
	$.fn.isInViewport=function(){
		let elementTop=$(this).offset().top,elementBottom=elementTop+$(this).outerHeight();
		let viewportTop=$(window).scrollTop(),viewportBottom=viewportTop+$(window).height();
		return elementBottom>viewportTop&&elementTop<viewportBottom;
	};
});

/*
$(document).bind('keypress keydown keyup', function(e) {
	if(e.which===116) {
	   alert("Kein Refresh während des Quiz");
	   return false;
	}
	if(e.which===82&&e.ctrlKey) {
	   alert("Kein Refresh während des Quiz");
	   return false;
	}
	if(e.which===13) {
	   alert("Absenden nur mit klicken");
	   return false;
	}
});
*/