<? /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<?=$this->element('quote', array('quote' => $quote['Quote']))?>

<div id="keyword_tree">
	<?=$this->element('keyword_tree', array('keywords' => $keyword_tree, 'show_edit' => false))?>
</div>


<?=$this->element('sticky_keywords', array('sticky_keywords' => $sticky_keywords, 'stats' => $stats))?>

<? if (!empty($revisit)): ?>
	<?=$this->element('bookmarkbox', array('title' => __("revisit", true), 'bookmarks' => $revisit))?>
<? endif; ?>
<?=$this->element('bookmarkbox', array('title' => __("reading list", true), 'bookmarks' => $reading_list))?>
<?=$this->element('bookmarkbox', array('title' => __("most visits", true), 'bookmarks' => $most_visits))?>
<?=$this->element('bookmarkbox', array('title' => __("recently visited", true), 'bookmarks' => $recently_visited))?>
<?=$this->element('bookmarkbox', array('title' => __("newest", true), 'bookmarks' => $newest))?>
<?=$this->element('quickadd')?>
