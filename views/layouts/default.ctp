<?php /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>
<!doctype html>
	<head>
		<?php echo $this->Html->charset(); ?>

		<title><?php echo $title_for_layout; ?></title>
		<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
		<?php echo $this->Html->css('default'); ?>
		<?php echo $this->Html->script('navigation_drawers'); ?>
		<?php echo $this->Html->script('flash'); ?>
		<?php echo $this->Html->script('bookmark_view'); ?>
		<?php echo $this->Html->script('center_width'); ?>
	</head>
	<body>
		<?php echo $this->element('navigation'); ?>
		<?php echo $this->element('quote'); ?>
		<?php echo $this->Session->flash(); ?>

		<page>
			<right>
				<div id="keyword_tree">
					<?php echo $this->element('keyword_tree', array('show_edit' => false)); ?>
				</div>
			</right>


			<left>
				<?php echo $this->element('sticky_keywords'); ?>
				<?php echo $this->element('quickadd'); ?>
			</left>

			<div id="middle">
				<?php echo $content_for_layout; ?>
				<footer></footer>
			</div>

			<?php echo $this->element('stats'); ?>
		</page>
		<footer></footer>
	</body>
</html>
