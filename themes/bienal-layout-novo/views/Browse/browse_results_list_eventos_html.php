<?php

$acesso = $this->getVar('access_values');
$tabela = $this->getVar('table');
$resultado = $this->getVar('result');
$itens_por_pagina = (int)$this->getVar('hits_per_block');
$offset	= (int)$this->getVar('start');
$primary_key = $this->getVar('primaryKey');

?>

<style>
	#cabecalho .col:nth-child(1) {
		width: 15%
	}

	#cabecalho .col:nth-child(2) {
		width: 35%
	}

	#cabecalho .col:nth-child(3) {
		width: 10%
	}

	#cabecalho .col:nth-child(4) {
		width: 20%
	}

	#cabecalho .col:nth-child(5) {
		width: 10%
	}

	#cabecalho .col:nth-child(6) {
		width: 10%
	}

	.item .col:nth-child(1) {
		width: 15%;
		overflow: hidden
	}

	.item .col:nth-child(2) {
		width: 35%
	}

	.item .col:nth-child(3) {
		width: 10%
	}

	.item .col:nth-child(4) {
		width: 20%
	}

	.item .col:nth-child(5) {
		width: 10%
	}

	.item .col:nth-child(6) {
		width: 10%
	}
</style>

<div class="browse-results-table-header">
	<div class="browse-results-table-column"><?=_t("Identification Code")?></div>
	<div class="browse-results-table-column"><?=_t("Event Name")?></div>
	<div class="browse-results-table-column"><?=_t("Date")?></div>
	<div class="browse-results-table-column"><?=_t("Place")?></div>
	<div class="browse-results-table-column"><?=_t("Bienal Event")?></div>
	<div class="browse-results-table-column"><?=_t("Type")?></div>
</div>

<div class="browse-results-table-items">
<?php
	if ($offset < $resultado->numHits())
	{
		$vn_c = 0;

		$resultado->seek($offset);

		while ($resultado->nextHit() && ($vn_c < $itens_por_pagina)) 
		{
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
			<div class='browse-results-table-row'>
				<div class='browse-results-table-column'>{$value_idno}</div>
				<div class='browse-results-table-column'>{$value_hierarchy_link}</div>
				<div class='browse-results-table-column'>{$value_date}</div>
				<div class='browse-results-table-column'>{$value_local}</div>
				<div class='browse-results-table-column'>{$value_bienal}</div>
				<div class='browse-results-table-column'>{$value_occurrence_type}</div>
			</div>";

			$vn_c++;
		}
	}
?>
</div>