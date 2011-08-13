<?PHP
echo '<div id="quote">';
echo '<p id="quote_paragraph">';
echo $quote['text'];
if (!empty($quote['author'])) {
	echo ' -- '.$quote['author'];
}
echo '</p>';
echo '</div>';

# TODO put this in CSS
echo '<div style="clear: both;"></div>';
?>
