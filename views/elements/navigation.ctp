<div id="navigation">
<div class="padding unfold">
<?PHP
echo $this->Html->link(__('home page', true), array('controller' => 'bookmarks', 'action' => 'startscreen'));
echo $this->Html->link(__('new bookmark', true), array('controller' => 'bookmarks', 'action' => 'add'));
echo $this->Html->link(__('list bookmarks', true), array('controller' => 'bookmarks', 'action' => 'index'));
echo $this->Html->link(__('list keywords', true), array('controller' => 'keywords', 'action' => 'index'));
echo $this->Html->link(__('list quotes', true), array('controller' => 'quotes', 'action' => 'index'));
echo $this->Html->link(__('report a bug', true), "https://github.com/martin-ueding/cakemarks/issues/new");
echo $this->Html->link(__('check referrer', true), array('controller' => 'pages', 'action' => 'referrer'), array('rel' => 'noreferrer'));
echo $this->Html->link(__('bookmarklet', true), array('controller' => 'pages', 'action' => 'bookmarklet'));
?>
</div>
<div class="handle"><?=__('navigation', true)?></div>
</div>
