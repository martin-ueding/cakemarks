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
echo '<div id="stats">';
echo '<table>';
// TODO fix format strings, remove HTML
printf("<tr><td>%d</td><td>%s</td></tr>", $stats['bookmark_count'], __n('bookmark', 'bookmarks', $stats['bookmark_count'], true));
printf("<tr><td>%d</td><td>%s</td></tr>", $stats['quote_count'], __n('quote', 'quotes', $stats['bookmark_count'], true));
printf("<tr><td>%d</td><td>%s</td></tr>", $stats['visit_count'], __n('visit', 'visits', $stats['bookmark_count'], true));
printf("<tr><td>%d</td><td>%s</td></tr>", $stats['keyword_count'], __n('keyword', 'keywords', $stats['bookmark_count'], true));

echo '</table>';
echo '</div>';
echo '</div>';
?>
