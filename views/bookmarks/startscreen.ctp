<?php /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<?php if (!empty($revisit)): ?>
<?=$this->element('bookmarkbox',
	array('title' => __("revisit", true), 'bookmarks' => $revisit))?>
<?php endif; ?>

<?=$this->element('bookmarkbox',
	array('title' => __("reading list", true), 'bookmarks' => $reading_list))?>
<?=$this->element('bookmarkbox',
	array('title' => __("most visits", true), 'bookmarks' => $most_visits))?>
<?=$this->element('bookmarkbox',
	array('title' => __("recently visited", true),
	'bookmarks' => $recently_visited))?>
<?=$this->element('bookmarkbox',
	array('title' => __("newest", true), 'bookmarks' => $newest))?>
