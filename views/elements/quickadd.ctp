<? /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<div id="quickadd">
	<div class="form">
		<?=$this->Form->create('Bookmark', array('action' => 'add'))?>
		<?=$this->Form->input('title', array('rows' => '1', 'cols' => '20'))?>
		<?=$this->Form->input('url', array('rows' => '1', 'cols' => '20'))?>
		<?=$this->Form->input('reading_list')?>
		<?=$this->Form->end(__('Create Bookmark', true))?>
	</div>
</div>
