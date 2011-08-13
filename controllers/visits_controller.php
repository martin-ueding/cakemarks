<?php
class VisitsController extends AppController {

	var $name = 'Visits';

	function index() {
		$this->Visit->recursive = 0;
		$this->set('visits', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid visit', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('visit', $this->Visit->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Visit->create();
			if ($this->Visit->save($this->data)) {
				$this->Session->setFlash(__('The visit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The visit could not be saved. Please, try again.', true));
			}
		}
		$bookmarks = $this->Visit->Bookmark->find('list');
		$this->set(compact('bookmarks'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid visit', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Visit->save($this->data)) {
				$this->Session->setFlash(__('The visit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The visit could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Visit->read(null, $id);
		}
		$bookmarks = $this->Visit->Bookmark->find('list');
		$this->set(compact('bookmarks'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for visit', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Visit->delete($id)) {
			$this->Session->setFlash(__('Visit deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Visit was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>