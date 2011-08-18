<?php /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<?php $stats = $this->requestAction(array('controller' => 'bookmarks', 'action' => 'stats'), array('cache' => '+5 min')); ?>

<div id="stats">
<p>
<?php echo $stats['bookmark_count']?> <?php echo __n('bookmark', 'bookmarks', $stats['bookmark_count'], true); ; ?>

&bull;

<?php echo $stats['quote_count']?> <?php echo __n('quote', 'quotes', $stats['quote_count'], true); ; ?>
	
&bull;

<?php echo $stats['visit_count']?> <?php echo __n('visit', 'visits', $stats['visit_count'], true); ; ?>

&bull;

<?php echo $stats['keyword_count']?> <?php echo __n('keyword', 'keywords', $stats['keyword_count'], true); ; ?>
<p>
</div>
