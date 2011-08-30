<div class="actions">
	<h2><?php __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('List Quotes', true),
			array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Delete This Quote', true),
			array('action' => 'delete', $this->Form->value('Quote.id')), null,
			sprintf(__('Are you sure you want to delete # %s?', true),
			$this->Form->value('Quote.id'))); ?></li>
	</ul>
</div>

<div class="quotes_form">
	<h3><?php __('Edit Quote'); ?></h3>

	<?php echo $this->Form->create('Quote');?>
	<?php echo $this->Form->input('id'); ?>
	<?php echo $this->Form->input('text'); ?>
	<?php echo $this->Form->input('author'); ?>
	<?php echo $this->Form->end(__('Submit', true));?>
</div>
