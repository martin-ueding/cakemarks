<?php
# Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

echo '<h2>'.__('Import', true).'</h2>';

if ($show_results): ?>

<dl>
	<dt><?php __('Imported Bookmarks'); ?></dt>
	<dd><?php echo $import_result['added_bookmarks']; ?></dd>
</dl>

<?php endif; ?>

<?php if ($show_form) {
	echo $this->Form->create('Bookmark', array('action' => 'import'));
	echo $this->Form->input('json', array('type' => 'text', 'rows' => 20, 'cols' => 80));
	echo $this->Form->end(__('import', true));
}


?>
