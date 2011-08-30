<?php /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>
<!doctype html>
	<head>
		<?php echo $this->Html->charset(); ?>

		<title><?php echo $title_for_layout; ?></title>
	</head>
	<body>
		<?php echo $this->element('navigation'); ?>
		<?php echo $this->Session->flash(); ?>

		<?php echo $content_for_layout; ?>

		<?php echo $this->element('quote'); ?>

		<div id="keyword_tree">
			<h2><?php __('Keywords'); ?></h2>
			<?php echo $this->element('keyword_tree', array('show_edit' => false)); ?>
		</div>


		<?php echo $this->element('sticky_keywords'); ?>
		<?php
		if ($this->params['controller'] != 'bookmarks' || ($this->params['action'] != 'add' && $this->params['action'] != 'edit')) {
			echo $this->element('quickadd');
		}
		?>

		<?php echo $this->element('stats'); ?>
	</body>
</html>
