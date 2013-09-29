<?php
# Copyright © 2013 Martin Ueding <dev@martin-ueding.de>
# Licensed under The MIT License

class PagetitleComponent extends Component {
    public function get_page_title($url) {
        // append the http in case it is missing
        if (substr($url, 0, 4) != 'http') {
            $url = 'http://'.$url;
        }

        $data = @file_get_contents($url);

        preg_match('/<title>(.*?)<\/title>/', $data, $matches);
        if (isset($matches[1])) {
            $titel = $matches[1];
            return $titel;
        }
        return __('NO TITLE');
    }
}

?>
