<?php
# Copyright © 2011-2013 Martin Ueding <dev@martin-ueding.de>
# Licensed under the MIT License (http://www.opensource.org/licenses/mit-license.php).

$config["UI"] = array(
	"Startscreen" => array(
		"BoxLength" => 30
	),
	"VisitGraph" => array(
		"BinCount" => 12
	),
	// You can change the main theme here.
	// Available themes:
	// - tungsten
	'CSS' => 'tungsten',
);

Configure::write("dateformat", "Y-m-d");
Configure::write("visits.bins", 10);

Configure::write("favicon.runs", 1);
Configure::write("favicon.show", true);

Configure::write('search.items', 15);
