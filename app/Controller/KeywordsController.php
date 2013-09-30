<?php
# Copyright © 2011-2013 Martin Ueding <dev@martin-ueding.de>
# Licensed under the MIT License (http://www.opensource.org/licenses/mit-license.php).

class KeywordsController extends AppController {
    var $name = 'Keywords';
    var $helpers = array('Bookmark');

    function tree() {
        $keyword_tree = $this->Keyword->find('threaded', array('order' => 'Keyword.title'));
        if (!empty($this->request->params['requested'])) {
            return $keyword_tree;
        }
        else {
            $this->set(compact('keyword_tree'));
        }
    }

    public static function bookmark_comparator($first, $second) {
        $a = $first['title'];
        $b = $second['title'];

        if ($a < $b) {
            return -1;
        }
        elseif ($a == $b) {
            return 0;
        }
        else {
            return 1;
        }
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid keyword'));
            $this->redirect(array('action' => 'index'));
        }
        $data = $this->Keyword->read(null, $id);
        uasort($data['Bookmark'], "KeywordsController::bookmark_comparator");
        $this->set('keyword', $data);
    }

    function add() {
        if (!empty($this->request->data)) {
            $this->Keyword->create();
            if ($this->Keyword->save($this->request->data)) {
                $this->Session->setFlash(__('The keyword has been saved'));
                $this->redirect(array('action' => 'view', $this->Keyword->id));
            } else {
                $this->Session->setFlash(__('The keyword could not be saved. Please, try again.'));
            }
        }
        $parentKeywords = $this->Keyword->ParentKeyword->find('list', array('order' => 'title'));
        $bookmarks = $this->Keyword->Bookmark->find('list');
        $this->set('parentKeywords', $parentKeywords);
        $this->set('bookmarks', $bookmarks);
    }

    function edit($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__('Invalid keyword'));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            if ($this->Keyword->save($this->request->data)) {
                $this->Session->setFlash(__('The keyword has been saved'));
                $this->redirect(array('action' => 'view', $this->Keyword->id));
            } else {
                $this->Session->setFlash(__('The keyword could not be saved. Please, try again.'));
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->Keyword->read(null, $id);
        }
        $parentKeywords = $this->Keyword->ParentKeyword->find('list', array('order' => 'title'));
        $bookmarks = $this->Keyword->Bookmark->find('list');
        $this->set('parentKeywords', $parentKeywords);
        $this->set('bookmarks', $bookmarks);
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for keyword'));
            $this->redirect(array('action'=>'index'));
        }
        if ($this->Keyword->delete($id)) {
            $this->Session->setFlash(__('Keyword deleted'));
            $this->redirect(array('action'=>'index'));
        }
        $this->Session->setFlash(__('Keyword was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function index() {
        $data = $this->Keyword->generateTreeList(null, null, null, '&nbsp;&nbsp;&nbsp;');
        debug($data); die;
    }

    public function refactor() {
        $this->Keyword->recover();
        $this->Keyword->recursive = -1;
        $data = $this->Keyword->find('all');
        debug($data); die;
    }
}
?>
