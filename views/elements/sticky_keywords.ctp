<?PHP
// Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

echo '<div id="navigation">';
echo '<div class="sticky_keyword">';
echo '<div class="hunfold">';
while ($link = mysql_fetch_assoc($erg)) {
	echo '<a href="hit.php?id='.$link['link_id'].'">'.shorttext($link['link_title'], Options::$boxes_max_chars).'</a>';
	echo ' ';
}
echo '</div>';
echo '<div class="hhandle">'.$bar_keys['key_name'].'</div>';
echo '</div>';
echo '</div>';
?>
