<?php
/* ----------------------------------------------------------------------
 * app/templates/summary/summary.php
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2014 Whirl-i-Gig
 *
 * For more information visit http://www.CollectiveAccess.org
 *
 * This program is free software; you may redistribute it and/or modify it under
 * the terms of the provided license as published by Whirl-i-Gig
 *
 * CollectiveAccess is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTIES whatsoever, including any implied warranty of 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 *
 * This source code is free and modifiable under the terms of 
 * GNU General Public License. (http://www.gnu.org/copyleft/gpl.html). See
 * the "license.txt" file for details, or visit the CollectiveAccess web site at
 * http://www.CollectiveAccess.org
 *
 * -=-=-=-=-=- CUT HERE -=-=-=-=-=-
 * Template configuration:
 *
 * @name Object tear sheet
 * @type page
 * @pageSize letter
 * @pageOrientation portrait
 * @tables ca_occurrences
 * @marginTop 2.0in
 * @marginLeft 0.75in
 * @marginRight 0.75in
 * @marginBottom 2.0in
 *
 * ----------------------------------------------------------------------
 */

$t_item = $this->getVar('t_subject');
$t_display = $this->getVar('t_display');
$va_placements = $this->getVar("placements");

print $this->render("pdfStart.php");
print $this->render("header.php");
print $this->render("footer.php");

?>
<div class="title">
	<h1 class="title"><?php print $t_item->getLabelForDisplay(); ?></h1>
</div>
<div class="representationList">

	<?php
	$va_reps = $t_item->getRepresentations(array("thumbnail", "medium"));

	foreach ($va_reps as $va_rep) {
		if (sizeof($va_reps) > 1) {
			# --- more than one rep show thumbnails
			$vn_padding_top = ((120 - $va_rep["info"]["thumbnail"]["HEIGHT"]) / 2) + 5;
			print $va_rep['tags']['thumbnail'] . "\n";
		} else {
			# --- one rep - show medium rep
			print $va_rep['tags']['medium'] . "\n";
		}
	}
	?>
</div>
<div class='tombstone'>

	{{{<ifdef code="ca_occurrences.nonpreferred_labels">
		<div class="unit">
			<h6><?= _t("Other Names") ?></h6>
			^ca_occurrences.nonpreferred_labels                            
    	</div>
	</ifdef>}}}

	{{{<ifdef code="ca_occurrences.event_type">
		<div class='unit'>
			<h6><?= _t("Type of Event") ?></h6>
			<strong><?= _t("Type") ?>:&nbsp;</strong>^ca_occurrences.event_type.event_type_value
			<br />
			<strong><?= _t("Bienal Event") ?>:&nbsp;</strong>^ca_occurrences.event_type.event_type_bienal
		</div>
	</ifdef>}}}

	{{{<ifdef code="ca_occurrences.event_period">
		<div class='unit'>
			<h6><?= _t("Event Date") ?></h6>

			<ifdef code="ca_occurrences.event_period.event_period_startdate"><strong><?= _t("Start Date") ?>::&nbsp;</strong>^ca_occurrences.event_period.event_period_startdate<br /></ifdef>
			<ifdef code="ca_occurrences.event_period.event_period_enddate"><strong><?= _t("End Date") ?>:</strong> ^ca_occurrences.event_period.event_period_enddate</ifdef>
		</div>
	</ifdef>}}}

	{{{<ifdef code="ca_occurrences.participants_number">
    	<div class="unit">
        	<h6><?= _t("Number of Participating Artists") ?></h6>
        	^ca_occurrences.participants_number
    	</div>
    </ifdef>}}}

	{{{<ifdef code="ca_occurrences.artworks_number">
    	<div class="unit">
    	    <h6><?= _t("Number of Works Exhibited") ?></h6>
			^ca_occurrences.artworks_number                  
    	</div>
    </ifdef>}}}

	{{{<ifcount code="ca_places" min="1">
    	<div class="unit">
    	    <h6><?= _t("Event Location") ?></h6>
    	    <unit relativeTo="ca_places" delimiter="<br/>" restrictToRelationshipTypes="site"><l>^ca_places.hierarchy.preferred_labels%delimiter=_->_</l></unit>
    	</div>
    </ifcount>}}}

	{{{<ifcount code="ca_entities" min="1" restrictToRelationshipTypes="realizacao">
    	<div class="unit">
    	    <h6><?= _t("Executed By") ?></h6>
    	    <unit relativeTo="ca_entities_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="realizacao"><b><l>^ca_entities.preferred_labels</l></b></unit>
    	</div>
    </ifcount>}}}

	{{{<ifcount code="ca_places" min="1">
        <div class="unit">
            <h6><?= _t("Related Places") ?></h6>
            <unit relativeTo="ca_places" delimiter="<br/>"><l>^ca_places.hierarchy.preferred_labels%delimiter=_->_</l></unit>
        </div>
    </ifcount>}}}

	{{{<ifdef code="ca_occurrences.visitors_number">
    	<div class="unit">
    	    <h6><?= _t("Number of Visitor Attendees") ?></h6>
    	    ^ca_occurrences.visitors_number                            
    	</div>
    </ifdef>}}}

	{{{<ifdef code="ca_occurrences.countries_number">
    	<div class="unit">
    	    <h6><?= _t("Number of Countries Represented") ?></h6>
    	    ^ca_occurrences.countries_number                            
    	</div>
    </ifdef>}}}

	{{{<ifdef code="ca_occurrences.cost">
    	<div class="unit">
    	    <h6><?= _t("Cost") ?></h6>
    	    ^ca_occurrences.cost                            
    	</div>
    </ifdef>}}}

	{{{<ifdef code="ca_occurrences.note">
    	<div class="unit">
    	    <h6><?= _t("Notes") ?></h6>
    	    ^ca_occurrences.note
    	</div>
    </ifdef>}}}

	{{{<ifdef code="ca_occurrences.art_form">
    	<div class="unit">
    	    <h6><?= _t("Artistic Expression") ?></h6>
    	    ^ca_occurrences.art_form
    	</div>
    </ifdef>}}}

	{{{<ifcount code="ca_entities" min="1" restrictToRelationshipTypes="patrocinio,apoio">
    	<div class="unit">
    	    <h6><?= _t("Sponsors and Supporters") ?></h6>
    	    <unit relativeTo="ca_entities" delimiter="<br/>" restrictToRelationshipTypes="patrocinio,apoio"><l>^ca_entities.preferred_labels</l></unit>
    	</div>
    </ifcount>}}}

	{{{<ifcount code="ca_entities" min="1" restrictToRelationshipTypes="curadoria;membro;arquivo;assistente;assessoria;cartaz;arquitetura;apoio;direcao;conselho;catalogo;comissario;comissao;colaboracao;consultor;gerencia;edicao;estagiario;">
    	<div class="unit">
    	    <h6><?= _t("Related Entities (Production Context)") ?></h6>
    	    <unit relativeTo="ca_entities_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="curadoria;membro;arquivo;assistente;assessoria;cartaz;arquitetura;apoio;direcao;conselho;catalogo;comissario;comissao;colaboracao;consultor;gerencia;edicao;estagiario;">
				<b><l>^ca_entities.preferred_labels</l></b>: <unit delimiter=", ">^ca_entities_x_occurrences.ocurrencexentity_entityrole</unit>
			</unit>
    	</div>
    </ifcount>}}}

	{{{<ifcount code="ca_entities" min="1" restrictToRelationshipTypes="representacao">
    	<div class="unit">
    	    <h6><?= _t("National Representation") ?></h6>
    	    <unit relativeTo="ca_entities_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="representacao">
				<b><l>^ca_entities.preferred_labels</l></b>: <unit delimiter=", ">^ca_entities_x_occurrences.ocurrencexentity_entityrole</unit> (<unit delimiter=", ">^ca_entities_x_occurrences.ocurrencexentity_repnacplace</unit>)
			</unit>
    	</div>
    </ifcount>}}}

	{{{<ifcount code="ca_list_items" min="1">
    	<div class="unit">
    	    <h6><?= _t("Related Controlled Vocabulary") ?></h6>
    	    <unit relativeTo="ca_list_items" delimiter="<br/>">^ca_list_items.preferred_labels</unit>
    	</div>
    </ifcount>}}}

	{{{<ifcount code="ca_occurrences.related" min="1" restrictToRelationshipTypes="production">
    	<div class="unit">
    	    <h6><?= _t("Related Event(s)") ?></h6>
    	    <unit relativeTo="ca_occurrences.related" delimiter="<br/>" restrictToRelationshipTypes="production"><unit delimiter=" -> "><l>^ca_occurrences.hierarchy.preferred_labels</l></unit></unit>
    	</div>
    </ifcount>}}}
</div>
<?php
print $this->render("pdfEnd.php");
