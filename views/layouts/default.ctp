<? /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>
<!doctype html>
	<head>
		<?php echo $this->Html->charset(); ?>

		<title><?=$title_for_layout?></title>
		<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
		<?=$this->Html->css('default')?>
		<?=$this->Html->script('navigation_drawers')?>
		<?=$this->Html->script('flash')?>
		<?=$this->Html->script('bookmark_view')?>
	</head>
	<body>
		<?=$this->element('navigation')?>
		<?=$this->element('quote')?>
		<?=$this->Session->flash()?>

		<page>
			<right>
				<div id="keyword_tree">
					<?=$this->element('keyword_tree', array('show_edit' => false))?>
				</div>
			</right>


			<left>
				<?=$this->element('sticky_keywords')?>
				<?=$this->element('quickadd')?>
			</left>

			<middle>
				<?=$content_for_layout?>
				<footer></footer>
			</middle>

			<?=$this->element('stats')?>
		</page>
		<footer></footer>
	</body>
</html>
