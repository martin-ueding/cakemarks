<?php /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<div id="bookmark_view">
	<h2><?php __('All Bookmarks');?></h2>
	<p><?php __('sort by'); ?>
		<?php echo $this->Paginator->sort('title'); ?>
		<?php echo $this->Paginator->sort('url'); ?>
		<?php echo $this->Paginator->sort('created'); ?>
		<?php echo $this->Paginator->sort('modified'); ?>
		<?php echo $this->Paginator->sort('revisit'); ?>
		<?php echo $this->Paginator->sort('reading_list'); ?>
	</p>
	<?php echo $this->element('bookmark_view',
		array('bookmarks' => $bookmarks)); ?>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?></p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true),
			array(), null, array('class'=>'disabled')); ?>
	 | 	<?php echo $this->Paginator->numbers(); ?>
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(),
			null, array('class' => 'disabled')); ?>
	</div>
</div>
