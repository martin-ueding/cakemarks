// Copyright © 2012 Martin Ueding <dev@martin-ueding.de>
// Licensed under the MIT License (http://www.opensource.org/licenses/mit-license.php).

/**
 * Time for the scroll up and down animation. In ms.
 */
var animationTime = 300;

/**
 * The time before an AJAX request is sent off. This prevents that a request
 * for every single keystroke is sent.
 */
var idleTime = 500;

/**
 * Timeout for AJAX request. If this time is over, the ``ajaxActive`` flag is
 * ignored. In ms.
 */
var ajaxTimeout = 1000;

/**
 * Whether an AJAX request is active.
 */
var ajaxActive = false;

/**
 * Whether the scroll up animation is active.
 */
var animationActive = false;

/**
 * The last data that the server sent.
 */
var currentData = [];

/**
 * Currently entered search query.
 */
var currentQuery = "";

/**
 * Currently selected result.
 */
var currentSelection = 0;

/**
 * Last AJAX request sent off. Timestamp in ms.
 */
var lastAjax = 0;

/**
 * Last change to the input field. Timestamp in ms.
 */
var lastChange = 0;

/**
 * Initializes the search.
 */
var searchMain = function () {
	showField();
	attachListener();
};

/**
 * Checks whether there is an AJAX request pending.
 */
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
	$('#search_input').keydown(keyDown);
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
 *
 * @param data Search results from the server.
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
	moveSelection(0);
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
		parts.push('<strong>');
		parts.push(row.Bookmark.title);
		parts.push('</strong>');
		parts.push(' – ');
		parts.push(row.Bookmark.url);
		parts.push('</a>');
		parts.push('<a class="view" href="'+viewTarget+'">');
		// TODO I18n.
		parts.push('view');
		parts.push('</a>');
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
	console.debug('exitSearch()');
	currentData = null;
	hideResultPane();
};

/**
 * Handles the keydown event in the search field.
 *
 * @param e Key event.
 */
var keyDown = function (e) {
	console.debug('keyDown()');
	switch(e.keyCode) {
		case 38:
			moveUp();
			break;
		case 40:
			moveDown();
			break;
		case 13:
			visitSelected();
			break;
	}
};

/**
 * Moves the selection up one step.
 */
var moveUp = function () {
	console.debug('moveUp()');
	moveSelection(-1);
};

/**
 * Moves the selection down one step.
 */
var moveDown = function () {
	console.debug('moveDown()');
	moveSelection(1);
};

/**
 * Moves the selection the given steps.
 *
 * @param steps Positive or negative step number.
 */
var moveSelection = function (steps) {
	console.debug('moveSelection()');
	var entries = $('li.search_entry');
	console.debug(entries);
	var entryCount = entries.length;
	var newSelection = currentSelection + steps;
	if (0 <= newSelection && newSelection < entryCount) {
		$(entries[currentSelection]).removeClass('selected');
		$(entries[newSelection]).addClass('selected');
		currentSelection = newSelection;
	}
};

/**
 * Points the browser to the currently selected URL.
 */
var visitSelected = function () {
	console.debug('visitSelected()');
	var entries = $('li.search_entry');
	var entry = $(entries[currentSelection]);
	var titleLink = entry.children('a.title');
	console.debug('visitSelected(): titleLink '+titleLink);
	var url = titleLink.attr('href');
	console.debug('visitSelected(): Going to '+url);
	// TODO Make sure the referrer is not sent.
	window.location = url;
};

$(searchMain);
