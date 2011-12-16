# Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

all: webroot/css/tungsten.css

%.css: %.scss
	sass $^ $@
