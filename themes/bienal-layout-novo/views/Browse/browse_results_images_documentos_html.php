<?php
$acesso = $this->getVar('access_values');
$tabela = $this->getVar('table');
$resultado = $this->getVar('result');
$itens_por_pagina = (int)$this->getVar('hits_per_block');
$offset	= (int)$this->getVar('start');
$primary_key = $this->getVar('primaryKey');
?>

<thead class="browse-results-table-header">
	<tr>
		<th class="browse-results-table-column">imagem</th>
		<th class="browse-results-table-column">documento</th>
	</tr>
</thead>

<tbody class="browse-results-table-items">
	<?php
	if ($offset < $resultado->numHits()) {

		$vn_c = 0;

		$resultado->seek($offset);

		while ($resultado->nextHit() && ($vn_c < $itens_por_pagina)) {
			$value_id = $resultado->get("ca_objects.{$primary_key}");
			$value_hierarchy = caDetailLink($this->request, str_replace(";", " -> ", $resultado->get("ca_objects.hierarchy.preferred_labels")), '', $tabela, $value_id);
			$value_mediaviewer = caDetailLink($this->request, str_replace(";", " -> ", $resultado->get("ca_object_representations.media.small")), '', $tabela, $value_id);

			print "
			<tr class='browse-results-table-row'>
				<td class='browse-results-table-column'>{$value_mediaviewer}</td>
				<td class='browse-results-table-column'>{$value_hierarchy}</td>
			</tr>";

			$vn_c++;
		}
	}
	?>
</tbody>