<?php
# Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

echo $this->Html->script("raphael");
echo $this->Html->script("popup");
echo $this->Html->script("jquery");
echo $this->Html->script("analytics");

$bin_data = $this->requestAction('/visits/bins/'.$id, array('cache' => '+5 min'));
?>

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
