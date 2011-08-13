<div class="bookmarks_view">
<h2><?php  __('Bookmark');?></h2>
<p class="title"><?=$bookmark['Bookmark']['title']?></p>
<p class="url"><?=$this->Html->link($bookmark['Bookmark']['url'], array('action' => 'visit', $bookmark['Bookmark']['id']))?></p>


<?php
if (!empty($bookmark['Bookmark']['revisit'])) {
	// TODO i18n
	echo 'revisit every '.$bookmark['Bookmark']['revisit'].' hours';
}

?>
<?  if ($bookmark['Bookmark']['reading_list']): ?>
<p class="reading_list">
This is on your reading list.
</p>

<? endif; ?>
<h3><?php __('Keywords');?></h3>
<ul>
<?php foreach ($bookmark['Keyword'] as $keyword): ?>
<li>
<?php echo $this->Html->link($keyword['title'], array('controller' => 'keywords', 'action' => 'view', $keyword['id'])); ?>
</li>
<?php endforeach; ?>
</ul>

<?=$this->Html->link(__('edit', true), array('action' => 'edit', $bookmark['Bookmark']['id']))?>

<?
echo '<p class="created">Created: '.$bookmark['Bookmark']['created'].'</p>';
echo '<p class="modified">Modified: '.$bookmark['Bookmark']['modified'].'</p>';
?>
