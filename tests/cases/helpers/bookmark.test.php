<?php
# Copyright © 2012 Martin Ueding <dev@martin-ueding.de>
# Licensed under the MIT License (http://www.opensource.org/licenses/mit-license.php).

App::import('Helper', 'Bookmark');

class BookmarkTest extends CakeTestCase {
	private $bookmarkHelper = null;

	public function startTest() {
		$this->bookmarkHelper = new BookmarkHelper();
	}

	public function testFavicon() {
		$this->assert_favico(
			'http://example.com/favicon.ico',
			'http://example.com/favicon.ico'
		);

		$this->assert_favico(
			'http://example.com/favicon.ico',
			'http://example.com/'
		);

		$this->assert_favico(
			'http://example.com/favicon.ico',
			'http://example.com'
		);

		$this->assert_favico(
			'http://example.com/favicon.ico',
			'example.com'
		);

		$this->assert_favico(
			'https://example.com/favicon.ico',
			'https://example.com/favicon.ico'
		);

		$this->assert_favico(
			'https://example.com/favicon.ico',
			'https://example.com/'
		);

		$this->assert_favico(
			'https://example.com/favicon.ico',
			'https://example.com/foo/bar/other/index.php'
		);

		$this->assert_favico(
			'http://example.com/favicon.ico',
			'http://example.com/foo/bar/other/index.php'
		);
	}

	private function assert_favico($correct, $input) {
		$this->assertEqual(
			$correct,
			$this->bookmarkHelper->favicon_url(
				$input
			)
		);
	}
}
