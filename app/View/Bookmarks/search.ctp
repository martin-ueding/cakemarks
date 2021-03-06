<?php
# Copyright © 2012-2013 Martin Ueding <dev@martin-ueding.de>
# Licensed under the MIT License (http://www.opensource.org/licenses/mit-license.php).
?>

<div id="content" class="bookmark_view">
    <h2><?php echo __('Search');?></h2>

    <?php
    echo $this->Form->create(false);
    echo $this->Form->input('query');
    echo $this->Form->end(__('Search'));
    ?>

    <?php if (isset($bookmarks)): ?>
    <h3><?php echo __('Search Results'); ?></h3>

    <?php if (count($bookmarks) == 0): ?>
    <?php echo __('No search results.'); ?>
    <?php else: ?>
    <table>
    <tr>
        <th><?php echo $this->Paginator->sort('title'); ?></th>
        <th><?php echo $this->Paginator->sort('url'); ?></th>
        <th><?php echo $this->Paginator->sort('revisit', __('RV')); ?></th>
        <th><?php echo $this->Paginator->sort('reading_list', __('RL')); ?></th>
        <th class="actions"><?php echo __('Actions');?></th>
    </tr>
    <?php foreach ($bookmarks as $bookmark): ?>
    <tr>
        <td><?php echo $bookmark['Bookmark']['title']; ?></td>
        <td><?php echo String::truncate($bookmark['Bookmark']['url'], 100); ?></td>
        <td><?php echo ($bookmark['Bookmark']['revisit'] ? __('RV') : ''); ?></td>
        <td><?php echo ($bookmark['Bookmark']['reading_list'] ? __('RL') : ''); ?></td>
        <td class="actions"><nobr>
            <?php echo $this->Html->link(__('View'),
                array('action' => 'view', $bookmark['Bookmark']['id'])); ?>
            <?php echo $this->Html->link(__('Edit'),
                array('action' => 'edit', $bookmark['Bookmark']['id'])); ?>
            <?php echo $this->Html->link(__('Delete'),
                array('action' => 'delete', $bookmark['Bookmark']['id']), null,
                sprintf(__('Are you sure you want to delete # %s?'),
                $bookmark['Bookmark']['id'])); ?>
        </nobr></td>
    </tr>
    <?php endforeach; ?>
    </table>
    <p>
    <?php
    echo $this->Paginator->counter(array(
    'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
    ));
    ?>  </p>

    <div class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('previous'), array(), null, array('class'=>'disabled'));?>
     |  <?php echo $this->Paginator->numbers();?>
 |
        <?php echo $this->Paginator->next(__('next') . ' >>', array(), null, array('class' => 'disabled'));?>
    </div>
    <?php endif; ?>
    <?php endif; ?>
</div>
