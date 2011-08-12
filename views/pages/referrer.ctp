<?PHP
// Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

if (empty($_SERVER['HTTP_REFERER'])) {
	__('You referrer is not transmitted.');
}
else {
	printf(__('You come from %s.', true), $_SERVER['HTTP_REFERER']);
}
?>

