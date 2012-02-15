<?php
# Copyright © 2012 Martin Ueding <dev@martin-ueding.de>

class BookmarkHelper extends AppHelper {
	var $helpers = array('Html');

	function print_bookmark($bookmark) {
		echo $this->favicon($bookmark);

		echo $this->Html->link($bookmark['title'],
			array('controller' => 'bookmarks', 'action' => 'visit', $bookmark['id']),
			array('class' => 'bookmark_link', 'title' => $bookmark['url']));
		echo ' ';

		echo $this->Html->link(__('View', true),
			array('controller' => 'bookmarks', 'action' => 'view', $bookmark['id']),
			array('class' => 'edit_option'));
		echo ' ';
	}

	function favicon($bookmark) {
		$html = '';

		if (Configure::read('favicon.show')) {
			$html .= '<img width="16" height="16" src="data:image/ico;base64,'
				.$this->requestAction('/bookmarks/favicon/'.$bookmark['id'])
				.'" />';
			$html .= ' ';
		}

		return $html;
	}
}
