<?php /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<div id="actions">
	<h2><?php __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bookmark', true), array('action' => 'edit', $bookmark['Bookmark']['id'])); ?></li>
		<li><?php echo $this->Html->link(__('Delete Bookmark', true), array('action' => 'delete', $bookmark['Bookmark']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $bookmark['Bookmark']['id'])); ?></li>
		<li><?php echo $this->Html->link(__('New Bookmark', true), array('action' => 'add')); ?></li>
	</ul>
</div>

<div class="bookmark_view">
	<h2><?php __('View Bookmark'); ?></h2>

	<dl>
	<dt><?php __('Title'); ?></dt>
	<dd><?php echo $bookmark['Bookmark']['title']; ?></p>

	<dt><?php __('URL'); ?></dt>
	<dd><?php echo $this->Html->link($bookmark['Bookmark']['url'], array('action' => 'visit', $bookmark['Bookmark']['id'])); ?></p>


	<?php
	if (!empty($bookmark['Bookmark']['revisit'])) {
		printf(__('revisit every %d hours', true), $bookmark['Bookmark']['revisit']);
	}

	?>
	<?php if ($bookmark['Bookmark']['reading_list']): ?>
		<p class="reading_list">This is on your reading list.</p>
	<?php endif; ?>

	<dt><?php __('Related Keywords'); ?></dt>
	<dd>
		<ul>
		<?php foreach ($bookmark['Keyword'] as $keyword): ?>
			<li><?php echo $this->Html->link($keyword['title'], array('controller' => 'keywords', 'action' => 'view', $keyword['id'])); ?></li>
		<?php endforeach; ?>
		</ul>
	</dd>

	<dt><?php __('Visits'); ?></dt>
	<dd><?php echo $visits; ?></dd>

	<dt><?php __('Created'); ?></dt>
	<dd><?php echo $bookmark['Bookmark']['created']; ?></dd>

	<dt><?php __('Modified'); ?></dt>
	<dd><?php echo $bookmark['Bookmark']['modified']; ?></dd>

</div>
