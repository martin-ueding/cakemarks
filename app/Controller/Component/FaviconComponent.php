<?php
# Copyright © 2013 Martin Ueding <dev@martin-ueding.de>
# Licensed under The MIT License

class FaviconComponent extends Component {
    public function __construct($collection, $settings) {
        parent::__construct($collection, $settings);

        $this->finfo = finfo_open(FILEINFO_MIME_TYPE);
    }

    public function get_favicon_filename($url) {
        $dir = TMP.'cakemarks-favicon';
        if (!is_dir($dir)) {
            mkdir($dir);
        }
        $target = TMP.'cakemarks-favicon'.DS.sha1($url);

        if (is_file($target)) {
            return $target;
        }
        else {
            $favicon_url = 'http://g.etfv.co/'.$url;
            file_put_contents($target, file_get_contents($favicon_url));
            return $target;
        }
    }

    public function get_favicon_img($url) {
        $favicon_name = $this->get_favicon_filename($url);
        $mime = finfo_file($this->finfo, $favicon_name);
        $base64 = base64_encode(file_get_contents($favicon_name));
        return '<img src="data:'.$mime.';base64,'.$base64.'" />';
    }
}
