<div class="quotes form">
<?php echo $this->Form->create('Quote');?>
	<fieldset>
 		<legend><?php __('Edit Quote'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('text');
		echo $this->Form->input('author');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Quote.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Quote.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Quotes', true), array('action' => 'index'));?></li>
	</ul>
</div>