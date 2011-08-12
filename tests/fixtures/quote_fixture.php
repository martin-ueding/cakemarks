<?php
/* Quote Fixture generated on: 2011-08-12 15:08:53 : 1313154113 */
class QuoteFixture extends CakeTestFixture {
	var $name = 'Quote';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'text' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'author' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'text' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'author' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>