<?php
# Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>
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
			<?php $this->Bookmark->print_bookmark($this, $bookmark); ?>
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
			<?php $this->Bookmark->print_bookmark($this, $bookmark); ?>
		</dd>
		<?php endif; ?>
	<?php endforeach; ?>
	<?php endif; ?>

<?php endif; ?>
