// Copyright © 2013 Martin Ueding <dev@martin-ueding.de>
// Licensed under The MIT License

function start_favicon_download() {
    console.log($.get("bookmarks/downloadfavicons"));
}

$(start_favicon_download);
