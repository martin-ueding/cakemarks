<!-- Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> -->

<div class="bookmarkbox">

<div class="title">
<?=$title?>
</div>

<div class="content">
<?PHP
foreach ($bookmarks as $bookmark) {
	echo $this->Html->link($bookmark['Bookmark']['title'], array('controller' => 'bookmarks', 'action' => 'visit', $bookmark['Bookmark']['id']), array('rel' => 'noreferrer'));
	echo '<br />';
}
?>
</div>

</div>
