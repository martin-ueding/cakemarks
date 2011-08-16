<? /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<div id="toolbar">
<div id="logo">
Cakemarks
</div>
<div id="navigation" class="toolbar_element">
	<div class="toolbar_unfold">
		<?=$this->Html->link(__('home page', true), array('controller' => 'bookmarks', 'action' => 'startscreen'))?>
		<hr />
		<?=$this->Html->link(__('new bookmark', true), array('controller' => 'bookmarks', 'action' => 'add'))?>
		<?=$this->Html->link(__('list bookmarks', true), array('controller' => 'bookmarks', 'action' => 'index'))?>
		<?=$this->Html->link(__('list quotes', true), array('controller' => 'quotes', 'action' => 'index'))?>
		<hr />
		<?=$this->Html->link(__('report a bug', true), "https://github.com/martin-ueding/cakemarks/issues/new")?>
		<?=$this->Html->link(__('check referrer', true), array('controller' => 'pages', 'action' => 'referrer'), array('rel' => 'noreferrer'))?>
		<?=$this->Html->link(__('bookmarklet', true), array('controller' => 'pages', 'action' => 'bookmarklet'))?>
	</div>
	<div class="toolbar_handle"><?=__('Navigation', true)?></div>
</div>
</div>
