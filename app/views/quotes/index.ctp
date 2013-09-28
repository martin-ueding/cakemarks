<div id="actions">
	<h2><?php echo __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('New Quote'), array('action' => 'add')); ?></li>
	</ul>
</div>

<div id="content" class="quotes_view">
	<h2><?php echo __('Quotes');?></h2>
	<table>
	<tr>
		<th><?php echo $this->Paginator->sort('text');?></th>
		<th><?php echo $this->Paginator->sort('author');?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php foreach ($quotes as $quote): ?>
	<tr>
		<td><?php echo $quote['Quote']['text']; ?>&nbsp;</td>
		<td><nobr><?php echo $quote['Quote']['author']; ?></nobr></td>
		<td class="actions"><nobr>
			<?php echo $this->Html->link(__('View'),
				array('action' => 'view', $quote['Quote']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'),
				array('action' => 'edit', $quote['Quote']['id'])); ?>
			<?php echo $this->Html->link(__('Delete'),
				array('action' => 'delete', $quote['Quote']['id']), null,
				sprintf(__('Are you sure you want to delete # %s?'),
				$quote['Quote']['id'])); ?>
		</nobr></td>
	</tr>
	<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous'), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next') . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
