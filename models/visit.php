<?php
class Visit extends AppModel {
	var $name = 'Visit';
	var $displayField = 'time';
	var $validate = array(
		'bookmark_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Bookmark' => array(
			'className' => 'Bookmark',
			'foreignKey' => 'bookmark_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>
