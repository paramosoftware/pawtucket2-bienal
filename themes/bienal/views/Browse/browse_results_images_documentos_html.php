<?php

$acesso = $this->getVar('access_values');
$tabela = $this->getVar('table');
$resultado = $this->getVar('result');
$itens_por_pagina = (int)$this->getVar('hits_per_block');
$offset	= (int)$this->getVar('start');
$primary_key = $this->getVar('primaryKey');

?>

<div id="cabecalho">
    
    <div class="col" style='width:50%'>imagem</div>
    <div class="col" style='width:50%'>documento</div>
    
</div>

<div id="itens">

<?php

if ( $offset < $resultado->numHits() ) {

		$vn_c = 0;

		$resultado->seek( $offset );
		
		while( $resultado->nextHit() && ( $vn_c < $itens_por_pagina ) ) {
			
			$value_id = $resultado->get("ca_objects.{$primary_key}");
			$value_hierarchy = caDetailLink($this->request, str_replace(";"," -> ", $resultado->get("ca_objects.hierarchy.preferred_labels") ), '', $tabela , $value_id);
			$value_mediaviewer = caDetailLink($this->request, str_replace(";"," -> ", $resultado->get("ca_object_representations.media.small") ), '', $tabela , $value_id );
			
			print "
			<div class='item'>
				<div class='col' style='width:50%'>{$value_mediaviewer}</div>
				<div class='col' style='width:50%'>{$value_hierarchy}</div>
			</div>";
			
			$vn_c++;

		}
		
	}

?>

</div>