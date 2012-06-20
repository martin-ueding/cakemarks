<?php
# Copyright © 2011-2012 Martin Ueding <dev@martin-ueding.de>
# Licensed under the MIT License (http://www.opensource.org/licenses/mit-license.php).
?>

<div id="content" class="bookmarks_form">

<?php
echo '<h2>'.__('Import', true).'</h2>';

if ($show_results): ?>

	<h3><?php __('Last Import'); ?></h3>
<dl>
	<dt><?php __('imported bookmarks'); ?></dt>
	<dd><?php echo $import_result['added_bookmarks']; ?></dd>
	<dt><?php __('already existing bookmarks'); ?></dt>
	<dd><?php echo $import_result['existing_bookmarks']; ?></dd>
	<dt><?php __('imported keywords'); ?></dt>
	<dd><?php echo $import_result['added_keywords']; ?></dd>
	<dt><?php __('already existing keywords'); ?></dt>
	<dd><?php echo $import_result['existing_keywords']; ?></dd>
</dl>

<?php endif; ?>

<?php if ($show_form) {
	echo '<h3>'.__('New Import', true).'</h3>';
	echo $this->Form->create('Bookmark', array('action' => 'import'));
	echo $this->Form->input('json', array('type' => 'text', 'rows' => 20, 'cols' => 80));
	echo $this->Form->end(__('import', true));
}
?>
</div>
