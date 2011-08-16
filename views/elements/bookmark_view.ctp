<?php if (!empty($bookmarks)):?>
<div class="bookmark_view">

<?php foreach ($bookmarks as $bookmark): ?>
<div class="bookmark_element">
<?php echo $this->Html->link($bookmark['Bookmark']['title'], array('controller' => 'bookmarks', 'action' => 'visit', $bookmark['Bookmark']['id']), array('class' => 'black', 'title' => $bookmark['Bookmark']['url'])); ?>

<div class="edit">
<?=$this->Html->link(__('View', true), array('controller' => 'bookmarks', 'action' => 'view', $bookmark['Bookmark']['id'])) ?>
<?=$this->Html->link(__('Edit', true), array('controller' => 'bookmarks', 'action' => 'edit', $bookmark['Bookmark']['id'])) ?>
<?=$this->Html->link(__('Delete', true), array('controller' => 'bookmarks', 'action' => 'delete', $bookmark['Bookmark']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $bookmark['Bookmark']['id'])) ?>

</div>
</div>
<?php endforeach; ?>
<footer></footer>
</div>
<?php endif; ?>
