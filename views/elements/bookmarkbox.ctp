<? /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<div class="bookmarkbox">
	<div class="title"><?=$title?></div>
	<?=$this->element('bookmark_view', array('bookmarks' => $bookmarks))?>
</div>
