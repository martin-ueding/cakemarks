<?php
/* Keyword Fixture generated on: 2011-08-12 15:08:48 : 1313156388 */
class KeywordFixture extends CakeTestFixture {
	var $name = 'Keyword';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'created' => '2011-08-12 15:39:48',
			'modified' => '2011-08-12 15:39:48',
			'parent_id' => 1
		),
	);
}
?>