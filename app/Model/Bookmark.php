<?php
# Copyright © 2011-2013 Martin Ueding <dev@martin-ueding.de>
# Licensed under the MIT License (http://www.opensource.org/licenses/mit-license.php).

class Bookmark extends AppModel {
    public $name = 'Bookmark';
    public $displayField = 'title';

    public $hasMany = array(
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

    public $virtualFields = array(
        'visits' => 'SELECT COUNT(Visit.bookmark_id) FROM cakemarks_visits Visit WHERE Visit.bookmark_id = Bookmark.id'
    );

    public $hasAndBelongsToMany = array(
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

    public function __construct($id = false, $table = null, $ds = null) {
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

        $this->limit = Configure::read("UI.Startscreen.BoxLength");
    }

    public function get_latest() {
        $latest_query = '
            SELECT Bookmark.id, Bookmark.title, Bookmark.url, Visit.created
            FROM (
                SELECT *
                FROM (
                    SELECT *
                    FROM cakemarks_visits
                    ORDER BY cakemarks_visits.created DESC
                ) AS sorted_visits
                GROUP BY bookmark_id
            ) AS Visit
            JOIN cakemarks_bookmarks AS Bookmark ON Visit.bookmark_id = Bookmark.id
            ORDER BY Visit.created DESC
            LIMIT '.$this->limit;

        return $this->query($latest_query);
    }

    public function get_revisit() {
        $revisit_query = '
            SELECT Bookmark.id, Bookmark.title, Bookmark.url, Bookmark.revisit, Visit.created
            FROM (
                SELECT *
                FROM (
                    SELECT *
                    FROM cakemarks_visits
                    ORDER BY cakemarks_visits.created DESC
                ) sorted_visits
                GROUP BY bookmark_id
            ) Visit
            JOIN cakemarks_bookmarks Bookmark ON Visit.bookmark_id=Bookmark.id 
            WHERE Visit.created IS NOT NULL
            && Bookmark.revisit > 0
            && ADDTIME(Visit.created, MAKETIME(Bookmark.revisit, 0, 0)) < now()
            ORDER BY Visit.created DESC
            LIMIT '.$this->limit;

        return $this->query($revisit_query);
    }

    public function get_newest() {
        return $this->find('all', array('order' => array('Bookmark.created DESC'), 'limit' => $this->limit));
    }

    public function get_most_visits() {
return $this->find('all', array(
            'fields' => array('Bookmark.id', 'Bookmark.title', 'Bookmark.url', 'count(Bookmark.id)'),
            'group' => 'cakemarks_visits.bookmark_id',
            'joins' => array(
                array(
                    'table' => 'cakemarks_visits',
                    'conditions' => array('cakemarks_visits.bookmark_id = Bookmark.id')
                )
            ),
            'limit' => $this->limit,
            'order' => 'count(Bookmark.id) DESC',
        ));
    }

    public function get_mobile() {
        return $this->find('all', array('conditions' => array('Bookmark.mobile' => 1)));
    }

    public function get_reading_list() {
        return $this->find('all', array('conditions' => array('Bookmark.reading_list' => 1), 'limit' => $this->limit));
    }
}
?>
