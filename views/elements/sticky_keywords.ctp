<?php /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<?php $sticky_keywords = $this->requestAction(array('controller' => 'bookmarks', 'action' => 'sticky_keywords'), array('cache' => '+5 min')); ?>

<div id="sticky_keywords">
<h2>Sticky Keywords</h2>
<?php foreach ($sticky_keywords as $keyword): ?>
	<div class="sticky_keyword">
		<h3><?php echo $keyword['Keyword']['title']; ?></h3>
		<ul>
			<?php foreach ($keyword['Bookmark'] as $bookmark): ?>
			<li><?php echo $this->Html->link($bookmark['title'], array('controller' => 'bookmarks', 'action' => 'visit', $bookmark['id']), array('class' => 'black')); ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php endforeach; ?>
</div>
