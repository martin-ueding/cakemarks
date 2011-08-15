<? /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<div id="stats">
	<table>
		<tr>
			<td><?=$stats['bookmark_count']?></td>
			<td><?=__n('bookmark', 'bookmarks', $stats['bookmark_count'], true)?></td>
		</tr>
		<tr>
			<td><?=$stats['quote_count']?></td>
			<td><?=__n('quote', 'quotes', $stats['quote_count'], true)?></td>
		</tr>
		<tr>
			<td><?=$stats['visit_count']?></td>
			<td><?=__n('visit', 'visits', $stats['visit_count'], true)?></td>
		</tr>
		<tr>
			<td><?=$stats['keyword_count']?></td>
			<td><?=__n('keyword', 'keywords', $stats['keyword_count'], true)?></td>
		</tr>
	</table>
</div>
