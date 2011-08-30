<div id="actions">
	<h2><?php __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('New Quote', true), array('action' => 'add')); ?></li>
	</ul>
</div>

<h2><?php __('Quotes');?></h2>
	<table>
	<tr>
		<th><?php echo $this->Paginator->sort('text');?></th>
		<th><?php echo $this->Paginator->sort('author');?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($quotes as $quote):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $quote['Quote']['text']; ?>&nbsp;</td>
		<td><nobr><?php echo $quote['Quote']['author']; ?></nobr></td>
		<td class="actions"><nobr>
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $quote['Quote']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $quote['Quote']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $quote['Quote']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $quote['Quote']['id'])); ?>
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
