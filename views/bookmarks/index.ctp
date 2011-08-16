<h1><?php __('Bookmarks');?></h1>
<p><? __('sort by'); ?>

<?=$this->Paginator->sort('title')?> <?=$this->Paginator->sort('url')?> <?=$this->Paginator->sort('created')?> <?=$this->Paginator->sort('modified')?> <?=$this->Paginator->sort('revisit')?> <?=$this->Paginator->sort('reading_list')?>
	</p>
<?=$this->element('bookmark_view', array('bookmarks' => $bookmarks))?>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?>	</p>

	<div class="paging">
		<?=$this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'))?>
	 | 	<?=$this->Paginator->numbers()?>
		<?=$this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'))?>
	</div>
