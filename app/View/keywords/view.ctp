<?php /* Copyright © 2011-2012 Martin Ueding <dev@martin-ueding.de> */ ?>

<div id="actions">
	<h2><?php echo __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('New Keyword'),
			array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Edit Keyword'),
			array('action' => 'edit', $keyword['Keyword']['id'])); ?></li>
		<li><?php echo $this->Html->link(__('Delete Keyword'),
			array('action' => 'delete', $keyword['Keyword']['id']),
			null,
			sprintf(__('Are you sure you want to delete # %s?'),
			$keyword['Keyword']['id'])); ?></li>
	</ul>
</div>

<div id="content" class="keyword_view">
	<h2><?php echo __('View Keyword'); ?></h2>
	<dl>
		<dt><?php echo __('Title'); ?></dt>
		<dd><?php echo $keyword['Keyword']['title']; ?></dd>

		<dt><?php echo __('Parent Keyword'); ?></dt>
		<dd><?php echo $this->Html->link($keyword['ParentKeyword']['title'], array('action' => 'view', $keyword['ParentKeyword']['id'])); ?></dd>

		<?php if (count($keyword['ChildKeyword']) > 0): ?>
		<dt><?php echo __('Child Keywords'); ?></dt>
		<?php foreach ($keyword['ChildKeyword'] as $childKeyword): ?>
			<dd><?php echo $this->Html->link($childKeyword['title'], array('action' => 'view', $childKeyword['id'])); ?></dd>
		<?php endforeach; ?>
		<?php endif; ?>

		<dt><?php echo __('Related Bookmarks'); ?></dt>
		<?php echo $this->element('bookmark_view',
			array('bookmarks' => $keyword, 'wrapper' => 'dd')); ?>

		<?php if ($keyword['Keyword']['created'] != "0000-00-00 00:00:00"): ?>
		<dt><?php echo __('Created'); ?></dt>
		<dd><?php echo $keyword['Keyword']['created']; ?></dd>
		<?php endif; ?>

		<?php if ($keyword['Keyword']['modified'] != "0000-00-00 00:00:00"): ?>
		<dt><?php echo __('Modified'); ?></dt>
		<dd><?php echo $keyword['Keyword']['modified']; ?></dd>
		<?php endif; ?>
	</dl>
</div>
