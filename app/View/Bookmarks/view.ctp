<?php /* Copyright © 2011-2013 Martin Ueding <dev@martin-ueding.de> */ ?>

<div id="actions">
    <h2><?php echo __('Actions'); ?></h2>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Bookmark'),
            array('action' => 'edit', $bookmark['Bookmark']['id'])); ?></li>
        <li><?php echo $this->Html->link(__('Delete Bookmark'),
            array('action' => 'delete', $bookmark['Bookmark']['id']), null,
            sprintf(__('Are you sure you want to delete # %s?'),
            $bookmark['Bookmark']['id'])); ?></li>
        <li><?php echo $this->Html->link(__('New Bookmark'),
            array('action' => 'add')); ?></li>
    </ul>
</div>

<div id="content" class="bookmark_view">
    <h2><?php echo __('View Bookmark'); ?></h2>

    <dl>
        <dt><?php echo __('Title'); ?></dt>
        <dd><?php echo $bookmark['Bookmark']['title']; ?></dd>
        <dt><?php echo __('Favicon'); ?></dt>
        <dd><?php echo $this->Favicon->get_favicon_img($bookmark['Bookmark']['url']); ?></dd>

        <dt><?php echo __('URL'); ?></dt>
        <dd><?php echo $this->Html->link($bookmark['Bookmark']['url'],
            array('action' => 'visit', $bookmark['Bookmark']['id'])); ?></dd>


        <?php if (!empty($bookmark['Bookmark']['revisit'])): ?>
            <dt><?php echo __('Revisit'); ?></dt>
            <dd><?php printf(__('every %d hours'),
                $bookmark['Bookmark']['revisit']); ?></dd>
            <dt><?php echo __('Next Scheduled Visit'); ?></dt>
            <!-- XXX This cannot be localized, bug in CakePHP. -->
            <dd><?php echo $this->Time->timeAgoInWords($next_visit, array(), true); ?></dd>
        <?php endif; ?>

        <?php if ($bookmark['Bookmark']['reading_list']): ?>
            <dt><?php echo __('Reading List'); ?></dt>
            <dd><?php echo __('This is on your reading list.'); ?></dd>
        <?php endif; ?>

        <?php if ($bookmark['Bookmark']['mobile']): ?>
            <dt><?php echo __('Mobile'); ?></dt>
            <dd><?php echo __('This is a mobile bookmark.'); ?></dd>
        <?php endif; ?>

        <?php if (!empty($bookmark['Keyword'])): ?>
        <dt><?php echo __('Related Keywords'); ?></dt>
        <?php foreach ($bookmark['Keyword'] as $keyword): ?>
            <dd><?php echo $this->Html->link($keyword['title'],
                array('controller' => 'keywords', 'action' => 'view',
                $keyword['id'])); ?></dd>
        <?php endforeach; ?>
        <?php endif; ?>

        <dt><?php echo __('Visit Count'); ?></dt>
        <dd><?php echo $bookmark['Bookmark']['visits']; ?></dd>

        <dt><?php echo __('Recent Visit Count'); ?></dt>
        <dd><?php echo $bookmark['Bookmark']['recent_visits']; ?></dd>

        <?php if (isset($last_visit)): ?>
            <dt><?php echo __('Last Visit'); ?></dt>
            <dd><?php echo $this->Time->timeAgoInWords($last_visit, array(), true); ?></dd>
        <?php endif; ?>

        <?php if ($bookmark['Bookmark']['visits'] > 1): ?>
            <dt><?php echo __('visits by interval'); ?><dt>
            <dd>
            <?php echo $this->element('visit_graph', array("id" => $bookmark["Bookmark"]["id"])); ?>
            </dd>
        <?php endif; ?>

        <?php if ($bookmark['Bookmark']['created'] > 0): ?>
            <dt><?php echo __('Created'); ?></dt>
            <dd><?php echo $bookmark['Bookmark']['created']; ?></dd>
        <?php endif; ?>

        <?php if ($bookmark['Bookmark']['modified'] > 0): ?>
            <dt><?php echo __('Modified'); ?></dt>
            <dd><?php echo $bookmark['Bookmark']['modified']; ?></dd>
        <?php endif; ?>
    </dl>
</div>
