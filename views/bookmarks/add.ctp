<div class="bookmarks form">
	<h2><?php echo __('Add Bookmark', true); ?></h2>
	<?php echo $this->Form->create('Bookmark'); ?>
	<?php echo $this->Form->input('title', array('rows' => '1', 'cols' => '40')); ?>
	<?php echo $this->Form->input('url', array('rows' => '1', 'cols' => '40')); ?>
	<?php echo $this->Form->input('revisit'); ?>
	<?php echo $this->Form->input('reading_list'); ?>
	<?php echo $this->Form->input('Keyword', array('multiple' => 'checkbox')); ?>
	<?php echo $this->Form->input('Keyword.title'); ?>
	<div class="clearheinz"></div>
	<?php echo $this->Form->end(__('Submit', true)); ?>
</div>
