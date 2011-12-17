# Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

all: locale/deu/LC_MESSAGES/default.po

%.po: %.pot
	msgmerge -U $@ $^

%.mo: %.po
	msgcat $^ > $@
