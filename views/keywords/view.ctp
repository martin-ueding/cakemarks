<div class="keywords view">
<h2><?php  __('Keyword');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $keyword['Keyword']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $keyword['Keyword']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $keyword['Keyword']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $keyword['Keyword']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parent Keyword'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($keyword['ParentKeyword']['title'], array('controller' => 'keywords', 'action' => 'view', $keyword['ParentKeyword']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sticky'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $keyword['Keyword']['sticky']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Keyword', true), array('action' => 'edit', $keyword['Keyword']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Keyword', true), array('action' => 'delete', $keyword['Keyword']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $keyword['Keyword']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Keywords', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Keyword', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Keywords', true), array('controller' => 'keywords', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Keyword', true), array('controller' => 'keywords', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmarks', true), array('controller' => 'bookmarks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark', true), array('controller' => 'bookmarks', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Keywords');?></h3>
	<?php if (!empty($keyword['ChildKeyword'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Parent Id'); ?></th>
		<th><?php __('Sticky'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($keyword['ChildKeyword'] as $childKeyword):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $childKeyword['id'];?></td>
			<td><?php echo $childKeyword['title'];?></td>
			<td><?php echo $childKeyword['created'];?></td>
			<td><?php echo $childKeyword['modified'];?></td>
			<td><?php echo $childKeyword['parent_id'];?></td>
			<td><?php echo $childKeyword['sticky'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'keywords', 'action' => 'view', $childKeyword['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'keywords', 'action' => 'edit', $childKeyword['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'keywords', 'action' => 'delete', $childKeyword['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $childKeyword['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Keyword', true), array('controller' => 'keywords', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Bookmarks');?></h3>
	<?php if (!empty($keyword['Bookmark'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Url'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Revisit'); ?></th>
		<th><?php __('Reading List'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($keyword['Bookmark'] as $bookmark):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $bookmark['id'];?></td>
			<td><?php echo $bookmark['title'];?></td>
			<td><?php echo $bookmark['url'];?></td>
			<td><?php echo $bookmark['created'];?></td>
			<td><?php echo $bookmark['modified'];?></td>
			<td><?php echo $bookmark['revisit'];?></td>
			<td><?php echo $bookmark['reading_list'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'bookmarks', 'action' => 'view', $bookmark['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'bookmarks', 'action' => 'edit', $bookmark['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'bookmarks', 'action' => 'delete', $bookmark['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $bookmark['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Bookmark', true), array('controller' => 'bookmarks', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
