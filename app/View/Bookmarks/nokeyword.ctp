<?php
# Copyright © 2013 Martin Ueding <dev@martin-ueding.de>
# Licensed under The MIT License
?>

<div id="content">
    <h2><?php echo __('Bookmarks without Keywords'); ?></h2>
    <?php
    echo $this->element('bookmark_view', array(
            'bookmarks' => $data,
        ));
    ?>
</div>
