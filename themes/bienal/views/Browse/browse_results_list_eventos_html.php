<?php

$acesso = $this->getVar('access_values');
$tabela = $this->getVar('table');
$resultado = $this->getVar('result');
$itens_por_pagina = (int)$this->getVar('hits_per_block');
$offset	= (int)$this->getVar('start');
$primary_key = $this->getVar('primaryKey');

?>

<style>

#cabecalho .col:nth-child(1) {width:15%}
#cabecalho .col:nth-child(2) {width:35%}
#cabecalho .col:nth-child(3) {width:10%}
#cabecalho .col:nth-child(4) {width:20%}
#cabecalho .col:nth-child(5) {width:10%}
#cabecalho .col:nth-child(6) {width:10%}

.item .col:nth-child(1) {width:15%;overflow:hidden}
.item .col:nth-child(2) {width:35%}
.item .col:nth-child(3) {width:10%}
.item .col:nth-child(4) {width:20%}
.item .col:nth-child(5) {width:10%}
.item .col:nth-child(6) {width:10%}

</style>

<div id="cabecalho">
    
    <div class="col">código de identificação</div>
    <div class="col">nome do evento</div>
    <div class="col">data</div>
    <div class="col">local</div>
    <div class="col">evento bienal</div>
    <div class="col">tipo</div>
    
</div>

<div id="itens">

<?php

if ( $offset < $resultado->numHits() ) {

		$vn_c = 0;

		$resultado->seek( $offset );
		
		while( $resultado->nextHit() && ( $vn_c < $itens_por_pagina ) ) {
			
			$value_id = $resultado->get("ca_occurrences.{$primary_key}");
			$value_idno = $resultado->get("ca_occurrences.idno");
			$value_hierarchy_link = caDetailLink($this->request, str_replace(";"," -> ", $resultado->get("ca_occurrences.hierarchy.preferred_labels") ), '', $tabela, $value_id);		
			$value_hierarchy_link = str_replace( "Root node for occurrences ->" , "" , $value_hierarchy_link );			
			$value_date_start = $resultado->get("ca_occurrences.event_period.event_period_startdate", array('delimiter' => ', '));			
			$value_date_end = $resultado->get("ca_occurrences.event_period.event_period_enddate", array('delimiter' => ', '));	
			$value_local = $resultado->get("ca_entities.preferred_labels", array('delimiter' => ', ', 'convertCodesToDisplayText' => true , 'restrictToRelationshipTypes' => array('realizacao') ) );
			$value_bienal = $resultado->get("ca_occurrences.event_type.event_type_bienal", array('delimiter' => ', ', 'convertCodesToDisplayText' => true));			
			$value_occurrence_type = $resultado->get("ca_occurrences.event_type.event_type_value", array('delimiter' => ', ', 'convertCodesToDisplayText' => true));	
			$value_date = $value_date_start ? $value_date_start : "";
			$value_date .= $value_date_end ? ( $value_date_start ? " - " . $value_date_end : $value_date_end ) : "";
			
			print "
			<div class='item'>
				<div class='col'>{$value_idno}</div>
				<div class='col'>{$value_hierarchy_link}</div>
				<div class='col'>{$value_date}</div>
				<div class='col'>{$value_local}</div>
				<div class='col'>{$value_bienal}</div>
				<div class='col'>{$value_occurrence_type}</div>
			</div>";
			
			$vn_c++;

		}
		
	}

?>

</div>