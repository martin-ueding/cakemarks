<div id="actions">
	<h2><?php __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('New Keyword', true),
			array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Edit Keyword', true),
			array('action' => 'edit', $keyword['Keyword']['id'])); ?></li>
		<li><?php echo $this->Html->link(__('Delete Keyword', true),
			array('action' => 'delete', $keyword['Keyword']['id']),
			null,
			sprintf(__('Are you sure you want to delete # %s?', true),
			$keyword['Keyword']['id'])); ?></li>
	</ul>
</div>

<div class="keyword_view">
	<h2><?php __('View Keyword'); ?></h2>
	<dl>
		<dt><?php __('Title'); ?></dt>
		<dd><?php echo $keyword['Keyword']['title']; ?></dd>

		<dt><?php __('Related Bookmarks'); ?></dt>
		<dd><?php echo $this->element('bookmark_view',
			array('bookmarks' => $keyword)); ?></dd>
	</dl>
</div>
