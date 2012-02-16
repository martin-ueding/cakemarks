# Copyright (c) 2011-2012 Martin Ueding <dev@martin-ueding.de>

all: webroot/css/tungsten.css locale/deu/LC_MESSAGES/default.po

%.css: %.scss
	sass $^ $@

%.po: %.pot
	msgmerge -U $@ $^
