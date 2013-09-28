<?php
# Copyright © 2011-2012 Martin Ueding <dev@martin-ueding.de>
# Licensed under the MIT License (http://www.opensource.org/licenses/mit-license.php).

class QuotesController extends AppController {

	var $name = 'Quotes';

	function index() {
		$this->Quote->recursive = 0;
		$this->set('quotes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid quote'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('quote', $this->Quote->read(null, $id));
	}

	function add() {
		if (!empty($this->request->data)) {
			$this->Quote->create();
			if ($this->Quote->save($this->request->data)) {
				$this->Session->setFlash(__('The quote has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quote could not be saved. Please, try again.'));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid quote'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Quote->save($this->request->data)) {
				$this->Session->setFlash(__('The quote has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quote could not be saved. Please, try again.'));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Quote->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for quote'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Quote->delete($id)) {
			$this->Session->setFlash(__('Quote deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Quote was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	function random() {
		return $this->Quote->find('first', array('order' => array('rand()')));
	}
}
?>
