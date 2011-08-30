<?php /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<div id="actions">
	<h2><?php __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bookmark', true), array('action' => 'edit', $bookmark['Bookmark']['id'])); ?></li>
		<li><?php echo $this->Html->link(__('Delete Bookmark', true), array('action' => 'delete', $bookmark['Bookmark']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $bookmark['Bookmark']['id'])); ?></li>
		<li><?php echo $this->Html->link(__('New Bookmark', true), array('action' => 'add')); ?></li>
	</ul>
</div>

<h2><?php __('View Bookmark'); ?></h2>
<p class="title"><?php echo $bookmark['Bookmark']['title']; ?></p>
<p class="url"><?php echo $this->Html->link($bookmark['Bookmark']['url'], array('action' => 'visit', $bookmark['Bookmark']['id'])); ?></p>


<?php
if (!empty($bookmark['Bookmark']['revisit'])) {
	// TODO i18n
	echo 'revisit every '.$bookmark['Bookmark']['revisit'].' hours';
}

?>
<?php if ($bookmark['Bookmark']['reading_list']): ?>
	<p class="reading_list">This is on your reading list.</p>
<?php endif; ?>

<div class="related_keywords">
<h3><?php __('Related Keywords'); ?></h3>
<ul>
<?php foreach ($bookmark['Keyword'] as $keyword): ?>
	<li><?php echo $this->Html->link($keyword['title'], array('controller' => 'keywords', 'action' => 'view', $keyword['id'])); ?></li>
<?php endforeach; ?>
</ul>
</div>

<p class="visits"><?php echo __('Visits', true)?>: <?php echo $visits; ?></p>
<p class="created"><?php echo __('Created', true)?>: <?php echo $bookmark['Bookmark']['created']; ?></p>
<p class="modified"><?php echo __('Modified', true)?>: <?php echo $bookmark['Bookmark']['modified']; ?></p>

