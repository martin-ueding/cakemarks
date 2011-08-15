<?php
// Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

class QuotesController extends AppController {

	var $name = 'Quotes';

	function index() {
		$this->Quote->recursive = 0;
		$this->set('quotes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid quote', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('quote', $this->Quote->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Quote->create();
			if ($this->Quote->save($this->data)) {
				$this->Session->setFlash(__('The quote has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quote could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid quote', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Quote->save($this->data)) {
				$this->Session->setFlash(__('The quote has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quote could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Quote->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for quote', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Quote->delete($id)) {
			$this->Session->setFlash(__('Quote deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Quote was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

	function random() {
		return $this->Quote->find('first', array('order' => array('rand()')));
	}
}
?>
