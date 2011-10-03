<?php /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<div class="bookmarkbox">
	<h3><?php echo $title; ?></h3>
	<?php echo $this->element('bookmark_view', array('bookmarks' => $bookmarks)); ?>
</div>
