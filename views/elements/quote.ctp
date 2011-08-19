<?php /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>

<?php $quote = $this->requestAction(array('controller' => 'quotes', 'action' => 'random')); ?>

<div id="quote">
<p>
<?php echo $quote['Quote']['text']; ?>
<?php if (!empty($quote['Quote']['author'])): ?>
	-- <?php echo $quote['Quote']['author']; ?>
<?php endif; ?>
</p>
</div>

<div class="clearheinz"></div>
