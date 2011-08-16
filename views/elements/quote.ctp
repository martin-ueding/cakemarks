<? /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<? $quote = $this->requestAction(array('controller' => 'quotes', 'action' => 'random')); ?>

<div id="quote">
<p>
<?=$quote['Quote']['text']?>
<? if (!empty($quote['Quote']['author'])): ?>
	-- <?=$quote['Quote']['author']?>
<? endif; ?>
</p>
</div>

<div class="clearheinz"></div>
