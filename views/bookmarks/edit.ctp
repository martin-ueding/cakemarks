<?php /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>
<div class="bookmarks form">
	<?php echo $this->Form->create('Bookmark'); ?>
	<legend><?php echo __('Edit Bookmark', true); ?></legend>
	<?php echo $this->Form->input('id'); ?>
	<?php echo $this->Form->input('title', array('rows' => '1', 'cols' => '40')); ?>
	<?php echo $this->Form->input('url', array('rows' => '1', 'cols' => '40')); ?>
	<?php echo $this->Form->input('revisit'); ?>
	<?php echo $this->Form->input('reading_list'); ?>
	<?php echo $this->Form->input('Keyword', array('multiple' => 'checkbox')); ?>
	<?php echo $this->Form->input('Keyword.title'); ?>
	<div class="clearheinz"></div>
	<?php echo $this->Form->end(__('Submit', true)); ?>


	<p class="delete"><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->data['Bookmark']['id']), null, sprintf(__('Are you sure you want to delete this bookmark?', true), $this->data['Bookmark']['id'])) ; ?></p>
</div>
