<? /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<div id="sticky_keywords">
<? foreach ($sticky_keywords as $keyword): ?>
	<div class="sticky_keyword">
		<div class="hhandle"><?=$keyword['Keyword']['title']?></div>
		<div class="hunfold">
			<? foreach ($keyword['Bookmark'] as $bookmark): ?>
			<?=$this->Html->link($bookmark['title'], array('controller' => 'bookmarks', 'action' => 'visit', $bookmark['id']))?>
			<? endforeach; ?>
		</div>
	</div>
<? endforeach; ?>
</div>
