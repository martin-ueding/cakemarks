<? /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<div class="bookmarks_view">
<h2><?php  __('Bookmark');?></h2>
<p class="title"><?=$bookmark['Bookmark']['title']?></p>
<p class="url"><?=$this->Html->link($bookmark['Bookmark']['url'], array('action' => 'visit', $bookmark['Bookmark']['id']))?></p>


<?php
if (!empty($bookmark['Bookmark']['revisit'])) {
	// TODO i18n
	echo 'revisit every '.$bookmark['Bookmark']['revisit'].' hours';
}

?>
<? if ($bookmark['Bookmark']['reading_list']): ?>
	<p class="reading_list">This is on your reading list.</p>
<? endif; ?>

<h3><? __('Keywords');?></h3>
<ul>
<? foreach ($bookmark['Keyword'] as $keyword): ?>
	<li>
	<?=$this->Html->link($keyword['title'], array('controller' => 'keywords', 'action' => 'view', $keyword['id'])) ?>
	</li>
<? endforeach; ?>
</ul>

<?=$this->Html->link(__('edit', true), array('action' => 'edit', $bookmark['Bookmark']['id']))?>

<p class="created"><?=__('Created', true)?>: <?=$bookmark['Bookmark']['created']?></p>
<p class="modified"><?=__('Modified', true)?>: <?=$bookmark['Bookmark']['modified']?></p>
