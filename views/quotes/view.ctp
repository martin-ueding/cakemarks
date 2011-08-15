<div class="quotes view">
<h2><?php  __('Quote');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $quote['Quote']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Text'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $quote['Quote']['text']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Author'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $quote['Quote']['author']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Quote', true), array('action' => 'edit', $quote['Quote']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Quote', true), array('action' => 'delete', $quote['Quote']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $quote['Quote']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Quotes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quote', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
