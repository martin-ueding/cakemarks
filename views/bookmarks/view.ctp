<div class="bookmarks view">
<h2><?php  __('Bookmark');?></h2>
<?php echo $bookmark['Bookmark']['title']; ?>
<?php echo $bookmark['Bookmark']['url']; ?>
<?php echo $bookmark['Bookmark']['created']; ?>
<?php echo $bookmark['Bookmark']['modified']; ?>
<?php echo $bookmark['Bookmark']['revisit']; ?>
<p><?php if ($bookmark['Bookmark']['reading_list']) echo '✓'; ?></p>
</div>
<div class="related">
<h3><?php __('Related Keywords');?></h3>
<?php
foreach ($bookmark['Keyword'] as $keyword):
?>
<td><?php echo $keyword['title'];?></td>
<?php echo $this->Html->link(__('View', true), array('controller' => 'keywords', 'action' => 'view', $keyword['id'])); ?>
<?php endforeach; ?>

</div>
