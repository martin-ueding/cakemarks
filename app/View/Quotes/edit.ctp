<div id="actions">
	<h2><?php echo __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('List Quotes'),
			array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Delete This Quote'),
			array('action' => 'delete', $this->Form->value('Quote.id')), null,
			sprintf(__('Are you sure you want to delete # %s?'),
			$this->Form->value('Quote.id'))); ?></li>
	</ul>
</div>

<div id="content" class="quotes_form">
	<h3><?php echo __('Edit Quote'); ?></h3>

	<?php echo $this->Form->create('Quote');?>
	<?php echo $this->Form->input('id'); ?>
	<?php echo $this->Form->input('text'); ?>
	<?php echo $this->Form->input('author'); ?>
	<?php echo $this->Form->end(__('Submit'));?>
</div>
