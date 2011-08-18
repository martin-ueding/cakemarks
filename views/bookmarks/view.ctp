<?php /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<h1><?=$bookmark['Bookmark']['title']?></h1>
<p class="url"><?=$this->Html->link($bookmark['Bookmark']['url'], array('action' => 'visit', $bookmark['Bookmark']['id']))?></p>


<?php
if (!empty($bookmark['Bookmark']['revisit'])) {
	// TODO i18n
	echo 'revisit every '.$bookmark['Bookmark']['revisit'].' hours';
}

?>
<?php if ($bookmark['Bookmark']['reading_list']): ?>
	<p class="reading_list">This is on your reading list.</p>
<?php endif; ?>

	<div class="small_tag">
<?php foreach ($bookmark['Keyword'] as $keyword): ?>
	<?=$this->Html->link($keyword['title'], array('controller' => 'keywords', 'action' => 'view', $keyword['id']), array('class' => 'black')) ?>
<?php endforeach; ?>
	</div>

<p class="created"><?=__('Created', true)?>: <?=$bookmark['Bookmark']['created']?></p>
<p class="modified"><?=__('Modified', true)?>: <?=$bookmark['Bookmark']['modified']?></p>

<div id="actions" class="toolbar_element">
	<div class="toolbar_unfold">
		<?=$this->Html->link(__('Edit Bookmark', true), array('action' => 'edit', $bookmark['Bookmark']['id']))?>
		<?php echo $this->Html->link(__('Delete Bookmark', true), array('action' => 'delete', $bookmark['Bookmark']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $bookmark['Bookmark']['id'])); ?>
		<?php echo $this->Html->link(__('New Bookmark', true), array('action' => 'add')); ?>
	</div>
	<div class="toolbar_handle"><?php __('Actions'); ?></div>
</div>
