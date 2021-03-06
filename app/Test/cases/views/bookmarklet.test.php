<?php
# Copyright © 2011-2012 Martin Ueding <dev@martin-ueding.de>
# Licensed under the MIT License (http://www.opensource.org/licenses/mit-license.php).

App::import('Lib', 'CakemarksWebTestCase');

class BookmarkletTestCase extends CakemarksWebTestCase {
	function test_add_url() {
		$url = String::uuid();
		$this->get($this->baseurl."/bookmarks/add/$url");
		$this->verify_page_load();
		$this->assertPattern("/Add Bookmark/");
		$this->assertPattern("/$url/");
	}
}
?>
