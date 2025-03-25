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
		<th class="browse-results-table-column"><?= _t("Identification Code") ?></th>
		<th class="browse-results-table-column"><?= _t("Event Name") ?></th>
		<th class="browse-results-table-column"><?= _t("Date") ?></th>
		<th class="browse-results-table-column"><?= _t("Place") ?></th>
		<th class="browse-results-table-column"><?= _t("Bienal Event") ?></th>
		<th class="browse-results-table-column"><?= _t("Type") ?></th>
	</tr>
</thead>

<tbody class="browse-results-table-items">
	<?php
	if ($offset < $resultado->numHits()) {
		$vn_c = 0;

		$resultado->seek($offset);

		while ($resultado->nextHit() && ($vn_c < $itens_por_pagina)) {
			$value_id = $resultado->get("ca_occurrences.{$primary_key}");
			$value_idno = $resultado->get("ca_occurrences.idno");
			$value_hierarchy_link = caDetailLink($this->request, str_replace(";", " -> ", $resultado->get("ca_occurrences.hierarchy.preferred_labels")), '', $tabela, $value_id);
			$value_hierarchy_link = str_replace("Root node for occurrences ->", "", $value_hierarchy_link);
			$value_date_start = $resultado->get("ca_occurrences.event_period.event_period_startdate", array('delimiter' => ', '));
			$value_date_end = $resultado->get("ca_occurrences.event_period.event_period_enddate", array('delimiter' => ', '));
			$value_local = $resultado->get("ca_entities.preferred_labels", array('delimiter' => ', ', 'convertCodesToDisplayText' => true, 'restrictToRelationshipTypes' => array('realizacao')));
			$value_bienal = $resultado->get("ca_occurrences.event_type.event_type_bienal", array('delimiter' => ', ', 'convertCodesToDisplayText' => true));
			$value_occurrence_type = $resultado->get("ca_occurrences.event_type.event_type_value", array('delimiter' => ', ', 'convertCodesToDisplayText' => true));
			$value_date = $value_date_start ? $value_date_start : "";
			$value_date .= $value_date_end ? ($value_date_start ? " - " . $value_date_end : $value_date_end) : "";

			print "
			<tr class='browse-results-table-row'>
				<td class='browse-results-table-column'>{$value_idno}</td>
				<td class='browse-results-table-column'>{$value_hierarchy_link}</td>
				<td class='browse-results-table-column'>{$value_date}</td>
				<td class='browse-results-table-column'>{$value_local}</td>
				<td class='browse-results-table-column'>{$value_bienal}</td>
				<td class='browse-results-table-column'>{$value_occurrence_type}</td>
			</tr>";

			$vn_c++;
		}
	}
	?>
</tbody>