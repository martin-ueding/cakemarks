<? /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<div id="stats">
<p>
<?=$stats['bookmark_count']?> <?=__n('bookmark', 'bookmarks', $stats['bookmark_count'], true)?>

&bull;

<?=$stats['quote_count']?> <?=__n('quote', 'quotes', $stats['quote_count'], true)?>
	
&bull;

<?=$stats['visit_count']?> <?=__n('visit', 'visits', $stats['visit_count'], true)?>

&bull;

<?=$stats['keyword_count']?> <?=__n('keyword', 'keywords', $stats['keyword_count'], true)?>
<p>
</div>
