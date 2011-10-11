<?php
# Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

class FavicoHelper extends AppHelper {
	var $tries = 3;

	function get($url) {
		if ($this->tries-- < 0)
			return;

		$url = trim(str_replace('http://', '', trim($url)), '/');
        $url = explode('/', $url);
		$hash = md5($url[0]);
        $url = 'http://' . $url[0] . '/favicon.ico';

		$dir = 'cache/favico';
		$file = $dir.'/'.$hash;

		if (!file_exists($dir)) {
			if (!mkdir($dir, 0777, true)) {
				die(__('Could not create favico temp dir', true));
			}
		}

		if (!file_exists($file)) {
			$contents = @file_get_contents($url);
			if ($contents) {
				$h = fopen($file, "w");
				fwrite($h, $contents);
				fclose($h);
				return $file;
			}
		}
		else {
			return $file;
		}
	}
}
