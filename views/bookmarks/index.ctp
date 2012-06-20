<?php /* Copyright © 2011-2012 Martin Ueding <dev@martin-ueding.de> */ ?>

<div id="content" id="bookmark_view">
	<h2><?php __('All Bookmarks');?></h2>
	<table>
	<tr>
		<th><?php echo $this->Paginator->sort('title'); ?></th>
		<th><?php echo $this->Paginator->sort('url'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('modified'); ?></th>
		<th><?php echo $this->Paginator->sort('revisit'); ?></th>
		<th><?php echo $this->Paginator->sort('reading_list'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php foreach ($bookmarks as $bookmark): ?>
	<tr>
		<td><?php echo $bookmark['Bookmark']['title']; ?></td>
		<td><?php echo $bookmark['Bookmark']['url']; ?></td>
		<td><?php echo $bookmark['Bookmark']['created']; ?></td>
		<td><?php echo $bookmark['Bookmark']['modified']; ?></td>
		<td><?php echo $bookmark['Bookmark']['revisit']; ?></td>
		<td><?php echo $bookmark['Bookmark']['reading_list']; ?></td>
		<td class="actions"><nobr>
			<?php echo $this->Html->link(__('View', true),
				array('action' => 'view', $bookmark['Bookmark']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true),
				array('action' => 'edit', $bookmark['Bookmark']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true),
				array('action' => 'delete', $bookmark['Bookmark']['id']), null,
				sprintf(__('Are you sure you want to delete # %s?', true),
				$bookmark['Bookmark']['id'])); ?>
		</nobr></td>
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
