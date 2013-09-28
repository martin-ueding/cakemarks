<div id="actions">
	<h2><?php echo __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('List Quotes'),
			array('action' => 'index'));?></li>
	</ul>
</div>

<div id="content" class="quotes_form">
	<h2><?php echo __('Add Quote'); ?></h2>

	<?php echo $this->Form->create('Quote');?>
	<?php echo $this->Form->input('text'); ?>
	<?php echo $this->Form->input('author'); ?>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
