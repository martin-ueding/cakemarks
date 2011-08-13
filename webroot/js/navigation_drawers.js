// Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

$(document).ready(function() {
	$("#keywordbox .handle").click(function() {
		$("#keywordbox .unfold").slideDown(200);
	});
	$("#keywordbox").mouseleave(function() {
		$("#keywordbox .unfold").slideUp(300);
	});

	$("#navigation .handle").click(function() {
		$("#navigation .unfold").slideDown(400);
	});
	$("#navigation").mouseleave(function() {
		$("#navigation .unfold").slideUp(500);
	});

	$("#add .hhandle_right").click(function() {
		$("#add .hunfold_right").toggle(300);
	});

	$(".sticky_keyword .hhandle").click(function() {
		$(this).parent().children(".hunfold").toggle(200);
	});
	$(".sticky_keyword").mouseleave(function() {
		$(this).children(".hunfold").hide(300);
	});
});
