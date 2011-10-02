<?php
// Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

class BookmarksController extends AppController {

	var $name = 'Bookmarks';
	var $uses = array('Bookmark', 'Visit', 'Quote', 'Keyword');
	var $helpers = array('Time');

	function index() {
		$this->Bookmark->recursive = 0;
		$this->set('bookmarks', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid bookmark', true));
			$this->redirect(array('action' => 'index'));
		}
		$data = $this->Bookmark->read(null, $id);
		$this->set('bookmark', $data);
		$this->set('visits', $this->Bookmark->Visit->find('count', array(
			"conditions" => array("Visit.bookmark_id" => $id))));
		$last_visit = $this->Bookmark->Visit->find('first', array(
			"conditions" => array("Visit.bookmark_id" => $id),
			"order" => array('Visit.created DESC')));
		$last_visit = strtotime($last_visit['Visit']['created']);
		$this->set('last_visit', $last_visit);
		if ($data['Bookmark']['revisit'] > 0) {
			$this->set('next_visit',  $last_visit+$data['Bookmark']['revisit']*3600);
		}
	}

	function add($url = null) {
		if (!empty($this->data)) {
			$this->Bookmark->create();

			// add page title if missing
			if (empty($this->data['Bookmark']['title']) && !empty($this->data['Bookmark']['url'])) {
				$this->data['Bookmark']['title'] = $this->_get_page_title($this->data['Bookmark']['url']);
			}

			if ($this->Bookmark->save($this->data)) {
				if (!empty($this->data['Keyword']['title'])) {
					$this->data['Bookmark']['id'] = $this->Bookmark->id;
					$this->Keyword->save($this->data);
				}

				$this->Session->setFlash(__('The bookmark has been saved', true));
				$this->redirect(array('action' => 'view', $this->Bookmark->id));
			}
			else {
				$this->Session->setFlash(__('The bookmark could not be saved. Please, try again.', true));
			}
		}
		if ($url != null) {
			$this->data['Bookmark']['url'] = $this->_decode_url($url);
		}
		$keywords = $this->Bookmark->Keyword->find('list', array('order' => 'Keyword.title'));
		$this->set(compact('keywords'));
	}

	function _decode_url($url) {
		$url = str_replace("__slash__", "/", $url);
		$url = str_replace("__colon__", ":", $url);
		$url = str_replace("__hash__", "#", $url);
		return $url;
	}

	function _get_page_title($url) {
		// append the http in case it is missing
		if (substr($url, 0, 4) != 'http') {
			$url = 'http://'.$url;
		}

		$data = file_get_contents($url);

		preg_match('/<title>(.*?)<\/title>/', $data, $matches);
		if (isset($matches[1])) {
			$titel = $matches[1];
			return $titel;
		}
		return null;
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid bookmark', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Bookmark->save($this->data) &&
				(empty($this->data['Keyword']['title']) || $this->Keyword->save($this->data))
			) {
				$this->Session->setFlash(__('The bookmark has been saved', true));
				$this->redirect(array('action' => 'view', $this->Bookmark->id));
			}
			else {
				$this->Session->setFlash(__('The bookmark could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Bookmark->read(null, $id);
		}
		$keywords = $this->Bookmark->Keyword->find('list', array('order' => 'Keyword.title'));
		$this->set(compact('keywords'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for bookmark', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Bookmark->delete($id)) {
			$this->Session->setFlash(__('Bookmark deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Bookmark was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

	function startscreen() {
		$limit = 30;

		$this->set('reading_list', $this->Bookmark->find('all', array('conditions' => array('Bookmark.reading_list' => 1), 'limit' => $limit)));

		$this->set('most_visits', $this->Bookmark->find('all', array(
			'fields' => array('Bookmark.id', 'Bookmark.title', 'Bookmark.url', 'count(Bookmark.id)'),
			'group' => 'cakemarks_visits.bookmark_id',
			'joins' => array(
				array(
					'table' => 'cakemarks_visits',
					'conditions' => array('cakemarks_visits.bookmark_id = Bookmark.id')
				)
			),
			'limit' => $limit,
			'order' => 'count(Bookmark.id) DESC',
		)));

		$this->set('newest', $this->Bookmark->find('all', array('order' => array('Bookmark.created DESC'), 'limit' => $limit)));



		$latest_query = '
			SELECT Bookmark.id, Bookmark.title, Bookmark.url, Visit.created
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
			ORDER BY Visit.created DESC
			LIMIT '.$limit;

		$this->set('recently_visited', $this->Bookmark->query($latest_query));


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
			&& Bookmark.revisit IS NOT NULL
			&& ADDTIME(Visit.created, MAKETIME(Bookmark.revisit, 0, 0)) < now()
			ORDER BY Visit.created DESC
			LIMIT '.$limit;

		$this->set('revisit', $this->Bookmark->query($revisit_query));
	}

	function sticky_keywords() {
		// TODO Order the bookmarks in some predictable way.
		return $this->Keyword->find('all', array(
			'conditions' => array('Keyword.sticky' => 1),
			'order' => array('Keyword.title'),
		));
	}

	function stats() {
		$stats = array(
			'bookmark_count' => $this->Bookmark->find('count'),
			'quote_count' => $this->Quote->find('count'),
			'visit_count' => $this->Visit->find('count'),
			'keyword_count' => $this->Keyword->find('count'),
		);
		return $stats;
	}

	function visit($id) {
		$to_visit = $this->Bookmark->find('first', array('conditions' => array('Bookmark.id' => $id)));

		// Write a Visit to the DB
		$visit = array('Visit' => array('bookmark_id' => $id));
		$this->Visit->save($visit);

		$to_url = $to_visit['Bookmark']['url'];
		if (!strpos($to_url, "://")) {
			$to_url = "http://".$to_url;
		}
		$this->redirect($to_url);
	}

	function export() {
		header('Content-type: application/json');
		$this->layout = 'ajax';
		$bookmarks = $this->Bookmark->find('all');
		$this->set("data", json_encode($bookmarks));
	}
}
?>
