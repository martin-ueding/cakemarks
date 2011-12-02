<?php
# Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

function print_bookmark($that, $bookmark) {
	echo '<img width="16" height="16" src="'.$that->Html->url(array('controller' => 'bookmarks', 'action' => 'favicon', $bookmark['id'])).'" />';
	echo ' ';

	echo $that->Html->link($bookmark['title'],
		array('controller' => 'bookmarks', 'action' => 'visit', $bookmark['id']),
		array('title' => $bookmark['url']));
	echo ' ';

	echo $that->Html->link(__('View', true),
		array('controller' => 'bookmarks', 'action' => 'view', $bookmark['id']),
		array('class' => 'edit_option'));
	echo ' ';
	
	echo $that->Html->link(__('Edit', true),
		array('controller' => 'bookmarks', 'action' => 'edit', $bookmark['id']),
		array('class' => 'edit_option'));
	echo ' ';
	
	echo $that->Html->link(__('Delete', true),
		array('controller' => 'bookmarks', 'action' => 'delete', $bookmark['id']),
		null,
		sprintf(__('Are you sure you want to delete # %s?', true),
		$bookmark['id']),
		array('class' => 'edit_option'));
}
?>


<?php if (!empty($bookmarks)): ?>
	<?
	if (isset($bookmarks['Bookmark'][0]['id'])) {
		$bookmarks = $bookmarks['Bookmark'];
	}
	?>
	<?php if (!isset($wrapper) || $wrapper == "ul"): ?>
	<div class="bookmark_view">
	<ul>
	<?php foreach ($bookmarks as $bookmark): ?>
		<?
		if (isset($bookmark['Bookmark'])) {
			$bookmark = $bookmark['Bookmark'];
		}
		?>
		
		<?php if (!empty($bookmark) && !empty($bookmark['id']) && !empty($bookmark['title']) && !empty($bookmark['url'])): ?>
		<li>
			<?php print_bookmark($this, $bookmark); ?>
		</li>
		<?php endif; ?>
	<?php endforeach; ?>
	</ul>
	</div>
	<?php endif; ?>

	<?php if (isset($wrapper) && $wrapper == "dd"): ?>
	<?php foreach ($bookmarks as $bookmark): ?>
		<?
		if (isset($bookmark['Bookmark'])) {
			$bookmark = $bookmark['Bookmark'];
		}
		?>
		
		<?php if (!empty($bookmark) && !empty($bookmark['id']) && !empty($bookmark['title']) && !empty($bookmark['url'])): ?>
		<dd>
			<?php print_bookmark($this, $bookmark); ?>
		</dd>
		<?php endif; ?>
	<?php endforeach; ?>
	<?php endif; ?>

<?php endif; ?>
