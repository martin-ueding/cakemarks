<?php
class Bookmark extends AppModel {
	var $name = 'Bookmark';
	var $displayField = 'title';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

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

}
?>