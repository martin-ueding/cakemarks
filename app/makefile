# Copyright © 2011-2013 Martin Ueding <dev@martin-ueding.de>
# Licensed under the MIT License (http://www.opensource.org/licenses/mit-license.php).

all: locale/deu/LC_MESSAGES/default.po T-webroot

T-webroot:
	make -C webroot

%.po: %.pot
	msgmerge -U $@ $^
