<div class="keywords form">
<?php echo $this->Form->create('Keyword');?>
	<fieldset>
 		<legend><?php __('Edit Keyword'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('sticky');
		echo $this->Form->input('Bookmark');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Keyword.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Keyword.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Keywords', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Keywords', true), array('controller' => 'keywords', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Keyword', true), array('controller' => 'keywords', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmarks', true), array('controller' => 'bookmarks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark', true), array('controller' => 'bookmarks', 'action' => 'add')); ?> </li>
	</ul>
</div>