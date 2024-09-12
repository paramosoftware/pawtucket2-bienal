<?php

$acesso = $this->getVar('access_values');
$tabela = $this->getVar('table');
$resultado = $this->getVar('result');
$itens_por_pagina = (int)$this->getVar('hits_per_block');
$offset	= (int)$this->getVar('start');
$primary_key = $this->getVar('primaryKey');

?>

<style>

#cabecalho .col:nth-child(1) {width:3%}
#cabecalho .col:nth-child(2) {width:17%}
#cabecalho .col:nth-child(3) {width:8%}
#cabecalho .col:nth-child(4) {width:22%}
#cabecalho .col:nth-child(5) {width:10%}
#cabecalho .col:nth-child(6) {width:10%}
#cabecalho .col:nth-child(7) {width:10%}
#cabecalho .col:nth-child(8) {width:18%}

.item .col:nth-child(1) {width:3%}
.item .col:nth-child(2) {width:17%}
.item .col:nth-child(3) {width:8%}
.item .col:nth-child(4) {width:22%}
.item .col:nth-child(5) {width:10%}
.item .col:nth-child(6) {width:10%}
.item .col:nth-child(7) {width:10%}
.item .col:nth-child(8) {width:18%}


@media screen and (min-width:1380px) {

	#cabecalho .col:nth-child(1) {width:3%; padding-left:5px}
	#cabecalho .col:nth-child(2) {width:15%}
	#cabecalho .col:nth-child(3) {width:8%}
	#cabecalho .col:nth-child(4) {width:26%}
	#cabecalho .col:nth-child(5) {width:10%}
	#cabecalho .col:nth-child(6) {width:10%}
	#cabecalho .col:nth-child(7) {width:10%}
	#cabecalho .col:nth-child(8) {width:18%}
	
	.item .col:nth-child(1) {width:3%; padding-left:7px}
	.item .col:nth-child(2) {width:15%}
	.item .col:nth-child(3) {width:8%}
	.item .col:nth-child(4) {width:26%}
	.item .col:nth-child(5) {width:10%}
	.item .col:nth-child(6) {width:10%}
	.item .col:nth-child(7) {width:10%}
	.item .col:nth-child(8) {width:18%}
	
}

</style>

<div id="cabecalho">
    
	<div class="col"><img src="/pawtucket/themes/bienal/assets/graphics/image.png" width="24px"></div>
    <div class="col">código de referência</div>
    <div class="col">Tipo de documento</div>
    <div class="col">nível/documento</div>
    <div class="col">data</div>
    <div class="col">gênero</div>
    <div class="col">espécie</div>
    <div class="col">evento</div>
    
</div>

<div id="itens">

<?php

if ( $offset < $resultado->numHits() ) {

		$vn_c = 0;

		$resultado->seek( $offset );
		
		while( $resultado->nextHit() && ( $vn_c < $itens_por_pagina ) ) {
			
			$value_id = $resultado->get("ca_objects.{$primary_key}");
			$value_idno = $resultado->get("ca_objects.idno");
			$value_type = $resultado->get("ca_objects.type_id", array('delimiter' => ', ', 'convertCodesToDisplayText' => true));
			$value_hierarchy = caDetailLink($this->request, str_replace(";"," -> ", $resultado->get("ca_objects.hierarchy.preferred_labels") ), '', $tabela, $value_id);
			$value_date = $resultado->get("ca_objects.unitdate.date_value", array('delimiter' => ',', 'convertCodesToDisplayText' => true ) );
			$value_genero = $resultado->get("ca_objects.document_genre", array('delimiter' => ', ', 'convertCodesToDisplayText' => true));
			$value_especie = $resultado->get("ca_objects.document_type", array('delimiter' => ', ', 'convertCodesToDisplayText' => true));
			//$value_evento = $resultado->get("ca_occurrences.hierarchy.preferred_labels", array('delimiter' => ' -> '));
			$value_evento = $resultado->getWithTemplate('<unit relativeTo="ca_objects_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="production"><unit relativeTo="ca_occurrences" delimiter=" -> ">^ca_occurrences.hierarchy.preferred_labels</unit></unit>');
			
			$vs_image_check_icon = "";
			if ($resultado->get("ca_objects.rs_resource_public") == 227)
				$vs_image_check_icon = '<img src="/pawtucket/themes/bienal/assets/graphics/check.png" width="16px">';				 
																							  
			print "
			<div class='item'>
				<div class='col'>{$vs_image_check_icon}</div>
				<div class='col'>{$value_idno}</div>
				<div class='col'>{$value_type}</div>
				<div class='col'>{$value_hierarchy}</div>
				<div class='col'>{$value_date}</div>
				<div class='col'>{$value_genero}</div>
				<div class='col'>{$value_especie}</div>
				<div class='col'>{$value_evento}</div>																	   
			</div>";
			
			$vn_c++;

		}
		
	}

?>

</div>