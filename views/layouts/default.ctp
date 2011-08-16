<? /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>
<!doctype html>
	<head>
		<?php echo $this->Html->charset(); ?>

		<title><?=$title_for_layout?></title>
		<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
		<?=$this->Html->css('default')?>
		<?=$this->Html->script('navigation_drawers')?>
	</head>
	<body>
		<?=$this->element('navigation')?>
		<?=$this->Session->flash()?>

		<div id="page">
			<?=$content_for_layout?>

			<?=$this->element('stats')?>
		</div>
	</body>
</html>
