<?PHP
// Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

echo '<div id="sticky_keywords">';
foreach ($sticky_keywords as $keyword) {
	echo '<div class="sticky_keyword">';
	echo '<div class="hunfold">';
	foreach ($keyword['Bookmark'] as $bookmark) {
		echo $this->Html->link($bookmark['title'], array('controller' => 'bookmarks', 'action' => 'visit', $bookmark['id']));
		echo ' ';
	}
	echo '</div>';
	echo '<div class="hhandle">'.$keyword['Keyword']['title'].'</div>';
	echo '</div>';
}
echo '</div>';
?>
