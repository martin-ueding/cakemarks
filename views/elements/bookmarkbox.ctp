<!-- Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> -->

<div class="bookmarkbox">

<div class="title">
<?=$title?>
</div>

<div class="content">
<?PHP
foreach ($bookmarks as $bookmark) {
	echo $bookmark['Bookmark']['title'];
	echo '<br />';
}
?>
</div>

</div>
