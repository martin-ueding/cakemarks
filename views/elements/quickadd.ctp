<?php /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<div id="quickadd">
	<div class="form">
		<?php echo $this->Form->create('Bookmark', array('action' => 'add')); ?>
		<?php echo $this->Form->input('title', array('type'=>'text')); ?>
		<?php echo $this->Form->input('url', array('type'=>'text')); ?>
		<?php echo $this->Form->input('reading_list'); ?>
		<?php echo $this->Form->end(__('Create Bookmark', true)); ?>
	</div>
</div>
