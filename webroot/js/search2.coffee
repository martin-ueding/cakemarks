# Copyright © 2012 Martin Ueding <dev@martin-ueding.de>

# Time for the scroll up and down animation. In ms.
animationTime = 300

# The time before an AJAX request is sent off. This prevents that a request
# for every single keystroke is sent.
idleTime = 500

# Timeout for AJAX request. If this time is over, the ``ajaxActive`` flag is
# ignored. In ms.
ajaxTimeout = 1000

# Whether an AJAX request is active.
ajaxActive = false

# Whether the scroll up animation is active.
animationActive = false

# The last data that the server sent.
currentData = []

# Currently entered search query.
currentQuery = ""

# Currently selected result.
currentSelection = 0

# Last AJAX request sent off. Timestamp in ms.
lastAjax = 0

# Last change to the input field. Timestamp in ms.
lastChange = 0

searchMain = () ->
	showField()
	attachListener()

isAjaxActive () ->
	console.debug "isAjaxActive()"
	now = new Date().getTime()
	if now - lastAjax > ajaxTimeout
		console.debug "isAjaxActive(): Timeout reached."
		ajaxActive = false
		false
	else
		console.debug "isAjaxActive(): Returning variable."
		ajaxActive

showField = () ->
	console.debug 'showField()'
	$('#navigation').after '<div id="search"><input id="search_input" type="text" /></div>'
	$('#search_input').focus()

attachListener = () ->
	console.debug 'attachListener()'
	$('#search_input').keyup formChanged
	$('#search_input').keydown keyDown

formChanged = () ->
	console.debug 'formChanged()'
	newQuery = $(this).val()

	if newQuery == currentQuery
		console.debug 'formChanged(): Query did not change, abort.'
		return

	currentQuery = newQuery
	lastChange = new Date().getTime()
	waitToQuery()

waitToQuery = () ->
	console.debug 'waitToQuery()'

	if isAjaxActive()
		console.debug 'waitToQuery(): AJAX still active, abort.'
		return

	now = new Date().getTime()
	elapsed = now - lastChange

	if (elapsed > idleTime)
		console.debug 'waitToQuery(): Performing update.'
		hideResultPane()
		performQuery()
	else
		toWait = idleTime - elapsed
		console.debug 'waitToQuery(): Still have to wait '+toWait+'.'
		setTimeout waitToQuery, toWait
