<? /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<div class="bookmarkbox">
	<div class="title"><?=$title?></div>
	<div class="content">
		<table>
		<? foreach ($bookmarks as $bookmark): ?>
			<tr>
				<td>
				<?=$this->Html->link($bookmark['Bookmark']['title'], array('controller' => 'bookmarks', 'action' => 'visit', $bookmark['Bookmark']['id']), array('rel' => 'noreferrer'))?>
				</td>
				<td>
				<?=$this->Html->image('edit.png',
					array(
						'alt' => __('edit', true),
						'url' => array(
							'controller' => 'bookmarks',
							'action' => 'edit',
							$bookmark['Bookmark']['id']
						)
					)
				) ?>
				</td>
			</tr>
		<? endforeach; ?>
		</table>
	</div>
</div>
