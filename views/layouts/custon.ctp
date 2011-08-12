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
				<a href="?">'._('home page').'</a>
				<a href="?mode=edit">'._('new bookmark').'</a>
				<a href="?mode=tabelle">'._('table').'</a>
				<a href="?mode=key_tabelle">'._('edit tags').'</a>
				<a href="expunge.php?return='.$mode.(isset($l['key_id']) ? '&return_key='.$l['key_id'] : '').'">'._('expunge deleted bookmarks').'</a>
				<a href="https://bugs.launchpad.net/personalphpbookmark/+filebug" target="_blank">'._('report a bug').'</a>
				<a href="?mode=refcheck" rel="noreferrer">'._('check referrer').'</a>
				<a href="?mode=bookmarklet">'._('bookmarklet').'</a>
				<a href="?mode=remove_duplicate_associations">'._('remove duplicate associations').'</a>
			</div>
			<div class="handle"><?=__('navigation', false)?></div>
		</div>



		<?=$content_for_layout?>
	</body>
</html>
