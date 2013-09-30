<?php /* Copyright © 2011-2013 Martin Ueding <dev@martin-ueding.de> */ ?>

<div id="navigation">
    <h2><?php echo __('Navigation'); ?></h2>
    <ul>
        <li><?php echo $this->Html->link(__('Home Page'),
            array('controller' => 'bookmarks', 'action' => 'startscreen')); ?>
        </li>
        <li><?php echo $this->Html->link(__('New Bookmark'),
            array('controller' => 'bookmarks', 'action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Bookmarks'),
            array('controller' => 'bookmarks', 'action' => 'index')); ?></li>
        <li class="nomobile"><?php echo $this->Html->link(__('List Quotes'),
            array('controller' => 'quotes', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Check Referrer'),
            array('controller' => 'pages', 'action' => 'referrer'),
            array('rel' => 'noreferrer')); ?></li>
        <li class="nomobile"><?php echo $this->Html->link(__('Bookmarklet'),
            array('controller' => 'pages', 'action' => 'bookmarklet')); ?></li>
    </ul>
</div>
