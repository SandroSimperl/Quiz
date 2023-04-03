Ich bin noch nicht fertig.<br />
Schau bitte in 3 Tagen nocheinmal hier rein, dann sollte ich fertig sein<br /><br /><br />
<div class="progressbar bg_darkgray"><span class="bg_white blue"></span></div>
<script>
$(document).ready(function(){
	$(".progressbar span").each(function(){
		$(this).attr("data-progress","65");
		$(this).animate({
			width: $(this).attr("data-progress")+"%",
		},1000);
		$(this).text($(this).attr("data-progress")+"%");
	});
});
</script>