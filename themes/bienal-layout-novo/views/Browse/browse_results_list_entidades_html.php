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
		<th class="browse-results-table-column" style='width:40%'><?= _t("Name of Entity") ?></th>
		<th class="browse-results-table-column"><?= _t("Type") ?></th>
		<th class="browse-results-table-column"><?= _t("Category") ?></th>
		<th class="browse-results-table-column"><?= _t("Bienal Participation") ?></th>
	</tr>
</thead>

<tbody class="browse-results-table-items">
	<?php
	if ($offset < $resultado->numHits()) {
		$vn_c = 0;

		$resultado->seek($offset);

		while ($resultado->nextHit() && ($vn_c < $itens_por_pagina)) {
			$value_id = $resultado->get("ca_entities.{$primary_key}");
			$vs_displayname_link = caDetailLink($this->request, $resultado->get("ca_entities.preferred_labels.displayname"), '', $tabela, $value_id);
			$vs_entity_type = $resultado->get("ca_entities.type_id", array('delimiter' => ', ', 'convertCodesToDisplayText' => true));
			$vs_entity_category = $resultado->get("ca_entities.entity_category", array('delimiter' => ', ', 'convertCodesToDisplayText' => true));
			$vs_bienal_artist = $resultado->get("ca_occurrences.preferred_labels", array('restrictToRelationshipTypes' => array('participation')));
			$vs_bienal_artist = $vs_bienal_artist == "" ? "Não" : "Sim";

			$vs_entity_category = ($vs_entity_category == "") ? "&nbsp;" : $vs_entity_category;

			print "
			<tr class='browse-results-table-row'>
				<td class='browse-results-table-column displayname' style='width:40%'>{$vs_displayname_link}</td>
				<td class='browse-results-table-column type_id'>{$vs_entity_type}</td>
				<td class='browse-results-table-column entity_category'>{$vs_entity_category}</td>
				<td class='browse-results-table-column artist'>{$vs_bienal_artist}</td>
			</tr>";

			$vn_c++;
		}
	}
	?>
</tbody>