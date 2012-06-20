<?php /* Copyright © 2011-2012 Martin Ueding <dev@martin-ueding.de> */ ?>

<div id="actions">
	<h2><?php __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Keyword.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Keyword.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Keywords', true), array('action' => 'index'));?></li>
	</ul>
</div>

<div id="content" class="keywords_form">
	<h2><?php __('Edit Keyword'); ?></h2>
	<?php echo $this->Form->create('Keyword');?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('parent_id', array('options' => $parentKeywords, 'empty' => ''));
		echo $this->Form->input('sticky');
	?>
	<?php echo $this->Form->end(__('Submit', true));?>
</div>

