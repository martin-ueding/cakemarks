<?php
# Copyright (c) 2011-2012 Martin Ueding <dev@martin-ueding.de>

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
