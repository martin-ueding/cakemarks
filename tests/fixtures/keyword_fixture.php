<?php
/* Keyword Fixture generated on: 2011-08-12 15:08:13 : 1313154073 */
class KeywordFixture extends CakeTestFixture {
	var $name = 'Keyword';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'title' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>