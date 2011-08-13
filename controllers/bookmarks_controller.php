<?php
class BookmarksController extends AppController {

	var $name = 'Bookmarks';
	var $uses = array('Bookmark', 'Visit', 'Quote', 'Keyword');

	function index() {
		$this->Bookmark->recursive = 0;
		$this->set('bookmarks', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid bookmark', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('bookmark', $this->Bookmark->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Bookmark->create();
			if ($this->Bookmark->save($this->data)) {
				$this->Session->setFlash(__('The bookmark has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bookmark could not be saved. Please, try again.', true));
			}
		}
		$keywords = $this->Bookmark->Keyword->find('list');
		$this->set(compact('keywords'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid bookmark', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Bookmark->save($this->data)) {
				$this->Session->setFlash(__('The bookmark has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bookmark could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Bookmark->read(null, $id);
		}
		$keywords = $this->Bookmark->Keyword->find('list');
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
		$this->layout='custom';
		$this->set('reading_list', $this->Bookmark->find('all', array('conditions' => array('Bookmark.reading_list' => 1))));

		$this->set('most_visits', $this->Bookmark->find('all', array(
			'fields' => array('Bookmark.id', 'Bookmark.title', 'count(Bookmark.id)'),
			'group' => 'cakemarks_visits.bookmark_id',
			'joins' => array(array('table' => 'cakemarks_visits',
				'conditions' => array('cakemarks_visits.bookmark_id = Bookmark.id')))
		)));

		$this->set('newest', $this->Bookmark->find('all', array('order' => array('Bookmark.created DESC'))));

		$this->set('quote', $this->Quote->find('first', array('order' => array('rand()'))));

		$this->set('sticky_keywords', $this->Keyword->find('all', array('conditions' => array('Keyword.sticky' => 1))));

		$latest_query = '
			SELECT Bookmark.id, Bookmark.title, Visit.created
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
			ORDER BY Visit.created DESC';

		$this->set('recently_visited', $this->Bookmark->query($latest_query));

		$stats = array(
			'bookmark_count' => $this->Bookmark->find('count'),
			'quote_count' => $this->Quote->find('count'),
			'visit_count' => $this->Visit->find('count'),
			'keyword_count' => $this->Keyword->find('count'),
		);
		$this->set('stats', $stats);
	}

	function visit($id) {
		$to_visit = $this->Bookmark->find('first', array('conditions' => array('Bookmark.id' => $id)));

		// Write a Visit to the DB
		$visit = array('Visit' => array('bookmark_id' => $id));
		$this->Visit->save($visit);

		$to_url = $to_visit['Bookmark']['url'];
		if (!strpos("://", $to_url)) {
			$to_url = "http://".$to_url;
		}
		$this->redirect($to_url);
	}
}
?>
