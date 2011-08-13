<div class="bookmarks form">
<?php echo $this->Form->create('Bookmark');?>
 		<legend><?php __('Edit Bookmark'); ?></legend>
	<?php
		echo $this->Form->input('title', array('rows' => '1', 'cols' => '40'));
		echo $this->Form->input('url', array('rows' => '1', 'cols' => '40'));
		echo $this->Form->input('revisit');
		echo $this->Form->input('reading_list');
		echo $this->Form->input('Keyword', array('multiple' => 'checkbox'));
		echo '<div class="clearheinz"></div>';
	?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
