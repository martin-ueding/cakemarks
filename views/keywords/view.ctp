<h1><?php echo $keyword['Keyword']['title']; ?></h1>

<?php echo $this->element('bookmark_view', array('bookmarks' => $keyword)); ?>


<div id="actions" class="toolbar_element">
	<div class="toolbar_unfold">
		<?php echo $this->Html->link(__('Edit Keyword', true), array('action' => 'edit', $keyword['Keyword']['id'])); ?>
		<?php echo $this->Html->link(__('Delete Keyword', true), array('action' => 'delete', $keyword['Keyword']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $keyword['Keyword']['id'])); ?>
		<?php echo $this->Html->link(__('New Keyword', true), array('action' => 'add')); ?>
	</div>
	<div class="toolbar_handle"><?php __('Actions'); ?></div>
</div>
