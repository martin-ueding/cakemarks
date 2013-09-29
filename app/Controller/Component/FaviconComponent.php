<?php
# Copyright © 2013 Martin Ueding <dev@martin-ueding.de>
# Licensed under The MIT License

class FaviconComponent extends Component {
    public function __construct($collection, $settings) {
        parent::__construct($collection, $settings);

        $this->dir = TMP.'cakemarks-favicon';

        $this->runs = Configure::read("favicon.runs");

    }

    public function get_favicon_filename($url) {
        return $this->dir.DS.sha1($url);
    }

    public function download_favicon($url) {
        $target = $this->get_favicon_filename($url);

        if (!is_dir($this->dir)) {
            mkdir($this->dir);
        }

        if (!is_file($target) && $this->runs > 0) {
            $favicon_url = 'http://g.etfv.co/'.$url;
            file_put_contents($target, file_get_contents($favicon_url));
            $this->runs--;
            return $target;
        }
    }
}
?>
