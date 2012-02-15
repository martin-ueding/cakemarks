<?php
# Copyright © 2012 Martin Ueding <dev@martin-ueding.de>

class BookmarkHelper extends AppHelper {
	var $helpers = array('Html');

	function print_bookmark($bookmark) {
		echo $this->favicon($bookmark);

		echo '<td>';
		echo $this->Html->link($bookmark['title'],
			array('controller' => 'bookmarks', 'action' => 'visit', $bookmark['id']),
			array('class' => 'bookmark_link', 'title' => $bookmark['url']));
		echo '</td>';

		echo '<td>';
		echo $this->Html->link(__('View', true),
			array('controller' => 'bookmarks', 'action' => 'view', $bookmark['id']),
			array('class' => 'edit_option'));
		echo '</td>';
	}

	function favicon($bookmark) {
		$html = '';

		if (Configure::read('favicon.show')) {
			$url = trim(
				str_replace(
					'http://',
					'',
					trim($bookmark['url'])
				),
				'/'
			);
			$url = explode('/', $url);
			$url = 'http://' . $url[0] . '/favicon.ico';

			$html .= '<td><img width="16" height="16" src="'.$url.'" /></td>';
		}

		return $html;
	}
}
