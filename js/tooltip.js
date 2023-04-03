function tooltip_show(txt){
	$("#tooltip p").html(txt);
	$("#tooltip").show();
	$("#tooltip p").show();
	$("#tooltip").css("opacity",1);
}

/*
$(document).mousemove(function(e){
	$("#tooltip").css("opacity",0);
	$("#tooltip").css("left",e.pageX-250);
	$("#tooltip").css("top",e.pageY-250);
});

$(document).mouseleave(function(){
	$("#tooltip").hide();
});

$(document).mouseenter(function(){
	$("#tooltip").show();
});
*/