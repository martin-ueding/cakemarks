<?php /* Copyright (c) 2011-2012 Martin Ueding <dev@martin-ueding.de> */ ?>

<?php $quote = $this->requestAction(array('controller' => 'quotes', 'action' => 'random')); ?>

<div id="quote">
	<h2><?php __('Quote'); ?></h2>
	<p>
	<?php echo $quote['Quote']['text']; ?>
	<?php if (!empty($quote['Quote']['author'])): ?>
		&mdash; <?php echo $quote['Quote']['author']; ?>
	<?php endif; ?>
	</p>
</div>

