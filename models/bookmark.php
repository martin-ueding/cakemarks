<?php
// Copyright © 2011-2012 Martin Ueding <dev@martin-ueding.de>

class Bookmark extends AppModel {
	var $name = 'Bookmark';
	var $displayField = 'title';

	var $hasMany = array(
		'Visit' => array(
			'className' => 'Visit',
			'foreignKey' => 'bookmark_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


	var $hasAndBelongsToMany = array(
		'Keyword' => array(
			'className' => 'Keyword',
			'joinTable' => 'bookmarks_keywords',
			'foreignKey' => 'bookmark_id',
			'associationForeignKey' => 'keyword_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

	function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);

		$this->validate = array(
			'url' => array(
				'isUnique' => array(
					'rule' => 'isUnique',
					'message' => 'The URL has to be unique.',
				),
			),
			'revisit' => array(
				'numeric' => array(
					'rule' => array('numeric'),
					//'message' => 'Your custom message here',
					'allowEmpty' => true,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			),
			'reading_list' => array(
				'boolean' => array(
					'rule' => array('boolean'),
					//'message' => 'Your custom message here',
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			),
		);
	}
}
?>
