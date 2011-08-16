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
		<?=$this->element('quote')?>

		<page>
			<right>
				<div id="keyword_tree">
					<?=$this->element('keyword_tree', array('show_edit' => false))?>
				</div>
			</right>


			<left>
				<?=$this->element('sticky_keywords',
					array('sticky_keywords' => $sticky_keywords, 'stats' => $stats))?>
				<?=$this->element('quickadd')?>
			</left>

			<middle>
				<?=$this->Session->flash()?>

				<?=$content_for_layout?>
			</middle>

			<?=$this->element('stats')?>
		</page>
		<footer></footer>
	</body>
</html>
