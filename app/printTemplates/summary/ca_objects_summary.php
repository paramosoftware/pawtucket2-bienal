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
 * @tables ca_objects
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
	<div class='tombstone'>


		{{{<ifdef code="ca_objects.nonpreferred_labels">
    		<div class="unit">
    		    <h6><?= _t("Other Titles") ?></h6>
    		    ^ca_objects.nonpreferred_labels
    		</div>
    	</ifdef>}}}

		{{{<ifdef code="ca_objects.production_date.production_date_value">
        	<div class="unit">
        	    <h6><?= _t("Production Date") ?></h6>
        	    ^ca_objects.production_date.production_date_value
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.artwork_material_support">
        	<div class="unit">
        	    <h6><?= _t("Technique") ?></h6>
        	    ^ca_objects.artwork_material_support
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.artwork_technique">
        	<div class="unit">
        	    <h6><?= _t("Technique") ?></h6>
        	    ^ca_objects.artwork_technique
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.artwork_type">
        	<div class="unit">
        	    <h6><?= _t("Type of Work") ?></h6>
        	    ^ca_objects.artwork_type
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.art_form">
        	<div class="unit">
        	    <h6><?= _t("Artistic Expression") ?></h6>
        	    ^ca_objects.art_form
        	</div>
        </ifdef>}}}

		<!-- -->

		{{{<ifdef code="ca_objects.unitdate.date_value">
        	<div class="unit">
        	    <h6><?= _t("Dates") ?></h6>
        	    <unit relativeTo="ca_objects.unitdate" delimiter="<br>">^ca_objects.unitdate.dates_types: ^ca_objects.unitdate.date_value</unit>       
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.document_genre">
        	<div class="unit">
        	    <h6><?= _t("Documentary Genre") ?></h6>
        	    ^ca_objects.document_genre
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.document_type">
        	<div class="unit">
        	    <h6><?= _t("Document Type") ?></h6>
        	    ^ca_objects.document_type
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.analog_digital">
        	<div class="unit">
        	    <unit><?= _t("Analog/Digital") ?></unit>
        	    ^ca_objects.analog_digital
        	</div>
        </ifdef>}}}

		<!-- -->

		{{{<ifdef code="ca_objects.form">
        	<div class="unit">
        	    <h6><?= _t("Form") ?></h6>
        	    ^ca_objects.form
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.inscription">
        	<div class="unit">
        	    <h6><?= _t("Inscription") ?></h6>
        	    ^ca_objects.inscription
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.other_identification_form">
        	<div class="unit">
        	    <h6><?= _t("Pre-existing Identification") ?></h6>
        	    ^ca_objects.other_identification_form
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.others_idno">
        	<div class="unit">
        	    <h6><?= _t("Other Numbers or Identification Codes") ?></h6>
        	    ^ca_objects.others_idno
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.document_support">
        	<div class="unit">
        	    <h6><?= _t("Other Numbers or Identification Codes") ?></h6>
        	    ^ca_objects.document_support
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.document_technique">
        	<div class="unit">
        	    <h6><?= _t("Technique") ?></h6>
        	    ^ca_objects.document_technique
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.dimensions">
        	<div class="unit">
        	    <h6><?= _t("Dimension") ?></h6>
        	    <unit relativeTo="ca_objects.dimensions" delimiter=" ">
        	    <div>			
        	    	<ifdef code="ca_objects.dimensions.measured_material_type">
        	        	<strong><?= _t("Type of Measured Material") ?>:</strong>
        	        	^ca_objects.dimensions.measured_material_type
        	        </ifdef>
			
        	        <ifdef code="ca_objects.dimensions.dimension_type">
        	            <strong><?= _t("Type of Dimension") ?>:</strong>
        	            ^ca_objects.dimensions.dimension_type
        	        </ifdef>
			
        	        <ifdef code="ca_objects.dimensions.dimension_value">
        	            <strong><?= _t("Dimension Value") ?>:</strong>
        	            ^ca_objects.dimensions.dimension_value ^ca_objects.dimensions.measurement_unit
        	        </ifdef>
        	    </div>
        	    </unit>
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.location_identifier">
        	<div class="unit">
        	    <h6><?= _t("Location Code") ?></h6>
        	    ^ca_objects.location_identifier%delimiter=;_
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.storage_note">
        	<div class="unit">
        	    <h6><?= _t("Location Note") ?></h6>
        	    ^ca_objects.storage_note
        	</div>
        </ifdef>}}}

		<!-- -->

		{{{<ifdef code="ca_objects.adminbiohist">
        	<div class="unit">
        	    <h6><?= _t("Administrative History / Biography") ?></h6>
        	    ^ca_objects.adminbiohist
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.custohist">
        	<div class="unit">
        	    <h6><?= _t("Archival History") ?></h6>
        	    ^ca_objects.custohist
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.scopecontent">
        	<div class="unit">
        	    <h6><?= _t("Scope and Content") ?></h6>
        	    ^ca_objects.scopecontent
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.appraisal">
        	<div class="unit">
        	    <h6><?= _t("Appraisal, Disposal, and Time Span") ?></h6>
        	    ^ca_objects.appraisal
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.accruals">
        <div class="unit">
            <h6><?= _t("Incorporations") ?></h6>
            ^ca_objects.accruals
        </div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.arrangement">
        	<div class="unit">
        	    <h6><?= _t("Arrangement System") ?></h6>
        	    ^ca_objects.arrangement
        	</div>
        </ifdef>}}}

		{{{<ifcount code="ca_occurrences" min="1" restrictToRelationshipTypes="production">
            <div class="unit">
                <h6><?= _t("Related Event (Documentary Production Context)") ?></h6>
                <unit relativeTo="ca_occurrences" delimiter="<br/>" restrictToRelationshipTypes="production"><unit delimiter=" -> "><l>^ca_occurrences.hierarchy.preferred_labels</l></unit></unit>
            </div>
        </ifcount>}}}

		{{{<ifdef code="ca_objects.nat_representation">
        	<div class="unit">
        	    <h6><?= _t("National Representation") ?></h6>
        	    <unit delimiter="<br>">^ca_objects.nat_representation</unit>
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.content_description">
        	<div class="unit">
        	    <h6><?= _t("Content Description") ?></h6>
        	    ^ca_objects.content_description
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.langmaterial.lang_material_lang">
            <div class="unit">
                <h6><?= _t("Language") ?></h6>
                ^ca_objects.langmaterial.lang_material_lang
            </div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.existing_copies_number">
            <div class="unit">
                <h6><?= _t("Number of Existing Document Units)") ?></h6>
                ^ca_objects.existing_copies_number
            </div>
        </ifdef>}}}

		{{{<ifcount code="ca_objects.related" min="1" restrictToRelationshipTypes="exemplar;copy">
            <div class="unit">
                <h6><?= _t("Registered Copies/Originals") ?></h6>
                <unit relativeTo="ca_objects.related" delimiter="<br/>" restrictToRelationshipTypes="exemplar;copy"><unit delimiter=" -> "><l>^ca_objects.hierarchy.preferred_labels</l></unit></unit>
            </div>
        </ifcount>}}}

		{{{<ifcount code="ca_objects.related" min="1" restrictToTypes="file;documents;document_parts" excludeRelationshipTypes="exemplar;copy">
            <div class="unit">
                <h6><?= _t("Related Documents") ?></h6>
                <unit relativeTo="ca_objects.related" delimiter="<br/>" excludeRelationshipTypes="exemplar;copy"><unit delimiter=" -> "><l>^ca_objects.hierarchy.preferred_labels</l></unit></unit>
            </div>
        </ifcount>}}}

		{{{<ifcount code="ca_list_items" min="1">
            <div class="unit">
                <h6><?= _t("Related Controlled Vocabulary") ?></h6>
                <unit relativeTo="ca_list_items" delimiter="<br/>">^ca_list_items.preferred_labels</unit>
            </div>
        </ifcount>}}}

		{{{<ifcount code="ca_entities" min="1" excludeRelationshipTypes="edition;creator;contributor;publisher">
        	<div class="unit">
        	    <h6><?= _t("Related Entities") ?></h6>
        	    <unit relativeTo="ca_entities" delimiter="<br/>" excludeRelationshipTypes="edition;creator;contributor;publisher"><l><b>^ca_entities.preferred_labels</b></l></unit>
        	</div>
        </ifcount>}}}

		{{{<ifcount code="ca_objects.related" restrictToTypes="artworks" min="1">
            <div class="unit">
                <h6><?= _t("Related Artwork") ?></h6>
                <unit relativeTo="ca_objects.related" restrictToTypes="artworks" delimiter="<br/>"><unit delimiter=" -> "><l><b>^ca_objects.hierarchy.preferred_labels</b></l></unit></unit>
            </div>
        </ifcount>}}}

		{{{<ifcount code="ca_occurrences" min="1" excludeRelationshipTypes="participation;production">
            <div class="unit">
                <h6><?= _t("Related Events") ?></h6>
                <unit relativeTo="ca_occurrences" delimiter="<br/>" excludeRelationshipTypes="participation;production"><unit delimiter=" -> "><l>^ca_occurrences.hierarchy.preferred_labels</l></unit></unit>
            </div>
        </ifcount>}}}

		{{{<ifcount code="ca_occurrences" min="1" restrictToRelationshipTypes="participation">
            <div class="unit">
                <h6><?= _t("Event Participation") ?></h6>
                <unit relativeTo="ca_occurrences" delimiter="<br/>" restrictToRelationshipTypes="participation"><unit delimiter=" -> "><l>^ca_occurrences.hierarchy.preferred_labels</l></unit></unit>
            </div>
        </ifcount>}}}

		{{{<ifdef code="ca_objects.edition_month">
        	<div class="unit">
        	    <h6><?= _t("Edition Month") ?></h6>
        	    ^ca_objects.edition_month
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.edition_number">
            <div class="unit">
                <h6><?= _t("Edition Number") ?></h6>
                ^ca_objects.edition_number
            </div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.biblio_location_volume">
            <div class="unit">
                <h6><?= _t("Tome / Volume") ?></h6>
                ^ca_objects.biblio_location_volume
            </div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.tipo_cromia">
            <div class="unit">
                <h6><?= _t("Chromatics") ?></h6>
                ^ca_objects.tipo_cromia
            </div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.tipo_polaridade">
            <div class="unit">
                <h6><?= _t("Polarity") ?></h6>
                ^ca_objects.tipo_polaridade
            </div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.tipo_midia">
            <div class="unit">
                <h6><?= _t("Type of Media") ?></h6>
                ^ca_objects.tipo_midia
            </div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.padrao_gravacao">
            <div class="unit">
                <h6><?= _t("Recording Standard") ?></h6>
                ^ca_objects.padrao_gravacao
            </div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.biblio_location_type ">
        	<div class="unit">
        	    <h6><?= _t("Type of Publication") ?></h6>
        	    ^ca_objects.biblio_location_type
        	</div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.biblio_location_subject">
            <div class="unit">
                <h6><?= _t("Subject") ?></h6>
                ^ca_objects.biblio_location_subject
            </div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.biblio_location_PHA">
            <div class="unit">
                <h6><?= _t("PHA Table") ?></h6>
                ^ca_objects.biblio_location_PHA
            </div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.physaccessrestrict">
            <div class="unit">
                <h6><?= _t("Physical Access") ?></h6>
                ^ca_objects.physaccessrestrict
            </div>
        </ifdef>}}}

		{{{<ifdef code="ca_objects.external_link">
            <div class="unit">
                <h6><?= _t("External Links") ?></h6>
                <div>
					<unit relativeTo="ca_objects.external_link" delimiter="<br/>">
						<a href="^ca_objects.external_link.url_entry" target="_blank">
						<b>
							<ifdef code="ca_objects.external_link.url_source">
								^ca_objects.external_link.url_source
							</ifdef>
							
							<ifnotdef code="ca_objects.external_link.url_source">
								^ca_objects.external_link.url_entry
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