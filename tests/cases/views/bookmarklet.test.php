<?php
// Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

App::import('Lib', 'CakemarksWebTestCase');

class BookmarkletTestCase extends CakemarksWebTestCase {
	function test_bookmarklet_url() {
		$this->get($this->baseurl."/pages/bookmarklet");
		$this->verify_page_load();
		$this->assertPattern("/Bookmarklet/");
		$this->assertTrue($this->click("Bookmark this Page"));
		$this->verify_page_load();
		$this->assertPattern("/Add Bookmark/");
		$this->assertPattern('$/pages/bookmarklet<$');
	}
}
?>
