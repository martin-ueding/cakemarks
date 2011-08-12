<div class="bookmarks form">
<?php echo $this->Form->create('Bookmark');?>
	<fieldset>
 		<legend><?php __('Admin Edit Bookmark'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('url');
		echo $this->Form->input('Keyword');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Bookmark.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Bookmark.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Bookmarks', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Visits', true), array('controller' => 'visits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Visit', true), array('controller' => 'visits', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Keywords', true), array('controller' => 'keywords', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Keyword', true), array('controller' => 'keywords', 'action' => 'add')); ?> </li>
	</ul>
</div>