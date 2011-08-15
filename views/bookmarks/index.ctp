<div class="bookmarks index">
	<h2><?php __('Bookmarks');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?=$this->Paginator->sort('title')?></th>
			<th><?=$this->Paginator->sort('url')?></th>
			<th><?=$this->Paginator->sort('created')?></th>
			<th><?=$this->Paginator->sort('modified')?></th>
			<th><?=$this->Paginator->sort('revisit')?></th>
			<th><?=$this->Paginator->sort('reading_list')?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php foreach ($bookmarks as $bookmark): ?>
	<tr>
		<td><?=$bookmark['Bookmark']['title']?>&nbsp;</td>
		<td><?=$bookmark['Bookmark']['url']?>&nbsp;</td>
		<td><?=$bookmark['Bookmark']['created']?>&nbsp;</td>
		<td><?=$bookmark['Bookmark']['modified']?>&nbsp;</td>
		<td class="number"><?=$bookmark['Bookmark']['revisit']?>&nbsp;</td>
		<td class="checkmark"><?php if ($bookmark['Bookmark']['reading_list']) echo '✓'; ?></td>
		<td class="actions">
			<?=$this->Html->link(__('View', true), array('action' => 'view', $bookmark['Bookmark']['id'])) ?>
			<?=$this->Html->link(__('Edit', true), array('action' => 'edit', $bookmark['Bookmark']['id'])) ?>
			<?=$this->Html->link(__('Delete', true), array('action' => 'delete', $bookmark['Bookmark']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $bookmark['Bookmark']['id'])) ?>
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
		<?=$this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'))?>
	 | 	<?=$this->Paginator->numbers()?>
		<?=$this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'))?>
	</div>
</div>
