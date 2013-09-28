<?php /* Copyright © 2011-2012 Martin Ueding <dev@martin-ueding.de> */ ?>

<div id="quickadd">
	<h2><?php echo __('Quick Add'); ?></h2>
	<?php echo $this->Form->create('Bookmark', array('action' => 'add')); ?>
	<?php echo $this->Form->input('title', array('type'=>'text')); ?>
	<?php echo $this->Form->input('url', array('type'=>'text')); ?>
	<?php echo $this->Form->input('reading_list'); ?>
	<?php echo $this->Form->end(__('Create Bookmark')); ?>
</div>
