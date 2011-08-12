<?PHP
// Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

__('This is a bookmarklet to put into your bookmarks. Whenever you are on a site that you want to bookmark, click it and you will get directed to the creation page.');
echo '<br /><br />';

$href = "javascript: location.href='http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']."?mode=edit&url='+escape(document.URL);";

# TODO fix this URL
echo '<a href="'.$href.'" class="bookmarklet">'.__('add bookmark', true).'</a>';

unset($href);

?>


