<?php /* Copyright © 2011-2013 Martin Ueding <dev@martin-ueding.de> */ ?>

<?php $stats = $this->requestAction(array('controller' => 'bookmarks', 'action' => 'stats'), array('cache' => '+5 min')); ?>

<div id="stats">
    <h2><?php echo __('Statistics'); ?></h2>
    <p>
    <?php echo $stats['bookmark_count']?> <?php echo __n('bookmark', 'bookmarks', $stats['bookmark_count']); ?>

    &bull;

    <?php echo $stats['quote_count']?> <?php echo __n('quote', 'quotes', $stats['quote_count']); ?>
        
    &bull;

    <?php echo $stats['visit_count']?> <?php echo __n('visit', 'visits', $stats['visit_count']); ?>

    &bull;

    <?php echo $stats['keyword_count']?> <?php echo __n('keyword', 'keywords', $stats['keyword_count']); ?>

    &bull;

    <?php echo __('PHP Version:').' '.phpversion(); ?>

    &bull;

    <?php echo __('CakePHP Version:').' '.Configure::version(); ?>
    <p>
</div>
