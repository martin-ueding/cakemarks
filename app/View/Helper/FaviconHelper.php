<?php
# Copyright © 2013 Martin Ueding <dev@martin-ueding.de>
# Licensed under The MIT License

class FaviconHelper extends AppHelper {
    public function __construct($collection, $settings) {
        parent::__construct($collection, $settings);

        $this->finfo = finfo_open(FILEINFO_MIME_TYPE);
        $this->dir = TMP.'cakemarks-favicon';
    }

    public function get_favicon_filename($url) {
        return $this->dir.DS.sha1($url);
    }

    public function get_favicon_img($url) {
        $favicon_name = $this->get_favicon_filename($url);
        if (is_file($favicon_name)) {
            $mime = finfo_file($this->finfo, $favicon_name);
            $base64 = base64_encode(file_get_contents($favicon_name));
            return '<img height="16" width="16" src="data:'.$mime.';base64,'.$base64.'" />';
        }
        else {
            return '<img height="16" width="16" src="" />';
        }
    }
}
