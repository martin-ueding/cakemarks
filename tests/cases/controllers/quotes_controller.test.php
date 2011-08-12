<?php
/* Quotes Test cases generated on: 2011-08-12 15:08:02 : 1313154602*/
App::import('Controller', 'Quotes');

class TestQuotesController extends QuotesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class QuotesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.quote');

	function startTest() {
		$this->Quotes =& new TestQuotesController();
		$this->Quotes->constructClasses();
	}

	function endTest() {
		unset($this->Quotes);
		ClassRegistry::flush();
	}

}
?>