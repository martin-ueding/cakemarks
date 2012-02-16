<?php /* Copyright (c) 2011-2012 Martin Ueding <dev@martin-ueding.de> */ ?>

<?php $sticky_keywords = $this->requestAction(array('controller' => 'bookmarks', 'action' => 'sticky_keywords'), array('cache' => '+1 min')); ?>

<div id="sticky_keywords">
<h2>Sticky Keywords</h2>
<?php foreach ($sticky_keywords as $keyword): ?>
	<div class="sticky_keyword">
		<h3><?php echo $keyword['Keyword']['title']; ?></h3>
		<?php echo $this->element('bookmark_view', array('bookmarks' => $keyword['Bookmark'])); ?>
	</div>
<?php endforeach; ?>
</div>
