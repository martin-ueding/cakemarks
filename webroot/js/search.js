// Copyright © 2012 Martin Ueding <dev@martin-ueding.de>

var animationTime = 300;

var currentData = [];
var animationActive = false;
var ajaxActive = false;

var searchMain = function () {
	showField();
	attachListener();
};

var showField = function () {
	console.debug('showField()');
	$('#navigation').after('<div id="search"><input id="search_input" type="text" /></div>');
};

var attachListener = function () {
	console.debug('attachListener()');
	$('#search_input').keyup(formChanged);
};

var formChanged = function () {
	console.debug('formChanged()');
	var input = $(this);
	var query = $(this).val();
	hideResultPane();
	performQuery(query);
};

var performQuery = function (query) {
	console.debug('perfomQuery()');
	ajaxActive = true;
	$.ajax({
		dataType: 'json',
		success: querySuccess,
		type: 'GET',
		url: 'bookmarks/search/'+query,
	});
};

var querySuccess = function (data, textStatus, jqXHR) {
	console.debug('querySuccess()');
	ajaxActive = false;
	console.debug(data);
	currentData = data;
	updateResultPane();
};

var initResultPane = function () {
	console.debug('initResultPane()');
	if ($('#search_result_pane').length == 0) {
		$('#search').append('<div id="search_result_pane"></div>');
		$('#search_result_pane').slideUp(0);
	}
};

var hideResultPane = function () {
	console.debug('hideResultPane()');
	if ($('#search_result_pane').length > 0) {
		animationActive = true;
		$('#search_result_pane').slideUp(animationTime, animationDone);
	}
};

var updateResultPane = function () {
	console.debug('updateResultPane()');

	if (ajaxActive || animationActive) {
		console.debug('updateResultPane(): Quitting since active.');
		return;
	}

	initResultPane();
	var searchResultPane = $('#search_result_pane');
	searchResultPane.html(formatResults(currentData));
	searchResultPane.slideDown(animationTime);
};

var animationDone = function () {
	console.debug('animationDone()');
	animationActive = false;
	updateResultPane();
};

var formatResults = function (data) {
	console.debug('formatResults()');
	var parts = [];

	// TODO Limit this in PHP, and not here to save transfer time.
	for (var rowNum = 0; rowNum < data.length && rowNum < 10; rowNum++) {
		var row = data[rowNum];
		var hitTarget = 'bookmarks/visit/'+row.Bookmark.id
		parts.push('<li class="search_entry">');
		parts.push('<a class="title" href="'+hitTarget+'">');
		parts.push(row.Bookmark.title);
		parts.push('</a>');
		parts.push('<a class="url" href="'+hitTarget+'">');
		parts.push(row.Bookmark.url);
		parts.push('</a>');
		parts.push('</li>');
	}

	var result = '<ul>'+parts.join('')+'</ul>';
	console.debug(result);
	return result;
};

$(searchMain);
