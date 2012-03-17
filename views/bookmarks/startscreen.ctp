<?php /* Copyright (c) 2011-2012 Martin Ueding <dev@martin-ueding.de> */ ?>

<?php echo $this->Html->script('search'); ?>

<div id="content">
	<h2><?php __('Startscreen'); ?></h2>

	<?php if (!empty($revisit)): ?>
	<?=$this->element('bookmarkbox',
		array('title' => __("Revisit", true), 'bookmarks' => $revisit))?>
	<?php endif; ?>

	<?php if (!empty($reading_list)): ?>
	<?=$this->element('bookmarkbox',
		array('title' => __("Reading List", true), 'bookmarks' => $reading_list))?>
	<?php endif; ?>
	<?=$this->element('bookmarkbox',
		array('title' => __("Most Visits", true), 'bookmarks' => $most_visits))?>
	<?=$this->element('bookmarkbox',
		array('title' => __("Recently Visited", true),
		'bookmarks' => $recently_visited))?>
	<?=$this->element('bookmarkbox',
		array('title' => __("Newest", true), 'bookmarks' => $newest))?>
</div>
