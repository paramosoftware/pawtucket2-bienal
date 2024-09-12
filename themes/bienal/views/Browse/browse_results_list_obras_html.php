<?php

$acesso = $this->getVar('access_values');
$tabela = $this->getVar('table');
$resultado = $this->getVar('result');
$itens_por_pagina = (int)$this->getVar('hits_per_block');
$offset	= (int)$this->getVar('start');
$primary_key = $this->getVar('primaryKey');

?>

<style>

#cabecalho .col:nth-child(1) {width:18%}
#cabecalho .col:nth-child(2) {width:30%}
#cabecalho .col:nth-child(3) {width:15%}
#cabecalho .col:nth-child(4) {width:10%}
#cabecalho .col:nth-child(5) {width:10%}
#cabecalho .col:nth-child(6) {width:17%}

.item .col:nth-child(1) {width:18%}
.item .col:nth-child(2) {width:30%}
.item .col:nth-child(3) {width:15%}
.item .col:nth-child(4) {width:10%}
.item .col:nth-child(5) {width:10%}
.item .col:nth-child(6) {width:17%}

@media screen and (min-width:1380px) {
	
	#cabecalho .col:nth-child(1) {width:15%}
	#cabecalho .col:nth-child(2) {width:30%}
	#cabecalho .col:nth-child(3) {width:15%}
	#cabecalho .col:nth-child(4) {width:10%}
	#cabecalho .col:nth-child(5) {width:10%}
	#cabecalho .col:nth-child(6) {width:20%}
	
	.item .col:nth-child(1) {width:15%}
	.item .col:nth-child(2) {width:30%}
	.item .col:nth-child(3) {width:15%}
	.item .col:nth-child(4) {width:10%}
	.item .col:nth-child(5) {width:10%}
	.item .col:nth-child(6) {width:20%}
	
}

</style>

<div id="cabecalho">
    
    <div class="col">Código de identificação</div>
    <div class="col">nome da obra</div>
    <div class="col">artista</div>
    <div class="col">técnica</div>
    <div class="col">data</div>
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
			<div class='item'>
				<div class='col idno'>{$value_idno}</div>
				<div class='col displayname'>{$value_displayname_link}</div>
				<div class='col artist'>{$value_artistname}</div>
				<div class='col technique'>{$value_tech}</div>
				<div class='col date'>{$value_date}</div>
				<div class='col event'>{$value_event}</div>
			</div>";
			
			$vn_c++;

		}
		
	}

?>

</div>