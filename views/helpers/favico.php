<?php
# Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

class FavicoHelper extends AppHelper {
	function get($url) {
		$url = trim(str_replace('http://', '', trim($url)), '/');
        $url = explode('/', $url);
        $url = 'http://' . $url[0] . '/';

		return $url.'favico.ico';
	}
}
