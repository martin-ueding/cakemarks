<!doctype html>
	<head>
		<title><?=$title_for_layout?></title>
		<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
		<?=$this->Html->css('cakemarks')?>
		<?=$this->Html->script('navigation_drawers')?>
	</head>
	<body>
		<?=$this->element('navigation')?>

		<?=$content_for_layout?>
	</body>
</html>
