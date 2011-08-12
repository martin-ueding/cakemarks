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
<?PHP
echo $this->Html->link(__('home page', true), array());
echo $this->Html->link(__('new bookmark', true), array('controller' => 'bookmarks', 'action' => 'add'));
echo $this->Html->link(__('list bookmarks', true), array('controller' => 'bookmarks'));
echo $this->Html->link(__('list keywords', true), array('controller' => 'keywords'));
echo $this->Html->link(__('report a bug', true), "https://bugs.launchpad.net/personalphpbookmark/+filebug");
?>
<hr />
				<a href="expunge.php?return='.$mode.(isset($l['key_id']) ? '&return_key='.$l['key_id'] : '', true)?>"><?=__('expunge deleted bookmarks', true)?></a>
				<a href="?mode=refcheck" rel="noreferrer"><?=__('check referrer', true)?></a>
				<a href="?mode=bookmarklet"><?=__('bookmarklet', true)?></a>
			</div>
			<div class="handle"><?=__('navigation', true)?></div>
		</div>





		<?=$content_for_layout?>
	</body>
</html>
