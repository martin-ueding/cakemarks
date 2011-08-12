<?php
/* Quote Test cases generated on: 2011-08-12 15:08:53 : 1313154113*/
App::import('Model', 'Quote');

class QuoteTestCase extends CakeTestCase {
	var $fixtures = array('app.quote');

	function startTest() {
		$this->Quote =& ClassRegistry::init('Quote');
	}

	function endTest() {
		unset($this->Quote);
		ClassRegistry::flush();
	}

}
?>