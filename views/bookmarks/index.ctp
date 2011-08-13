<div class="bookmarks index">
	<h2><?php __('Bookmarks');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('revisit');?></th>
			<th><?php echo $this->Paginator->sort('reading_list');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($bookmarks as $bookmark):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $bookmark['Bookmark']['title']; ?>&nbsp;</td>
		<td><?php echo $bookmark['Bookmark']['url']; ?>&nbsp;</td>
		<td><?php echo $bookmark['Bookmark']['created']; ?>&nbsp;</td>
		<td><?php echo $bookmark['Bookmark']['modified']; ?>&nbsp;</td>
		<td class="number"><?php echo $bookmark['Bookmark']['revisit']; ?>&nbsp;</td>
		<td class="checkmark"><?php if ($bookmark['Bookmark']['reading_list']) echo '✓'; ?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $bookmark['Bookmark']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $bookmark['Bookmark']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $bookmark['Bookmark']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $bookmark['Bookmark']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
