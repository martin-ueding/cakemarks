<div class="visits view">
<h2><?php  __('Visit');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $visit['Visit']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Bookmark'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($visit['Bookmark']['title'], array('controller' => 'bookmarks', 'action' => 'view', $visit['Bookmark']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $visit['Visit']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Visit', true), array('action' => 'edit', $visit['Visit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Visit', true), array('action' => 'delete', $visit['Visit']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $visit['Visit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Visits', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Visit', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmarks', true), array('controller' => 'bookmarks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark', true), array('controller' => 'bookmarks', 'action' => 'add')); ?> </li>
	</ul>
</div>
