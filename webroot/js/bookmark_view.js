
// Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

$(document).ready(function() {
	$("div.bookmark_element div.edit").hide(0);

	$("div.bookmark_element").mouseenter(function() {
		$(this).children("div.edit").show(0);
	});
	$("div.bookmark_element").mouseleave(function() {
		$(this).children("div.edit").hide(0);
	});
});
