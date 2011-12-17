<div id="actions">
	<h2><?php __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Quote', true), array('action' => 'edit', $quote['Quote']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Quote', true), array('action' => 'delete', $quote['Quote']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $quote['Quote']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Quotes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quote', true), array('action' => 'add')); ?> </li>
	</ul>
</div>

<div id="content" class="quotes_view">
	<h2><?php  __('Quote');?></h2>
	<dl>
		<dt><?php __('Text'); ?></dt>
		<dd>
			<?php echo $quote['Quote']['text']; ?>
		</dd>
		<dt><?php __('Author'); ?></dt>
		<dd>
			<?php echo $quote['Quote']['author']; ?>
		</dd>
	</dl>
</div>
