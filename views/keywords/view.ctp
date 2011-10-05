<?php /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<div id="actions">
	<h2><?php __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('New Keyword', true),
			array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Edit Keyword', true),
			array('action' => 'edit', $keyword['Keyword']['id'])); ?></li>
		<li><?php echo $this->Html->link(__('Delete Keyword', true),
			array('action' => 'delete', $keyword['Keyword']['id']),
			null,
			sprintf(__('Are you sure you want to delete # %s?', true),
			$keyword['Keyword']['id'])); ?></li>
	</ul>
</div>

<div id="content" class="keyword_view">
	<h2><?php __('View Keyword'); ?></h2>
	<dl>
		<dt><?php __('Title'); ?></dt>
		<dd><?php echo $keyword['Keyword']['title']; ?></dd>

		<dt><?php __('Parent Keyword'); ?></dt>
		<dd><?php echo $this->Html->link($keyword['ParentKeyword']['title'], array('action' => 'view', $keyword['ParentKeyword']['id'])); ?></dd>

		<dt><?php __('Related Bookmarks'); ?></dt>
		<dd><?php echo $this->element('bookmark_view',
			array('bookmarks' => $keyword)); ?></dd>

		<dt><?php __('Created'); ?></dt>
		<dd><?php echo $keyword['Keyword']['created']; ?></dd>

		<dt><?php __('Modified'); ?></dt>
		<dd><?php echo $keyword['Keyword']['modified']; ?></dd>
	</dl>
</div>
