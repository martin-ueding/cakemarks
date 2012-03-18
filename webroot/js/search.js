// Copyright © 2012 Martin Ueding <dev@martin-ueding.de>

var animationTime = 300;

/**
 * The time that has to elapse since the last AJAX event was sent off.
 */
var idleTime = 500;
var ajaxTimeout = 1000;

var ajaxActive = false;
var animationActive = false;
var currentData = [];
var currentQuery = "";
var currentSelection = 0;
var lastAjax = 0;
var lastChange = 0;

/**
 * Initializes the search.
 */
var searchMain = function () {
	showField();
	attachListener();
};

var isAjaxActive = function () {
	console.debug('isAjaxActive()');
	var now = new Date().getTime();
	if (now - lastAjax > ajaxTimeout) {
		console.debug('isAjaxActive(): Timeout reached.');
		ajaxActive = false;
		return false;
	}
	else {
		console.debug('isAjaxActive(): Returning variable.');
		return ajaxActive;
	}
}

/**
 * Inserts the search field into the DOM and focuses it.
 */
var showField = function () {
	console.debug('showField()');
	$('#navigation').after('<div id="search"><input id="search_input" type="text" /></div>');
	$('#search_input').focus();
	//$('#search_input').focusout(exitSearch);
};

/**
 * Attaches the listeners to the search input field.
 */
var attachListener = function () {
	console.debug('attachListener()');
	$('#search_input').keyup(formChanged);
};

/**
 * This is called whenever the input has changed.
 *
 * It does not necessarily fire off an AJAX request if the last one was just a
 * little time ago.
 */
var formChanged = function () {
	console.debug('formChanged()');
	var newQuery = $(this).val();
	if (newQuery == currentQuery) {
		console.debug('formChanged(): Query did not change, abort.');
		return;
	}
	currentQuery = newQuery;
	lastChange = new Date().getTime();
	waitToQuery();
};

/**
 * Checks whether another AJAX request can be performed. Otherwise this
 * function will wait and call itself again.
 */
var waitToQuery = function () {
	console.debug('waitToQuery()');

	if (isAjaxActive()) {
		console.debug('waitToQuery(): AJAX still active, abort.');
		return;
	}

	var now = new Date().getTime();
	var elapsed = now - lastChange;

	if (elapsed > idleTime) {
		console.debug('waitToQuery(): Performing update.');
		hideResultPane();
		performQuery();
	}
	else {
		var toWait = idleTime - elapsed;
		console.debug('waitToQuery(): Still have to wait '+toWait+'.');
		setTimeout(waitToQuery, toWait);
	}
};

/**
 * Performs the actual AJAX request and queries the database.
 */
var performQuery = function () {
	console.debug('perfomQuery()');
	ajaxActive = true;
	lastAjax = new Date().getTime();
	$.ajax({
		dataType: 'json',
		success: querySuccess,
		type: 'GET',
		url: 'bookmarks/search/'+currentQuery,
	});
};

/**
 * This is called when the AJAX request suceeds.
 */
var querySuccess = function (data, textStatus, jqXHR) {
	console.debug('querySuccess()');
	ajaxActive = false;
	console.debug(data);
	currentData = data;
	updateResultPane();
};

var ajaxError = function (data, textStatus, jqXHR) {
	console.debug('ajaxError()');
	ajaxActive = false;
};

/**
 * Initializes the result pane, creates it if needed.
 */
var initResultPane = function () {
	console.debug('initResultPane()');
	if ($('#search_result_pane').length == 0) {
		$('#search').append('<div id="search_result_pane"></div>');
		$('#search_result_pane').slideUp(0);
	}
};

/**
 * Hides the result pane. When the animation is done, the ``animationDone()``
 * will be called.
 */
var hideResultPane = function () {
	console.debug('hideResultPane()');
	if ($('#search_result_pane').length > 0) {
		animationActive = true;
		$('#search_result_pane').slideUp(animationTime, animationDone);
	}
};

/**
 * Inserts the current data into the results pane and slides it down.
 */
var updateResultPane = function () {
	console.debug('updateResultPane()');

	if (ajaxActive || animationActive) {
		console.debug('updateResultPane(): Quitting since active.');
		return;
	}

	if (currentData === null) {
		console.debug('updateResultPane(): currentData is null');
		return;
	}

	initResultPane();
	var searchResultPane = $('#search_result_pane');
	currentSelection = 0;
	searchResultPane.html(formatResults(currentData));
	searchResultPane.slideDown(animationTime);
};

/**
 * Called when the slide up animation is done.
 */
var animationDone = function () {
	console.debug('animationDone()');
	animationActive = false;
	updateResultPane();
};

/**
 * Formats the results.
 *
 * @param data Data from database.
 * @return HTML string.
 */
var formatResults = function (data) {
	console.debug('formatResults()');
	var parts = [];

	for (var rowNum = 0; rowNum < data.length; rowNum++) {
		var row = data[rowNum];
		var hitTarget = 'bookmarks/visit/'+row.Bookmark.id;
		var viewTarget = 'bookmarks/view/'+row.Bookmark.id;

		parts.push('<li class="search_entry">');
		parts.push('<a class="title" href="'+hitTarget+'">');
		parts.push(row.Bookmark.title);
		parts.push('</a>');
		parts.push('<div class="title_view">');
		parts.push('<a class="url" href="'+hitTarget+'">');
		parts.push(row.Bookmark.url);
		parts.push('</a>');
		parts.push('<a class="view" href="'+viewTarget+'">');
		// TODO I18n.
		parts.push('view');
		parts.push('</a>');
		parts.push('</div>');
		parts.push('</li>');
	}

	var result = '<ul>'+parts.join('')+'</ul>';
	console.debug(result);
	return result;
};

/**
 * Deletes the cached data and hides the result pane.
 */
var exitSearch = function () {
	currentData = null;
	hideResultPane();
};

$(searchMain);
