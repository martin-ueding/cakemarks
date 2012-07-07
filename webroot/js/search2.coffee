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
