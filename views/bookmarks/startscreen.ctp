<? /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<?=$this->element('quote', array('quote' => $quote['Quote']))?>

<?=$this->element('sticky_keywords', array('sticky_keywords' => $sticky_keywords, 'stats' => $stats))?>

<?=$this->element('bookmarkbox', array('title' => __("reading list", true), 'bookmarks' => $reading_list))?>
<?=$this->element('bookmarkbox', array('title' => __("most visits", true), 'bookmarks' => $most_visits))?>
<?=$this->element('bookmarkbox', array('title' => __("recently visited", true), 'bookmarks' => $recently_visited))?>
<?=$this->element('bookmarkbox', array('title' => __("newest", true), 'bookmarks' => $newest))?>
