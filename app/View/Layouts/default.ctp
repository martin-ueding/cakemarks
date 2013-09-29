<?php /* Copyright © 2011-2013 Martin Ueding <dev@martin-ueding.de> */ ?>
<!doctype html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
        <?php echo $this->Html->charset(); ?>
        <?php echo $this->Html->css("tungsten"); ?>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.7.1.min.js"></script>
        <?php echo $this->Html->script("favicon-download"); ?>
        <title><?php echo $title_for_layout; ?></title>
        <link rel="icon" href="favicon.png" type="image/png">
    </head>
    <body>
        <div id="page">
            <div id="logo">
                <h1>Cakemarks</h1>
            </div>

            <?php echo $this->Session->flash(); ?>

            <?php echo $this->element('navigation'); ?>

            <?php echo $this->fetch('content'); ?>

            <?php echo $this->element('quote'); ?>

            <div id="keyword_tree">
                <h2><?php echo __('Keywords'); ?></h2>
                <?php echo $this->element('keyword_tree',
                    array('show_edit' => false)); ?>
            </div>


            <?php echo $this->element('sticky_keywords'); ?>
            <?php if ($this->request->params['controller'] != 'bookmarks'
                || ($this->request->params['action'] != 'add'
                && $this->request->params['action'] != 'edit')) {
                echo $this->element('quickadd');
            }
            ?>

            <?php echo $this->element('stats'); ?>
        </div>
    </body>
</html>
