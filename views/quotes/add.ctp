<div class="actions">
	<h2><?php __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('List Quotes', true),
			array('action' => 'index'));?></li>
	</ul>
</div>

<div class="quotes_form">
	<h2><?php __('Add Quote'); ?></h2>

	<?php echo $this->Form->create('Quote');?>
	<?php echo $this->Form->input('text'); ?>
	<?php echo $this->Form->input('author'); ?>
	<?php echo $this->Form->end(__('Submit', true)); ?>
</div>
