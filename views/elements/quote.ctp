<? /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<div id="quote">
<p id="quote_paragraph">
<?=$quote['text']?>
<? if (!empty($quote['author'])): ?>
	-- <?=$quote['author']?>
<? endif; ?>
</p>
</div>

<div class="clearheinz"></div>
