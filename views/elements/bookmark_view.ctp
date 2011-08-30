<?php if (!empty($bookmarks)): ?>
	<?
	if (isset($bookmarks['Bookmark'][0]['id'])) {
		$bookmarks = $bookmarks['Bookmark'];
	}
	?>
	<div class="bookmark_view">
	<ul>
	<?php foreach ($bookmarks as $bookmark): ?>
		<?
		if (isset($bookmark['Bookmark'])) {
			$bookmark = $bookmark['Bookmark'];
		}
		?>
		
		<li>
			<?php echo $this->Html->link($bookmark['title'], array('controller' => 'bookmarks', 'action' => 'visit', $bookmark['id']), array('title' => $bookmark['url'])); ?>

			<?php echo $this->Html->link(__('View', true), array('controller' => 'bookmarks', 'action' => 'view', $bookmark['id']), array('class' => 'edit_option')) ; ?>
			<?php echo $this->Html->link(__('Edit', true), array('controller' => 'bookmarks', 'action' => 'edit', $bookmark['id']), array('class' => 'edit_option')) ; ?>
			<?php echo $this->Html->link(__('Delete', true), array('controller' => 'bookmarks', 'action' => 'delete', $bookmark['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $bookmark['id']), array('class' => 'edit_option')) ; ?>
		</li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php endif; ?>
