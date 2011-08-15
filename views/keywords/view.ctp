<div id="keyword_tree">
<?=$this->element('keyword_tree', array('keywords' => $keyword_tree, 'show_edit' => false))?>
</div>

<div class="keywords view">
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


<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Keyword', true), array('action' => 'edit', $keyword['Keyword']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Keyword', true), array('action' => 'delete', $keyword['Keyword']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $keyword['Keyword']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Keywords', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Keyword', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Keywords', true), array('controller' => 'keywords', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Keyword', true), array('controller' => 'keywords', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmarks', true), array('controller' => 'bookmarks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark', true), array('controller' => 'bookmarks', 'action' => 'add')); ?> </li>
	</ul>
</div>
