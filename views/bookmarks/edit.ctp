<div class="bookmarks form">
	<?=$this->Form->create('Bookmark')?>
	<legend><?=__('Edit Bookmark', true)?></legend>
	<?=$this->Form->input('id')?>
	<?=$this->Form->input('title', array('rows' => '1', 'cols' => '40'))?>
	<?=$this->Form->input('url', array('rows' => '1', 'cols' => '40'))?>
	<?=$this->Form->input('revisit')?>
	<?=$this->Form->input('reading_list')?>
	<?=$this->Form->input('Keyword', array('multiple' => 'checkbox'))?>
	<div class="clearheinz"></div>
	<?=$this->Form->end(__('Submit', true))?>
</div>
