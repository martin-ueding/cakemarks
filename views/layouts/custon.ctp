<!doctype html>
	<head>
		<title><?=$title_for_layout?></title>
		<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
		<?=$this->Html->css('cakemarks')?>
		<?=$this->Html->script('navigation_drawers')?>
	</head>
	<body>

		<!-- navigation -->
		<div id="navigation">
			<div class="padding unfold">
				<a href="?"><?=__('home page', false)?></a>
				<a href="?mode=edit"><?=__('new bookmark', false)?></a>
				<a href="?mode=tabelle"><?=__('table', false)?></a>
				<a href="?mode=key_tabelle"><?=__('edit tags', false)?></a>
				<a href="expunge.php?return='.$mode.(isset($l['key_id']) ? '&return_key='.$l['key_id'] : '', false)?>"><?=__('expunge deleted bookmarks', false)?></a>
				<a href="https://bugs.launchpad.net/personalphpbookmark/+filebug" target="_blank"><?=__('report a bug', false)?></a>
				<a href="?mode=refcheck" rel="noreferrer"><?=__('check referrer', false)?></a>
				<a href="?mode=bookmarklet"><?=__('bookmarklet', false)?></a>
				<a href="?mode=remove_duplicate_associations"><?=__('remove duplicate associations', false)?></a>
			</div>
			<div class="handle"><?=__('navigation', false)?></div>
		</div>



		<?=$content_for_layout?>
	</body>
</html>
