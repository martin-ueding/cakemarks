<?php /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<div id="actions">
	<h2><?php __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bookmark', true),
			array('action' => 'edit', $bookmark['Bookmark']['id'])); ?></li>
		<li><?php echo $this->Html->link(__('Delete Bookmark', true),
			array('action' => 'delete', $bookmark['Bookmark']['id']), null,
			sprintf(__('Are you sure you want to delete # %s?', true),
			$bookmark['Bookmark']['id'])); ?></li>
		<li><?php echo $this->Html->link(__('New Bookmark', true),
			array('action' => 'add')); ?></li>
	</ul>
</div>

<div id="content" class="bookmark_view">
	<h2><?php __('View Bookmark'); ?></h2>

	<dl>
		<dt><?php __('Title'); ?></dt>
		<dd><?php echo $bookmark['Bookmark']['title']; ?></dd>

		<dt><?php __('URL'); ?></dt>
		<dd><?php echo $this->Html->link($bookmark['Bookmark']['url'],
			array('action' => 'visit', $bookmark['Bookmark']['id'])); ?></dd>


		<?php if (!empty($bookmark['Bookmark']['revisit'])): ?>
			<dt><?php __('Revisit'); ?></dt>
			<dd><?php printf(__('every %d hours', true),
				$bookmark['Bookmark']['revisit']); ?></dd>
			<dt><?php __('Next Scheduled Visit'); ?></dt>
			<dd><?php echo $this->Time->timeAgoInWords($next_visit, array(), true); ?></dd>
		<?php endif; ?>

		<?php if ($bookmark['Bookmark']['reading_list']): ?>
			<dt><?php __('Reading List'); ?></dt>
			<dd><?php __('This is on your reading list.'); ?></dd>
		<?php endif; ?>

		<?php if (!empty($bookmark['Keyword'])): ?>
		<dt><?php __('Related Keywords'); ?></dt>
		<?php foreach ($bookmark['Keyword'] as $keyword): ?>
			<dd><?php echo $this->Html->link($keyword['title'],
				array('controller' => 'keywords', 'action' => 'view',
				$keyword['id'])); ?></dd>
		<?php endforeach; ?>
		<?php endif; ?>

		<dt><?php __('Visit Count'); ?></dt>
		<dd><?php echo $visits; ?></dd>

		<dt><?php __('Last Visit'); ?></dt>
		<dd><?php echo $this->Time->timeAgoInWords($last_visit, array(), true); ?></dd>

		<?php if (!empty($bookmark['Visit'])): ?>
			<dt><?php __('Visits'); ?><dt>
			<?php foreach($bookmark['Visit'] as $visit): ?>
				<dd><?php echo $visit['created']; ?></dd>
			<?php endforeach; ?>
		<?php endif; ?>

		<?php if (!empty($bin_data)): ?>
			<dt><?php __('Visits by month'); ?><dt>
			<dd>
				<table id="data">
					<tfoot>
						<tr>
<?php
for ($i = 0; $i < count($bin_data); $i++) {
	echo "<td>$i</td>";
}
?>
						</tr>
					</tfoot>
					<tbody>
						<tr>
<?php
for ($i = 0; $i < count($bin_data); $i++) {
	echo '<td>'.$bin_data[$i].'</td>';
}
?>
						</tr>
					</tbody>
				</table>
				<div id="holder"></div>
			</dd>
		<?php endif; ?>

		<dt><?php __('Created'); ?></dt>
		<dd><?php echo $bookmark['Bookmark']['created']; ?></dd>

		<dt><?php __('Modified'); ?></dt>
		<dd><?php echo $bookmark['Bookmark']['modified']; ?></dd>
	</dl>
</div>
