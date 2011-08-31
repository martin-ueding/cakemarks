<?php /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<h2><?php __('Bookmarklet'); ?></h2>

<p><?php __('This is a bookmarklet to put into your bookmarks. Whenever you are on a site that you want to bookmark, click it and you will get directed to the creation page.'); ?></p>

<?php echo $this->Html->link(__('Bookmark this Page', true), "javascript: location.href='http://".$_SERVER['HTTP_HOST'].current(split("app", $_SERVER['PHP_SELF']))."bookmarks/add/'+encodeURIComponent(document.URL);"); ?>
