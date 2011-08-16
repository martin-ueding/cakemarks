<?php if (!empty($keyword['Bookmark'])):?>
<div class="bookmark_view">

<?php foreach ($keyword['Bookmark'] as $bookmark): ?>
<div class="bookmark_element">
<?php echo $this->Html->link($bookmark['title'], array('controller' => 'bookmarks', 'action' => 'visit', $bookmark['id'])); ?>

<div class="edit">
<?=$this->Html->link(__('View', true), array('action' => 'view', $bookmark['id'])) ?>
<?=$this->Html->link(__('Edit', true), array('action' => 'edit', $bookmark['id'])) ?>
<?=$this->Html->link(__('Delete', true), array('action' => 'delete', $bookmark['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $bookmark['id'])) ?>

</div>
</div>
<?php endforeach; ?>

</div>
<?php endif; ?>
