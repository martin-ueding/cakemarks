<?php /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>
<!doctype html>
	<head>
		<?php echo $this->Html->charset(); ?>

		<title><?php echo $title_for_layout; ?></title>
		<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
		<?php echo $this->Html->css('cakemarks'); ?>
		<?php echo $this->Html->css('legacy'); ?>
		<?php echo $this->Html->script('navigation_drawers'); ?>
	</head>
	<body>
		<?php echo $this->element('navigation'); ?>
		<?php echo $this->Session->flash(); ?>

		<?php echo $content_for_layout; ?>
	</body>
</html>
