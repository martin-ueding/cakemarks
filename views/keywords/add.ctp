<?php /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<div class="actions">
	<h2><?php __('Actions'); ?></h2>
	<ul>

		<li><?php echo $this->Html->link(__('List Keywords', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Keywords', true), array('controller' => 'keywords', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Keyword', true), array('controller' => 'keywords', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmarks', true), array('controller' => 'bookmarks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark', true), array('controller' => 'bookmarks', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div id="content" class="keywords_form">
	<h2><?php __('Add Keyword'); ?></h2>

	<?php echo $this->Form->create('Keyword');?>
	<?php echo $this->Form->input('title'); ?>
	<?php echo $this->Form->input('parent_id'); ?>
	<?php echo $this->Form->input('sticky'); ?>
	<?php echo $this->Form->input('Bookmark'); ?>
	<?php echo $this->Form->end(__('Submit', true));?>
</div>
