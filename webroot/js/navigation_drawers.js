// Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

$(document).ready(function() {
	$(".toolbar_handle").click(function() {
		$(this).parent().children(".toolbar_unfold").slideDown(300);
	});
	$(".toolbar_handle").parent().mouseleave(function() {
		$(this).children(".toolbar_unfold").slideUp(500);
	});

	$(".sticky_keyword .hhandle").click(function() {
		$(this).parent().parent().children("div.sticky_keyword").not($(this).parent()).children(".hunfold").slideUp(200);
		$(this).parent().children(".hunfold").slideDown(200);
	});
});
