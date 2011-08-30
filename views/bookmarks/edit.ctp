<?php /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<div id="actions">
	<h2><?php __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('Delete this bookmark', true),
			array('action' => 'delete', $this->data['Bookmark']['id']),
			null,
			sprintf(__('Are you sure you want to delete this bookmark?', true),
			$this->data['Bookmark']['id'])) ; ?></li>
	</ul>
</div>

<div class="bookmarks_form">
	<h2><?php echo __('Edit Bookmark', true); ?></h2>

	<?php echo $this->Form->create('Bookmark'); ?>
	<?php echo $this->Form->input('id'); ?>
	<?php echo $this->Form->input('title',
		array('rows' => '1', 'cols' => '40')); ?>
	<?php echo $this->Form->input('url',
		array('rows' => '1', 'cols' => '40')); ?>
	<?php echo $this->Form->input('revisit'); ?>
	<?php echo $this->Form->input('reading_list'); ?>
	<?php echo $this->Form->input('Keyword',
		array('multiple' => 'checkbox')); ?>
	<?php echo $this->Form->input('Keyword.title',
		array('label' => __('new keyword', true))); ?>
	<?php echo $this->Form->end(__('Submit', true)); ?>
</div>
