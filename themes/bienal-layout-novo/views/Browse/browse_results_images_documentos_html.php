<?php

$acesso = $this->getVar('access_values');
$tabela = $this->getVar('table');
$resultado = $this->getVar('result');
$itens_por_pagina = (int)$this->getVar('hits_per_block');
$offset	= (int)$this->getVar('start');
$primary_key = $this->getVar('primaryKey');

?>

<style>
	.col {
		display: flex;
		align-items: center;
	}

	.col:nth-child(1) {
		max-width: 30%;
		width: 30%;
	}

	.col:nth-child(2) {
		max-width: 69% !important;
		width: 69%;
	}

	#itens .col:nth-child(2) a {
		color: var(--primary);
		text-decoration: none;
		text-transform: none;

		&:hover {
			color: var(--secondary);
		}
	}
</style>

<div id="cabecalho">

	<div class="col">imagem</div>
	<div class="col">documento</div>

</div>

<div id="itens">

	<?php

	if ($offset < $resultado->numHits()) {

		$vn_c = 0;

		$resultado->seek($offset);

		while ($resultado->nextHit() && ($vn_c < $itens_por_pagina)) {

			$value_id = $resultado->get("ca_objects.{$primary_key}");
			$value_hierarchy = caDetailLink($this->request, str_replace(";", " -> ", $resultado->get("ca_objects.hierarchy.preferred_labels")), '', $tabela, $value_id);
			$value_mediaviewer = caDetailLink($this->request, str_replace(";", " -> ", $resultado->get("ca_object_representations.media.small")), '', $tabela, $value_id);

			print "
			<div class='item'>
				<div class='col'>{$value_mediaviewer}</div>
				<div class='col'>{$value_hierarchy}</div>
			</div>";

			$vn_c++;
		}
	}

	?>

</div>