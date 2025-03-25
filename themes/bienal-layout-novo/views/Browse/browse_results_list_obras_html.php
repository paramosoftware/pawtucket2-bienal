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
		<th class="browse-results-table-column"><?= _t("Title of the Artwork") ?></th>
		<th class="browse-results-table-column"><?= _t("Artist") ?></th>
		<th class="browse-results-table-column"><?= _t("Technique") ?></th>
		<th class="browse-results-table-column"><?= _t("Date") ?></th>
		<th class="browse-results-table-column"><?= _t("Event") ?></th>
	</tr>
</thead>

<tbody class="browse-results-table-items">
	<?php
	if ($offset < $resultado->numHits()) {
		$vn_c = 0;

		$resultado->seek($offset);

		while ($resultado->nextHit() && ($vn_c < $itens_por_pagina)) {

			$value_id = $resultado->get("ca_objects.{$primary_key}");
			$value_idno = $resultado->get("ca_objects.idno");
			$value_displayname_link = caDetailLink($this->request, $resultado->get("ca_objects.preferred_labels.name"), '', $tabela, $value_id);
			$value_artistname = $resultado->get('ca_entities.preferred_labels', array("checkAccess" => $acesso, 'delimiter' => ', ', 'restrictToRelationshipTypes' => array('creator')));

			$va_tecnicas = array();

			$vs_tecnica = $resultado->get("ca_objects.artwork_technique", array('delimiter' => '; ', 'convertCodesToDisplayText' => true));
			$vs_tecnica_processo = $resultado->get("ca_objects.artwork_technique_process", array('delimiter' => '; ', 'convertCodesToDisplayText' => true));

			if ($vs_tecnica)
				$va_tecnicas[] = $vs_tecnica;

			if ($vs_tecnica_processo)
				$va_tecnicas[] = $vs_tecnica_processo;

			$value_tech = implode("; ", $va_tecnicas);

			$value_date = $resultado->get("ca_objects.production_date.production_date_value", array('delimiter' => ', ', 'convertCodesToDisplayText' => true));
			$value_event = $resultado->get('ca_occurrences.preferred_labels', array("checkAccess" => $acesso, 'delimiter' => ', ', 'restrictToRelationshipTypes' => array('participation')));

			print "
			<tr class='browse-results-table-row'>
				<td class='browse-results-table-column idno'>{$value_idno}</td>
				<td class='browse-results-table-column displayname'>{$value_displayname_link}</td>
				<td class='browse-results-table-column artist'>{$value_artistname}</td>
				<td class='browse-results-table-column technique'>{$value_tech}</td>
				<td class='browse-results-table-column date'>{$value_date}</td>
				<td class='browse-results-table-column event'>{$value_event}</td>
			</tr>";

			$vn_c++;
		}
	}
	?>
</tbody>