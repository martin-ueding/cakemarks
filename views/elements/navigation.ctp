<?php /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<div id="logo">
<h1>Cakemarks</h1>
</div>

<div id="navigation">
	<h2><?php __('Navigation'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('home page', true),
			array('controller' => 'bookmarks', 'action' => 'startscreen')); ?>
		</li>
		<li><?php echo $this->Html->link(__('new bookmark', true),
			array('controller' => 'bookmarks', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('list bookmarks', true),
			array('controller' => 'bookmarks', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('list quotes', true),
			array('controller' => 'quotes', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('report a bug', true),
			"https://github.com/martin-ueding/cakemarks/issues/new"); ?></li>
		<li><?php echo $this->Html->link(__('check referrer', true),
			array('controller' => 'pages', 'action' => 'referrer'),
			array('rel' => 'noreferrer')); ?></li>
		<li><?php echo $this->Html->link(__('bookmarklet', true),
			array('controller' => 'pages', 'action' => 'bookmarklet')); ?></li>
	</ul>
</div>
