<?php
# Copyright © 2011-2012 Martin Ueding <dev@martin-ueding.de>
# Licensed under the MIT License (http://www.opensource.org/licenses/mit-license.php).

class ImportTest extends CakeTestCase {
	function testEmpty() {
		$data = array('json' => "[]");
		$result = $this->testAction('/bookmarks/import',
			array('fixturize' => false, 'return' => 'vars', 'data' => $data, 'method' => 'post')); 

		$this->assertTrue(isset($result));
		if ($this->assertTrue(isset($result['added'])))
			$this->assertEqual(0, $result['added']);
		if ($this->assertTrue(isset($result['ids'])))
			$this->assertEqual(0, $result['ids']);
	}

	function testReAdd() {
		$raw = array(
			array("title" => String::uuid(),
			"url" => String::uuid().".tld")
		);
		$data = array('json' => json_encode($raw));

		$result = $this->testAction('/bookmarks/import',
			array('fixturize' => false, 'return' => 'vars', 'data' => $data, 'method' => 'post')); 

		$this->assertTrue(isset($result));
		if ($this->assertTrue(isset($result['added'])))
			$this->assertEqual(1, $result['added']);
		if ($this->assertTrue(isset($result['ids'])))
			$this->assertNotEqual(0, $result['ids']);

		# Import the exact same data. It should not be imported again.

		$result = $this->testAction('/bookmarks/import',
			array('fixturize' => false, 'return' => 'vars', 'data' => $data, 'method' => 'post')); 

		$this->assertTrue(isset($result));
		if ($this->assertTrue(isset($result['added'])))
			$this->assertEqual(0, $result['added']);
		if ($this->assertTrue(isset($result['ids'])))
			$this->assertEqual(0, $result['ids']);
	}
}
