<div class="bookmarkbox">

<div class="title">
<?=$title?>
</div>

<div class="content">
<table>
<?PHP
foreach ($bookmarks as $bookmark) {
	echo '<tr>';
	echo '<td>';
	echo $this->Html->link($bookmark['Bookmark']['title'], array('controller' => 'bookmarks', 'action' => 'visit', $bookmark['Bookmark']['id']), array('rel' => 'noreferrer'));
	echo '</td>';
	echo '<td>';
	echo $this->Html->image('edit.png',
		array(
			'alt' => __('edit', true),
			'url' => array(
				'controller' => 'bookmarks',
				'action' => 'edit',
				$bookmark['Bookmark']['id']
			)
		)
	);
	echo '</td>';
	echo '</tr>';
}
?>
</table>
</div>

</div>
