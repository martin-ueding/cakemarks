<?php /* Copyright © 2011-2013 Martin Ueding <dev@martin-ueding.de> */ ?>

<?php echo $this->Html->script('search'); ?>

<div id="content">
    <h2><?php echo __('Startscreen'); ?></h2>

    <?php if (!empty($mobile)): ?>
        <div id="mobile">
            <?=$this->element('bookmarkbox',
            array('title' => __("Mobile Bookmarks"), 'bookmarks' => $mobile))?>
        </div>
    <?php endif; ?>

    <?php if (!empty($revisit)): ?>
        <?=$this->element('bookmarkbox',
        array('title' => __("Revisit"), 'bookmarks' => $revisit))?>
    <?php endif; ?>

    <?php if (!empty($reading_list)): ?>
        <?=$this->element('bookmarkbox',
        array('title' => __("Reading List"), 'bookmarks' => $reading_list))?>
    <?php endif; ?>

    <?php if (!empty($revisit) || !empty($reading_list)): ?>
        <br clear="both" />
    <?php endif; ?>

    <?php if (!empty($most_visits)): ?>
        <?=$this->element('bookmarkbox', array('title' => __("Most Visits"), 'bookmarks' => $most_visits))?>
    <?php endif; ?>

    <?php if (!empty($recently_visited)): ?>
        <?=$this->element('bookmarkbox', array('title' => __("Recently Visited"),
    'bookmarks' => $recently_visited))?>
    <?php endif; ?>

    <?php if (!empty($newest)): ?>
        <?=$this->element('bookmarkbox', array('title' => __("Newest"), 'bookmarks' => $newest))?>
    <?php endif; ?>
</div>
