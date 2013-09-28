<div id="actions">
	<h2><?php echo __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Quote'), array('action' => 'edit', $quote['Quote']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Quote'), array('action' => 'delete', $quote['Quote']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $quote['Quote']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Quotes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quote'), array('action' => 'add')); ?> </li>
	</ul>
</div>

<div id="content" class="quotes_view">
	<h2><?php echo __('Quote');?></h2>
	<dl>
		<dt><?php echo __('Text'); ?></dt>
		<dd>
			<?php echo $quote['Quote']['text']; ?>
		</dd>
		<dt><?php echo __('Author'); ?></dt>
		<dd>
			<?php echo $quote['Quote']['author']; ?>
		</dd>
	</dl>
</div>
