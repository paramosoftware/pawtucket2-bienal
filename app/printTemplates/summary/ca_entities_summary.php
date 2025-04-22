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
 * @tables ca_entities
 * @marginTop 0.75in
 * @marginLeft 0.5in
 * @marginRight 0.5in
 * @marginBottom 0.75in
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
		<h1 class="title"><?php print $t_item->getLabelForDisplay();?></h1>
	</div>
	<div class="representationList">
		
<?php
	$va_reps = $t_item->getRepresentations(array("thumbnail", "medium"));

	foreach($va_reps as $va_rep) {
		if(sizeof($va_reps) > 1){
			# --- more than one rep show thumbnails
			$vn_padding_top = ((120 - $va_rep["info"]["thumbnail"]["HEIGHT"])/2) + 5;
			print $va_rep['tags']['thumbnail']."\n";
		}else{
			# --- one rep - show medium rep
			print $va_rep['tags']['medium']."\n";
		}
	}
?>
	</div>
	<div class='tombstone'>]
		{{{<ifdef code="ca_entities.preferred_labels.displayname">
    		<div class="unit">
    		    <h6><?= _t("Display Name") ?></h6>
    		    ^ca_entities.preferred_labels.displayname
    		</div>
    	</ifdef>}}}

		{{{<ifdef code="ca_entities.preferred_labels.otherforenames">
        	<div class="unit">
        	    <h6><?= _t("Other First Names") ?></h6>
        	    ^ca_entities.preferred_labels.otherforenames
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_entities.nonpreferred_labels">
        	<div class="unit">
        	    <h6><?= _t("Alternative Names") ?></h6>
        	    ^ca_entities.nonpreferred_labels
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_entities.nonpreferred_labels.otherforenames">
            <div class="unit">
                <h6><?= _t("Other Alternative First Names") ?></h6>
                ^ca_entities.nonpreferred_labels.otherforenames
            </div>
        </ifdef>}}}

		{{{<ifdef code="ca_entities.lifespandates">
        	<ifdef code="ca_entities.lifespandates.lifespandate_birthdate">
        	    <div class="unit">
        	        <h6><?= _t("Date of Birth") ?></h6>
        	        ^ca_entities.lifespandates.lifespandate_birthdate
        	    </div>
        	</ifdef>
        	<ifdef code="ca_entities.lifespandates.lifespandate_deathdate">
        	    <div class="unit">
        	        <h6><?= _t("Date of Death") ?></h6>
        	        ^ca_entities.lifespandates.lifespandate_deathdate
        	    </div>
        	</ifdef>
        </ifdef>}}}

		{{{<ifdef code="ca_entities.biography">
        	<div class="unit">
        	    <h6><?= _t("Biography") ?></h6>
        	    ^ca_entities.biography
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_entities.entity_category">
			<unit relativeTo="ca_entities.entity_category">
				<if rule="^ca_entities.entity_category =~ /Artista \/ Arquiteto/">
					<div class="unit">
						<h6><?= _t("Entity Category") ?></h6>
						^ca_entities.entity_category
					</div>
				</if>
			</unit>
        </ifdef>}}}

		{{{<ifdef code="ca_entities.entity_functions">
        	<div class="unit">
        	    <h6><?= _t("Occupation/Functions") ?></h6>
        	    ^ca_entities.entity_functions
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_places" min="1" restrictToRelationshipTypes="birthplace">
        	<div class="unit">
        	    <h6><?= _t("Nationality") ?></h6>
        	    <unit relativeTo="ca_places" restrictToRelationshipTypes="birthplace">^ca_places.preferred_labels.name</unit>
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_entities.note">
        	<div class="unit">
        	    <h6><?= _t("Note") ?></h6>
        	    ^ca_entities.note
        	</div>
        </ifdef>}}}

		{{{<ifcount code="ca_objects" min="1" restrictToTypes="artworks">
        	<div class="unit">
        	    <h6><?= _t("Related Artwork") ?></h6>
        	    <unit relativeTo="ca_objects" delimiter="<br>" restrictToTypes="artworks"><b><l>^ca_objects.preferred_labels</l></b> (<unit delimiter=", " relativeTo="ca_occurrences">^ca_occurrences.preferred_labels</unit>)</unit>
        	</div>
        </ifcount>}}}

		<!-- -->

		{{{<ifcount code="ca_occurrences" min="1" restrictToRelationshipTypes="participation">
        	<div class="unit">
        	    <h6><?= _t("Event Participation") ?></h6>
        	    <unit relativeTo="ca_entities_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="participation"><b><unit relativeTo="ca_occurrences" delimiter=" -> " ><l>^ca_occurrences.hierarchy.preferred_labels</l></unit></b> - <ifdef code="ca_entities_x_occurrences.participation_event_section"><unit delimiter=", ">^ca_entities_x_occurrences.participation_event_section</unit></ifdef>: <unit delimiter=", ">^ca_entities_x_occurrences.participation_type</unit> <ifdef code="ca_entities_x_occurrences.national_representation">(<unit delimiter=", ">^ca_entities_x_occurrences.national_representation</unit>)</ifdef></unit>
        	</div>
        </ifcount>}}}

		{{{<ifcount code="ca_occurrences" min="1" restrictToRelationshipTypes="award">
        	<div class="unit">
        	    <h6><?= _t("Prize Awarded") ?></h6>
        	    <unit relativeTo="ca_entities_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="award"><b><unit relativeTo="ca_occurrences" delimiter=" -> " ><l>^ca_occurrences.preferred_labels</l></unit></b>: <unit delimiter=", ">^ca_entities_x_occurrences.bienal_awards</unit></unit>
        	</div>
        </ifcount>}}}

		{{{<ifcount code="ca_occurrences" min="1" restrictToRelationshipTypes="representacao">
        	<div class="unit">
        	    <h6><?= _t("Representation in Event") ?></h6>
        	    <unit relativeTo="ca_entities_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="representacao"><b><unit relativeTo="ca_occurrences" delimiter=" -> "><l>^ca_occurrences.preferred_labels</l></unit></b>: <unit delimiter=", ">^ca_entities_x_occurrences.ocurrencexentity_entityrole</unit> <ifdef code="ca_entities_x_occurrences.national_representation">(<unit delimiter=", ">^ca_entities_x_occurrences.ocurrencexentity_repnacplace</unit>)</ifdef></unit>
        	</div>
        </ifcount>}}}

		{{{<ifcount code="ca_occurrences" min="1" excludeRelationshipTypes="participation;award;representacao;pesquisado_por;entidade_pesquisada">
        	<div class="unit">
        	    <h6><?= _t("Related Events") ?></h6>
        	    <div>
        	        <unit relativeTo="ca_entities_x_occurrences" restrictToTypes="event;section;subsection" delimiter="<br>" excludeRelationshipTypes="participation;award;representacao;pesquisado_por;entidade_pesquisada">

					<b><unit relativeTo="ca_occurrences" restrictToTypes="event;section;subsection" delimiter=" -> ">
					<l>^ca_occurrences.hierarchy.preferred_labels</l></unit></b>: 
					<unit delimiter=", ">^ca_entities_x_occurrences.ocurrencexentity_entityrole</unit> 
					<ifdef code="ca_entities_x_occurrences.ocurrencexentity_notes">
					(<unit delimiter=", ">^ca_entities_x_occurrences.ocurrencexentity_notes</unit>)
					</ifdef>

					</unit>
        	    </div>
        	</div>
        </ifcount>}}}

		{{{<ifcount code="ca_entities.related" min="1">
        	<div class="unit">
        	    <h6><?= _t("Related Entities") ?></h6>
        	    <unit relativeTo="ca_entities.related" delimiter="<br>"><l>^ca_entities.preferred_labels</l></unit>
        	</div>
        </ifcount>}}}

		{{{<ifdef code="ca_entities.external_link">
        	<div class="unit">
        	    <h6><?= _t("External Links") ?></h6>
        	    <div>
					<unit relativeTo="ca_entities.external_link" delimiter="<br/>">
						<a href="^ca_entities.external_link.url_entry" target="_blank">
        	            <b>
							<ifdef code="ca_entities.external_link.url_source">
								^ca_entities.external_link.url_source
							</ifdef>

							<ifnotdef code="ca_entities.external_link.url_source">
								^ca_entities.external_link.url_entry
							</ifnotdef>
        	            </b>
						</a>
					</unit>
				</div>
        	</div>
        </ifdef>}}}
	</div>
<?php	
	print $this->render("pdfEnd.php");