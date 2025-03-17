<?php
	$acesso = $this->getVar('access_values');
	$tabela = $this->getVar('table');
	$resultado = $this->getVar('result');
	$itens_por_pagina = (int)$this->getVar('hits_per_block');
	$offset	= (int)$this->getVar('start');
	$primary_key = $this->getVar('primaryKey');
?>

<div class="browse-results-table-header">
	<div class="browse-results-table-column"><img src="<?= $this->request->getBaseUrlPath() . '/themes/bienal-layout-novo/assets/pawtucket/graphics/image.png' ?>" width="24px"></div>
	<div class="browse-results-table-column"><?= _t("Reference Code") ?></div>
	<div class="browse-results-table-column"><?= _t("Type of Document") ?></div>
	<div class="browse-results-table-column"><?= _t("Level / Document") ?></div>
	<div class="browse-results-table-column"><?= _t("Date") ?></div>
	<div class="browse-results-table-column"><?= _t("Genre") ?></div>
	<div class="browse-results-table-column"><?= _t("Type.") ?></div>
	<div class="browse-results-table-column"><?= _t("Event") ?></div>
</div>

<div class="browse-results-table-items">
<?php
	if ($offset < $resultado->numHits()) 
	{
		$vn_c = 0;

		$resultado->seek($offset);

		while ($resultado->nextHit() && ($vn_c < $itens_por_pagina)) 
		{
			$value_id = $resultado->get("ca_objects.{$primary_key}");
			$value_idno = $resultado->get("ca_objects.idno");
			$value_type = $resultado->get("ca_objects.type_id", array('delimiter' => ', ', 'convertCodesToDisplayText' => true));
			$value_hierarchy = caDetailLink($this->request, str_replace(";", " -> ", $resultado->get("ca_objects.hierarchy.preferred_labels")), '', $tabela, $value_id);
			$value_date = $resultado->get("ca_objects.unitdate.date_value", array('delimiter' => ',', 'convertCodesToDisplayText' => true));
			$value_genero = $resultado->get("ca_objects.document_genre", array('delimiter' => ', ', 'convertCodesToDisplayText' => true));
			$value_especie = $resultado->get("ca_objects.document_type", array('delimiter' => ', ', 'convertCodesToDisplayText' => true));
			//$value_evento = $resultado->get("ca_occurrences.hierarchy.preferred_labels", array('delimiter' => ' -> '));
			$value_evento = $resultado->getWithTemplate('<unit relativeTo="ca_objects_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="production"><unit relativeTo="ca_occurrences" delimiter=" -> ">^ca_occurrences.hierarchy.preferred_labels</unit></unit>');

			$vs_image_check_icon = "";
			if ($resultado->get("ca_objects.rs_resource_public") == 227)
				$vs_image_check_icon = '<img src="' . $this->request->getBaseUrlPath() . '/themes/bienal-layout-novo/assets/pawtucket/graphics/image.png" width="24px">';

			print "
			<div class='browse-results-table-row'>
				<div class='browse-results-table-column'>{$vs_image_check_icon}</div>
				<div class='browse-results-table-column'>{$value_idno}</div>
				<div class='browse-results-table-column'>{$value_type}</div>
				<div class='browse-results-table-column'>{$value_hierarchy}</div>
				<div class='browse-results-table-column'>{$value_date}</div>
				<div class='browse-results-table-column'>{$value_genero}</div>
				<div class='browse-results-table-column'>{$value_especie}</div>
				<div class='browse-results-table-column'>{$value_evento}</div>																	   
			</div>";

			$vn_c++;
		}
	}
?>
</div>
