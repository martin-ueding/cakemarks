<?php /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<?php $sticky_keywords = $this->requestAction(array('controller' => 'bookmarks', 'action' => 'sticky_keywords'), array('cache' => '+5 min')); ?>

<div id="sticky_keywords">
<?php foreach ($sticky_keywords as $keyword): ?>
	<div class="sticky_keyword">
		<div class="hhandle"><?=$keyword['Keyword']['title']?></div>
		<div class="hunfold">
			<?php foreach ($keyword['Bookmark'] as $bookmark): ?>
			<?=$this->Html->link($bookmark['title'], array('controller' => 'bookmarks', 'action' => 'visit', $bookmark['id']), array('class' => 'black'))?>
			<?php endforeach; ?>
		</div>
	</div>
<?php endforeach; ?>
</div>
