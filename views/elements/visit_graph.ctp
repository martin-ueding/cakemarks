<?php
# Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>
?>

<?php echo $this->Html->script("raphael"); ?>
<?php echo $this->Html->script("popup"); ?>
<?php echo $this->Html->script("jquery"); ?>
<?php echo $this->Html->script("analytics"); ?>

<table id="data">
	<tfoot>
		<tr>
			<?php
			for ($i = 0; $i < count($bin_data); $i++) {
				echo '<th>'.$bin_data[$i]["title"].'</th>';
			}
			?>
		</tr>
	</tfoot>
	<tbody>
		<tr>
			<?php
			for ($i = 0; $i < count($bin_data); $i++) {
				echo '<td>'.$bin_data[$i]["hits"].'</td>';
			}
			?>
		</tr>
	</tbody>
</table>
<div id="hitgraphholder"></div>
