<h2><?php  __('Keyword');?></h2>
			<?php echo $keyword['Keyword']['title']; ?>

	<?php if (!empty($keyword['Bookmark'])):?>
		<hr />
	<?php
		foreach ($keyword['Bookmark'] as $bookmark):
		?>
				<?php echo $this->Html->link($bookmark['title'], array('controller' => 'bookmarks', 'action' => 'visit', $bookmark['id'])); ?>
		<br />
	<?php endforeach; ?>
<?php endif; ?>


<div id="actions" class="toolbar_element">
	<div class="toolbar_unfold">
		<?php echo $this->Html->link(__('Edit Keyword', true), array('action' => 'edit', $keyword['Keyword']['id'])); ?>
		<?php echo $this->Html->link(__('Delete Keyword', true), array('action' => 'delete', $keyword['Keyword']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $keyword['Keyword']['id'])); ?>
		<?php echo $this->Html->link(__('List Keywords', true), array('action' => 'index')); ?>
		<?php echo $this->Html->link(__('New Keyword', true), array('action' => 'add')); ?>
		<?php echo $this->Html->link(__('List Keywords', true), array('controller' => 'keywords', 'action' => 'index')); ?>
		<?php echo $this->Html->link(__('New Parent Keyword', true), array('controller' => 'keywords', 'action' => 'add')); ?>
		<?php echo $this->Html->link(__('List Bookmarks', true), array('controller' => 'bookmarks', 'action' => 'index')); ?>
		<?php echo $this->Html->link(__('New Bookmark', true), array('controller' => 'bookmarks', 'action' => 'add')); ?>
	</div>
	<div class="toolbar_handle"><?php __('Actions'); ?></div>
</div>
