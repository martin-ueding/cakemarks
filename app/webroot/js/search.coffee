# Copyright © 2012-2013 Martin Ueding <dev@martin-ueding.de>
# Licensed under the MIT License (http://www.opensource.org/licenses/mit-license.php).

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

# Initializes the search.
searchMain = ->
    showField()
    attachListener()

# Checks whether there is an AJAX request pending.
isAjaxActive = ->
    now = new Date().getTime()
    if now - lastAjax > ajaxTimeout
        ajaxActive = false
        false
    else
        ajaxActive

# Inserts the search field into the DOM and focuses it.
showField = ->
    $('#navigation').after '<div id="search"><input id="search_input" name="data[query]" type="text" autocomplete="off" /></div>'
    $('#search_input').focus()

# Attaches the listeners to the search input field.
attachListener = ->
    $('#search_input').keyup formChanged
    $('#search_input').keydown keyDown

# This is called whenever the input has changed.
#
# It does not necessarily fire off an AJAX request if the last one was just a
# little time ago.
formChanged = ->
    newQuery = $(this).val()

    if newQuery == currentQuery
        return

    currentQuery = newQuery
    lastChange = new Date().getTime()
    waitToQuery()

# Checks whether another AJAX request can be performed. Otherwise this
# function will wait and call itself again.
waitToQuery = ->
    if isAjaxActive()
        return

    now = new Date().getTime()
    elapsed = now - lastChange

    if (elapsed > idleTime)
        hideResultPane()
        performQuery()
    else
        toWait = idleTime - elapsed
        setTimeout waitToQuery, toWait

# Performs the actual AJAX request and queries the database.
performQuery = ->
    ajaxActive = true
    lastAjax = new Date().getTime()
    $.ajax({
        dataType: 'json',
        success: querySuccess,
        type: 'GET',
        url: 'bookmarks/ajaxsearch/'+currentQuery,
    })

# This is called when the AJAX request suceeds.
#
# @param data Search results from the server.
querySuccess = (data, textStatus, jqXHR) ->
    ajaxActive = false
    currentData = data
    updateResultPane()

ajaxError = (data, textStatus, jqXHR) ->
    ajaxActive = false

# Initializes the result pane, creates it if needed.
initResultPane = ->
    if $('#search_result_pane').length == 0
        $('#search').append('<div id="search_result_pane"></div>')
        $('#search_result_pane').slideUp(0)

# Hides the result pane. When the animation is done, the ``animationDone()``
# will be called.
hideResultPane = ->
    if $('#search_result_pane').length > 0
        animationActive = true
        $('#search_result_pane').slideUp(animationTime, animationDone)

# Inserts the current data into the results pane and slides it down.
updateResultPane = ->
    if ajaxActive || animationActive
        return

    if currentData is null
        return

    initResultPane()
    searchResultPane = $('#search_result_pane')
    currentSelection = 0
    searchResultPane.html(formatResults(currentData))
    moveSelection 0
    searchResultPane.slideDown animationTime

# Called when the slide up animation is done.
animationDone = ->
    animationActive = false
    updateResultPane()

# Formats the results.
#
# @param data Data from database.
# @return HTML string.
formatResults = (data) ->
    parts = []

    for row in data
        hitTarget = 'bookmarks/visit/'+row.Bookmark.id
        viewTarget = 'bookmarks/view/'+row.Bookmark.id

        parts.push('<li class="search_entry">')
        parts.push('<a class="title" href="'+hitTarget+'">')
        parts.push('<strong>')
        parts.push(row.Bookmark.title)
        parts.push('</strong>')
        parts.push(' – ')
        parts.push(row.Bookmark.url)
        parts.push('</a>')
        parts.push('<a class="view" href="'+viewTarget+'">')
        # TODO I18n.
        parts.push('view')
        parts.push('</a>')
        parts.push('</li>')

    '<ul>'+parts.join('')+'</ul>'

# Deletes the cached data and hides the result pane.
exitSearch = ->
    currentData = null
    hideResultPane()

# Handles the keydown event in the search field.
#
# @param e Key event.
keyDown = (e) ->
    switch e.keyCode
        when 38
            moveUp()
        when 40
            moveDown()
        when 13
            visitSelected()

# Moves the selection up one step.
moveUp = ->
    moveSelection(-1)

# Moves the selection down one step.
moveDown = ->
    moveSelection(1)

# Moves the selection the given steps.
#
# @param steps Positive or negative step number.
moveSelection = (steps) ->
    entries = $('li.search_entry')
    entryCount = entries.length
    newSelection = currentSelection + steps
    if 0 <= newSelection < entryCount
        $(entries[currentSelection]).removeClass('selected')
        $(entries[newSelection]).addClass('selected')
        currentSelection = newSelection

# Points the browser to the currently selected URL.
visitSelected = ->
    entries = $('li.search_entry')
    entry = $(entries[currentSelection])
    titleLink = entry.children('a.title')
    url = titleLink.attr('href')
    # TODO Make sure the referrer is not sent.
    window.location = url

$(searchMain)
