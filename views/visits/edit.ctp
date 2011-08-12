<div class="visits form">
<?php echo $this->Form->create('Visit');?>
	<fieldset>
 		<legend><?php __('Edit Visit'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('bookmark_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Visit.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Visit.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Visits', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Bookmarks', true), array('controller' => 'bookmarks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark', true), array('controller' => 'bookmarks', 'action' => 'add')); ?> </li>
	</ul>
</div>