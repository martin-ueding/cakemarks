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

		<?php if (count($keyword['ChildKeyword']) > 0): ?>
		<dt><?php __('Child Keywords'); ?></dt>
		<dd><ul>
			<?php foreach ($keyword['ChildKeyword'] as $childKeyword): ?>
			<li><?php echo $this->Html->link($childKeyword['title'], array('action' => 'view', $childKeyword['id'])); ?></li>
			<?php endforeach; ?>
		</ul></dd>
		<?php endif; ?>

		<dt><?php __('Related Bookmarks'); ?></dt>
		<dd><?php echo $this->element('bookmark_view',
			array('bookmarks' => $keyword)); ?></dd>

		<?php if ($keyword['Keyword']['created'] != "0000-00-00 00:00:00"): ?>
		<dt><?php __('Created'); ?></dt>
		<dd><?php echo $keyword['Keyword']['created']; ?></dd>
		<?php endif; ?>

		<?php if ($keyword['Keyword']['modified'] != "0000-00-00 00:00:00"): ?>
		<dt><?php __('Modified'); ?></dt>
		<dd><?php echo $keyword['Keyword']['modified']; ?></dd>
		<?php endif; ?>
	</dl>
</div>
