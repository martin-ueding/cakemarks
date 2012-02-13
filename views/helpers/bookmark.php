<?php
# Copyright © 2012 Martin Ueding <dev@martin-ueding.de>

class BookmarkHelper extends AppHelper {
	var $helpers = array('Html');

	function print_bookmark($that, $bookmark) {
		#echo '<img width="16" height="16" src="'.$that->Html->url(array('controller' => 'bookmarks', 'action' => 'favicon', $bookmark['id'])).'" />';
		#echo ' ';

		echo $that->Html->link($bookmark['title'],
			array('controller' => 'bookmarks', 'action' => 'visit', $bookmark['id']),
			array('title' => $bookmark['url']));
		echo ' ';

		echo $that->Html->link(__('View', true),
			array('controller' => 'bookmarks', 'action' => 'view', $bookmark['id']),
			array('class' => 'edit_option'));
		echo ' ';
		
		echo $that->Html->link(__('Edit', true),
			array('controller' => 'bookmarks', 'action' => 'edit', $bookmark['id']),
			array('class' => 'edit_option'));
		echo ' ';
		
		echo $that->Html->link(__('Delete', true),
			array('controller' => 'bookmarks', 'action' => 'delete', $bookmark['id']),
			null,
			sprintf(__('Are you sure you want to delete # %s?', true),
			$bookmark['id']),
			array('class' => 'edit_option'));
	}
}
