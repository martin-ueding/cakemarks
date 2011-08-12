<?php
/* Visit Fixture generated on: 2011-08-12 15:08:27 : 1313154147 */
class VisitFixture extends CakeTestFixture {
	var $name = 'Visit';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'bookmark_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'time' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'bookmark_id' => 1,
			'time' => '2011-08-12 15:02:27'
		),
	);
}
?>