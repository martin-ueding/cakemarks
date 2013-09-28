<?php /* Copyright © 2011-2012 Martin Ueding <dev@martin-ueding.de> */ ?>

<div id="actions">
	<h2><?php echo __('Actions'); ?></h2>
	<ul>

		<li><?php echo $this->Html->link(__('List Keywords'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Keywords'), array('controller' => 'keywords', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Keyword'), array('controller' => 'keywords', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmarks'), array('controller' => 'bookmarks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark'), array('controller' => 'bookmarks', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div id="content" class="keywords_form">
	<h2><?php echo __('Add Keyword'); ?></h2>

	<?php echo $this->Form->create('Keyword');?>
	<?php echo $this->Form->input('title'); ?>
	<?php echo $this->Form->input('parent_id', array('options' => $parentKeywords, 'empty' => '')); ?>
	<?php echo $this->Form->input('sticky'); ?>
	<?php echo $this->Form->input('Bookmark'); ?>
	<?php echo $this->Form->end(__('Submit'));?>
</div>
