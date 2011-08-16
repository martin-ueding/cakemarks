// Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

$(document).ready(function() {
	$(".toolbar_handle").click(function() {
		$(this).parent().children(".toolbar_unfold").slideDown(400);
	});
	$(".toolbar_handle").parent().mouseleave(function() {
		$(this).children(".toolbar_unfold").slideUp(500);
	});

	$(".sticky_keyword .hhandle").click(function() {
		$(this).parent().children(".hunfold").toggle(200);
	});
	$(".sticky_keyword").mouseleave(function() {
		$(this).children(".hunfold").hide(300);
	});
});
