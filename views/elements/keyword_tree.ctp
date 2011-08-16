<?  // Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> ?>
<ul>
<?

$keywords = $this->requestAction(array('controller' => 'keywords', 'action' => 'tree'), array('cache' => '+5 min'));

if (!function_exists('traverse_tree')) {
	function traverse_tree($tree, $that, $show_edit) {
		foreach ($tree as $node) {
			echo '<li>';
			echo $that->Html->link($node['Keyword']['title'], array('controller' => 'keywords', 'action' => 'view', $node['Keyword']['id']), array('class' => 'black'));

			if ($show_edit) {
				echo ' &nbsp; ';
				echo $that->Html->link(__('Edit', true), array('action' => 'edit', $node['Keyword']['id']));
				echo ' ';
				echo $that->Html->link(__('Delete', true), array('action' => 'delete', $node['Keyword']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $node['Keyword']['id']));
			}

			if (!empty($node['children'])) {
				echo '<ul>';
				traverse_tree($node['children'], $that, $show_edit);
				echo '</ul>';
			}
			echo '</li>';
		}
	}
}

traverse_tree($keywords, $this, $show_edit);
?>
</ul>
