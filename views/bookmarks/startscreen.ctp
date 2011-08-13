<?PHP
// Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

echo $this->element('quote', array('quote' => $quote['Quote']));

echo $this->element('sticky_keywords', array('sticky_keywords' => $sticky_keywords, 'stats' => $stats));

echo $this->element('bookmarkbox', array('title' => __("reading list", true), 'bookmarks' => $reading_list));
echo $this->element('bookmarkbox', array('title' => __("newest", true), 'bookmarks' => $newest));
echo $this->element('bookmarkbox', array('title' => __("most visits", true), 'bookmarks' => $most_visits));
echo $this->element('bookmarkbox', array('title' => __("recently visited", true), 'bookmarks' => $recently_visited));

?>
