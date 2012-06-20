<?php
# Copyright © 2011-2012 Martin Ueding <dev@martin-ueding.de>
# Licensed under the MIT License (http://www.opensource.org/licenses/mit-license.php).

class VisitsController extends AppController {

	var $name = 'Visits';
	var $uses = array('Visit');

	function bins($id) {
		$bin_count = Configure::read("visits.bins");

		$visits = $this->Visit->find('all', array(
			"conditions" => array("Visit.bookmark_id" => $id)));

		for ($i = 0; $i < $bin_count; $i++) {
			$bins[] = array("hits" => 0);
			$raw_bin[] = array();
		}

		foreach ($visits as $v) {
			$time = $v["Visit"]["created"];
			$timestamp = strtotime($time);
			$stamps[] = $timestamp;
		}

		if (count($stamps) <= 1) {
			return null;
		}

		$min = min($stamps);
		$max = max($stamps);

		foreach ($stamps as $stamp) {
			$which = min($bin_count*($stamp-$min)/($max-$min), $bin_count-1);
			$raw_bin[$which][] = $stamp;
			$bins[$which]["hits"]++;
		}
		for ($i = 0; $i < $bin_count; $i++) {
			if (!isset($bins[$i]["title"])) {
				if (count($raw_bin[$i]) > 0) {
					$min = min($raw_bin[$i]);
					$max = max($raw_bin[$i]);

					if ($min == $max) {
						$bins[$i]["title"] = date(Configure::read("dateformat"), $min);
					}
					else {
						$bins[$i]["title"] = date(Configure::read("dateformat"), $min)." &ndash; ".date(Configure::read("dateformat"), $max);
					}
				}
				else {
					$bins[$i]["title"] = "";
				}
			}
		}

		return $bins;
	}
}
