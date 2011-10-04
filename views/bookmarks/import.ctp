<?php
# Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

echo '<h2>'.__('Import', true).'</h2>';

echo $this->Form->create('Bookmark', array('action' => 'import'));
echo $this->Form->input('json', array('type' => 'text'));
echo $this->Form->end(__('import', true));

?>
