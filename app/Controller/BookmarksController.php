<?php
# Copyright © 2011-2013 Martin Ueding <dev@martin-ueding.de>
# Licensed under the MIT License (http://www.opensource.org/licenses/mit-license.php).

class BookmarksController extends AppController {
    public $name = 'Bookmarks';
    public $uses = array('Bookmark', 'Visit', 'Quote', 'Keyword');
    public $helpers = array('Favicon', 'Time', 'Bookmark');
    public $components = array('Favicon', 'Pagetitle', 'Paginator');

    /**
     * Lists all bookmarks.
     *
     * @author Martin Ueding <dev@martin-ueding.de>
     */
    public function index() {
        $this->Bookmark->recursive = 0;
        $this->set('bookmarks', $this->paginate());
    }

    public function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid bookmark'));
            $this->redirect(array('action' => 'index'));
        }
        $data = $this->Bookmark->read(null, $id);
        $this->set('bookmark', $data);
        $last_visit = $this->Bookmark->Visit->find('first', array(
            "conditions" => array("Visit.bookmark_id" => $id),
            "order" => array('Visit.created DESC')));
        if (!empty($last_visit)) {
            $last_visit_formatted = strtotime($last_visit['Visit']['created']);
            $this->set('last_visit', $last_visit_formatted);
        }
        if ($data['Bookmark']['revisit'] > 0) {
            $this->set('next_visit',  $last_visit_formatted+$data['Bookmark']['revisit']*3600);
        }

        $this->Favicon->download_favicon($data['Bookmark']['url']);
    }

    private function add_page_title_if_missing() {
            // add page title if missing
            if (empty($this->request->data['Bookmark']['title']) && !empty($this->request->data['Bookmark']['url'])) {
                $this->request->data['Bookmark']['title'] = $this->Pagetitle->get_page_title($this->request->data['Bookmark']['url']);
            }
    }

    public function add($url = null) {
        if (!empty($this->request->data)) {
            $this->Bookmark->create();

            $this->add_page_title_if_missing();

            if ($this->Bookmark->save($this->request->data)) {
                if (!empty($this->request->data['Keyword']['title'])) {
                    $this->request->data['Bookmark']['id'] = $this->Bookmark->id;
                    $this->Keyword->save($this->request->data);
                }

                $this->Session->setFlash(__('The bookmark has been saved'));
                $this->redirect(array('action' => 'view', $this->Bookmark->id));
            }
            else {
                $this->Session->setFlash(__('The bookmark could not be saved. Please, try again.'));
            }
        }
        if ($url != null) {
            $this->request->data['Bookmark']['url'] = $this->_decode_url($url);
        }
        $keywords = $this->Bookmark->Keyword->find('list', array('order' => 'Keyword.title'));
        $this->set(compact('keywords'));
    }

    private function _decode_url($url) {
        $url = str_replace("__slash__", "/", $url);
        $url = str_replace("__colon__", ":", $url);
        $url = str_replace("__hash__", "#", $url);
        $url = str_replace("__ques__", "?", $url);
        $url = str_replace("__amp__", "&", $url);
        return $url;
    }

    public function edit($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__('Invalid bookmark'));
            $this->redirect(array('action' => 'index'));
        }

        $this->add_page_title_if_missing();

        if (!empty($this->request->data)) {
            if ($this->Bookmark->save($this->request->data) &&
                (empty($this->request->data['Keyword']['title']) || $this->Keyword->save($this->request->data))
            ) {
                $this->Session->setFlash(__('The bookmark has been saved'));
                $this->redirect(array('action' => 'view', $this->Bookmark->id));
            }
            else {
                $this->Session->setFlash(__('The bookmark could not be saved. Please, try again.'));
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->Bookmark->read(null, $id);
        }
        $keywords = $this->Bookmark->Keyword->find('list', array('order' => 'Keyword.title'));
        $this->set(compact('keywords'));
    }

    public function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for bookmark'));
            $this->redirect(array('action'=>'index'));
        }
        if ($this->Bookmark->delete($id)) {
            $this->Session->setFlash(__('Bookmark deleted'));
            $this->redirect(array('action'=>'index'));
        }
        $this->Session->setFlash(__('Bookmark was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function startscreen() {
        $this->set('reading_list', $this->Bookmark->get_reading_list());
        $this->set('mobile', $this->Bookmark->get_mobile());
        $this->set('most_visits', $this->Bookmark->get_most_visits());
        $this->set('newest', $this->Bookmark->get_newest());
        $this->set('recently_visited', $this->Bookmark->get_latest());
        $this->set('revisit', $this->Bookmark->get_revisit());
    }

    public function sticky_keywords() {
        $result = $this->Keyword->find('all', array(
            'conditions' => array('Keyword.sticky' => 1),
            'order' => array('Keyword.title'),
        ));


        for ($i = 0; $i < count($result); $i++) {
            uasort($result[$i]['Bookmark'], "BookmarksController::_bookmark_sort");
        }

        return $result;
    }

    static function _bookmark_sort($a, $b) {
        return strcmp(strtolower($a['title']), strtolower($b['title']));
    }

    public function stats() {
        $stats = array(
            'bookmark_count' => $this->Bookmark->find('count'),
            'quote_count' => $this->Quote->find('count'),
            'visit_count' => $this->Visit->find('count'),
            'keyword_count' => $this->Keyword->find('count'),
        );
        return $stats;
    }

    public function visit($id) {
        $to_visit = $this->Bookmark->findById($id);

        // Write a Visit to the DB
        $visit = array('Visit' => array('bookmark_id' => $id));
        $this->Visit->save($visit);

        $to_url = $to_visit['Bookmark']['url'];
        if (!strpos($to_url, "://")) {
            $to_url = "http://".$to_url;
        }
        $this->redirect($to_url);
    }

    public function export() {
        header('Content-type: application/json');
        $this->layout = 'ajax';
        $bookmarks = $this->Bookmark->find('all');
        foreach ($bookmarks as $bookmark) {
            $current['title'] = $bookmark['Bookmark']['title'];
            $current['url'] = $bookmark['Bookmark']['url'];

            foreach ($bookmark['Keyword'] as $keyword) {
                $keywords[] = $keyword['title'];
            }
            if (isset($keywords)) {
                $current['keywords'] = $keywords;
            }

            $data[] = $current;
            unset($current);
            unset($keywords);
        }
        $this->set("data", json_encode($data));
    }

    public function import() {
        $this->import_result['added_bookmarks'] = 0;
        $this->import_result['added_keywords'] = 0;
        $this->import_result['existing_bookmarks'] = 0;
        $this->import_result['existing_keywords'] = 0;

        if (isset($this->request->data['Bookmark']['json'])) {
            $this->_import(json_decode($this->request->data['Bookmark']['json'], true));
            $this->set('show_results', true);
        }
        else {
            $this->set('show_results', false);
        }

        $this->set('show_form', true);
        $this->set('import_result', $this->import_result);
    }

    /**
     * Takes an array with the format specified in the import/export document.
     * Each bookmark is created if it does not exist, keywords are attached to
     * it.
     *
     * @param input array Bookmarks and Keywords to be imported
     * @author Martin Ueding <dev@martin-ueding.de>
     */
    public function _import($input) {
        if (!isset($input) || empty($input) || count($input) == 0) {
            return;
        }
        foreach ($input as $bookmark) {
            # Build a CakePHP style array.
            $q['Bookmark']['title'] = $bookmark['title'];
            $q['Bookmark']['url'] = $bookmark['url'];

            # If there are any keywords, add them to the array.
            if (isset($bookmark['keywords'])) {
                foreach ($bookmark['keywords'] as $keyword) {
                    $db_keyword = $this->Keyword->find('first', array(
                        'conditions' => array(
                            'Keyword.title' => $keyword)
                        ));

                    if (isset($db_keyword['Keyword']['id'])) {
                        $q['Keyword'][] = $db_keyword['Keyword']['id'];
                        $this->import_result['existing_keywords']++;
                    }
                    else {
                        $this->Keyword->create();
                        $this->Keyword->save(array('title' => $keyword));
                        $q['Keyword'][] = $this->Keyword->id;
                        $this->import_result['added_keywords']++;
                    }
                }
            }

            # Check whether this title/url combination already exists.
            $count = $this->Bookmark->find('count', array(
                'conditions' => array(
                    'Bookmark.title' => $q['Bookmark']['title'],
                    'Bookmark.url' => $q['Bookmark']['url'],
                )
            ));

            # Go to the next bookmark if this already exists.
            if ($count > 0) {
                $this->import_result['existing_bookmarks']++;
            }
            # Add bookmark to the database.
            else {
                $this->Bookmark->create();
                $this->Bookmark->save($q);
                $this->import_result['added_bookmarks']++;
            }

            unset($q);
        }
    }

    /**
     * Searches the bookmarks. AJAX only.
     *
     * @param $query String with words to query for.
     */
    public function ajaxsearch($query) {
        $this->layout = 'ajax';
        header('Content-type: application/json');

        preg_match_all('/"(?:\\\\.|[^\\\\"])*"|\S+/', $query, $matches);
        $conditions = array();
        $words = $matches[0];

        $words = array_map('BookmarksController::stripper', $words);
        foreach ($words as $word) {
            $conditions[] = array('Bookmark.title LIKE' => '%'.$word.'%');
        }
        $data = $this->Bookmark->find('all', array(
            'fields' => array('Bookmark.id', 'Bookmark.title', 'Bookmark.url', 'Bookmark.visits'),
            'conditions' => $conditions,
            'limit' => Configure::read('search.items'),
            'order' => 'Bookmark.recent_visits DESC',
        ));

        $this->set("data", json_encode($data));
    }

    public static function stripper($input) {
        if ($input[0] == '"') {
            return substr($input, 1, strlen($input)-2);
        }
        else {
            return $input;
        }
    }

    public function search() {
        if (isset($this->request->data['query'])) {
            $query = $this->request->data['query'];
            $this->Bookmark->recursive = -1;
            $this->Paginator->settings = array(
                'conditions' => array('Bookmark.title LIKE' => '%'.$query.'%'),
                'limit' => 30
            );
            $data = $this->Paginator->paginate('Bookmark');
            $this->set('bookmarks', $data);
        }
    }

    public function downloadfavicons() {
        $this->layout = 'ajax';
        $data = $this->Bookmark->find('all', array(
            'fields' => array('Bookmark.url'),
            'order' => 'visits DESC',
        ));

        $downloaded = array();
        
        foreach ($data as $entry) {
            $url = $entry['Bookmark']['url'];
            $file = $this->Favicon->download_favicon($url);
            if (!empty($file)) {
                $downloaded[] = $file;
            }
        }

        $this->set('data', json_encode($downloaded));
    }
}
?>
