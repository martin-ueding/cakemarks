<?php
class BookmarksController extends AppController {

	var $name = 'Bookmarks';

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
		$this->layout='custon';
		# TODO reading list
		# TODO most visits
		# TODO last visited
		$this->set('newest', $this->Bookmark->find('all', array('order' => array('Bookmark.created DESC'))));

	}

	function visit($id) {
		$to_visit = $this->Bookmark->find('first', array('conditions' => array('Bookmark.id' => $id)));
		$to_url = $to_visit['Bookmark']['url'];
		if (!strpos("://", $to_url)) {
			$to_url = "http://".$to_url;
		}
		$this->redirect($to_url);
	}
}
?>
