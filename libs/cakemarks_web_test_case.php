<?php
// Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

class CakemarksWebTestCase extends CakeWebTestCase {
	function __construct() {
		$this->baseurl = "127.0.0.1".current(split("app", $_SERVER['PHP_SELF']));
	}

	/**
	 * Verifies the load of a page by checking the HTTP code and possible
	 * CakePHP warnings.
	 *
	 * @author Martin Ueding <dev@martin-ueding.de>
	 */
	function verify_page_load() {
		$this->assertResponse(200);
		$this->assertNoPattern("/Missing Controller/");
	}

}
?>
