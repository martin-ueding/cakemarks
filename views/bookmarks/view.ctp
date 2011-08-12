<div class="bookmarks view">
<h2><?php  __('Bookmark');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bookmark['Bookmark']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bookmark['Bookmark']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bookmark['Bookmark']['url']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bookmark['Bookmark']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bookmark', true), array('action' => 'edit', $bookmark['Bookmark']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Bookmark', true), array('action' => 'delete', $bookmark['Bookmark']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $bookmark['Bookmark']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmarks', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Visits', true), array('controller' => 'visits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Visit', true), array('controller' => 'visits', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Keywords', true), array('controller' => 'keywords', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Keyword', true), array('controller' => 'keywords', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Visits');?></h3>
	<?php if (!empty($bookmark['Visit'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Bookmark Id'); ?></th>
		<th><?php __('Time'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($bookmark['Visit'] as $visit):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $visit['id'];?></td>
			<td><?php echo $visit['bookmark_id'];?></td>
			<td><?php echo $visit['time'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'visits', 'action' => 'view', $visit['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'visits', 'action' => 'edit', $visit['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'visits', 'action' => 'delete', $visit['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $visit['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Visit', true), array('controller' => 'visits', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Keywords');?></h3>
	<?php if (!empty($bookmark['Keyword'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($bookmark['Keyword'] as $keyword):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $keyword['id'];?></td>
			<td><?php echo $keyword['title'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'keywords', 'action' => 'view', $keyword['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'keywords', 'action' => 'edit', $keyword['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'keywords', 'action' => 'delete', $keyword['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $keyword['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Keyword', true), array('controller' => 'keywords', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
