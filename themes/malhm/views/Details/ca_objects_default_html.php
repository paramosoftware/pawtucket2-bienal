<?php
/* ----------------------------------------------------------------------
 * themes/default/views/bundles/ca_objects_default_html.php : 
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2013-2015 Whirl-i-Gig
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
 * ----------------------------------------------------------------------
 */
 
	$t_object = 			$this->getVar("item");
	$va_comments = 			$this->getVar("comments");
	$va_tags = 				$this->getVar("tags_array");
	$vn_comments_enabled = 	$this->getVar("commentsEnabled");
	$vn_share_enabled = 	$this->getVar("shareEnabled");
	$vn_pdf_enabled = 		$this->getVar("pdfEnabled");
	$vn_id =				$t_object->get('ca_objects.object_id');
	$va_access_values = caGetUserAccessValues($this->request);
	$t_list = new ca_lists();
	$vn_arch_record_id = $t_list->getItemIDFromList("object_types", "archaeology_object");
	$vn_type_id = $t_object->get('ca_objects.type_id');	
?>
<div class="row">
	<div class='col-xs-12 navTop'><!--- only shown at small screen size -->
		{{{previousLink}}}{{{resultsLink}}}{{{nextLink}}}
	</div><!-- end detailTop -->
	<div class='navLeftRight col-xs-1 col-sm-1 col-md-1 col-lg-1'>
		<div class="detailNavBgLeft">
			{{{previousLink}}}{{{resultsLink}}}
		</div><!-- end detailNavBgLeft -->
	</div><!-- end col -->
	<div class='col-xs-12 col-sm-10 col-md-10 col-lg-10'>
		<div class="container"><div class="row">
			<div class="col-sm-12">
				<h4>{{{^ca_objects.preferred_labels}}}</h4>
				<h6>{{{^ca_objects.type_id}}}</h6>	
				<hr/>		
			</div>
			<div class='col-sm-6 col-md-6 col-lg-6'>
				{{{representationViewer}}}
				
				
				<div id="detailAnnotations"></div>
				
				<?php print caObjectRepresentationThumbnails($this->request, $this->getVar("representation_id"), $t_object, array("returnAs" => "bsCols", "linkTo" => "carousel", "bsColClasses" => "smallpadding col-sm-3 col-md-3 col-xs-4")); ?>
				
<?php
				# Comment and Share Tools
				if ($vn_comments_enabled | $vn_share_enabled | $vn_pdf_enabled) {
						
					print '<div id="detailTools">';
					if ($vn_comments_enabled) {
?>				
						<div class="detailTool"><a href='#' onclick='jQuery("#detailComments").slideToggle(); return false;'><span class="glyphicon glyphicon-comment"></span>Comments and Tags (<?php print sizeof($va_comments) + sizeof($va_tags); ?>)</a></div><!-- end detailTool -->
						<div id='detailComments'><?php print $this->getVar("itemComments");?></div><!-- end itemComments -->
<?php				
					}
					if ($vn_share_enabled) {
						print '<div class="detailTool"><span class="glyphicon glyphicon-share-alt"></span>'.$this->getVar("shareLink").'</div><!-- end detailTool -->';
					}
					if ($vn_pdf_enabled) {
						print "<div class='detailTool'><span class='glyphicon glyphicon-file'></span>".caDetailLink($this->request, "Download as PDF", "faDownload", "ca_objects",  $vn_id, array('view' => 'pdf', 'export_format' => '_pdf_ca_objects_summary'))."</div>";
					}
					print '</div><!-- end detailTools -->';
				}				

?>

			</div><!-- end col -->
			
			<div class='col-sm-6 col-md-6 col-lg-6'>
<?php
				if ($vs_idno = $t_object->get('ca_objects.idno')) {
					print "<div class='unit'><h6>Object ID</h6>".$vs_idno."</div>";
				}			
				if ($va_chenhall_ids = $t_object->get('ca_objects.chenhall', array('returnAsArray' => true))) {
					print "<div class='unit'><h6>Category</h6>";
					foreach ($va_chenhall_ids as $va_key => $vs_chenhall) {
						print "<div>".caNavLink($this->request, caGetListItemByIDForDisplay($vs_chenhall, true), '', '', 'Browse', 'objects', array('facet' => 'chenhall_facet', 'id' => $vs_chenhall))."</div>";
					}
					print "</div>";
				}
				if ($vs_alt = $t_object->get('ca_objects.alternate_object_name')) {
					print "<div class='unit'><h6>Alternate object names</h6>".$vs_alt."</div>";
				}
				if ($vs_date = $t_object->get('ca_objects.date_created', array('delimiter' => '<br/>'))) {
					print "<div class='unit'><h6>Creation Date</h6>".$vs_date."</div>";
				}
				if ($va_material_ids = $t_object->get('ca_objects.material', array('returnAsArray' => true))) {
					print "<div class='unit'><h6>Materials</h6>";
					foreach ($va_material_ids as $va_key => $vs_material) {
						print "<div>".caNavLink($this->request, caGetListItemByIDForDisplay($vs_material, true), '', '', 'Browse', 'objects', array('facet' => 'material_facet', 'id' => $vs_material))."</div>";
					}
					print "</div>";
				}								
				if ($vs_description = $t_object->get('ca_objects.description', array('delimiter' => '<br/>'))) {
					print "<div class='unit'><h6>Description</h6>".$vs_description."</div>";
				}
				if ($va_entity_rels = $t_object->get('ca_objects_x_entities.relation_id', array('returnAsArray' => true, 'checkAccess' => $va_access_values))) {
					$va_entities_by_type = array();
					foreach ($va_entity_rels as $va_key => $va_entity_rel) {
						$t_rel = new ca_objects_x_entities($va_entity_rel);
						if ($t_rel->get('ca_objects.access') != 0){ continue;}
						$vn_type_id = $t_rel->get('ca_relationship_types.preferred_labels');
						$va_entities_by_type[$vn_type_id][] = caDetailLink($this->request, $t_rel->get('ca_entities.preferred_labels'), '', 'ca_entities', $t_rel->get('ca_entities.entity_id'));
					}
					print "<div class='unit'>";
					foreach ($va_entities_by_type as $va_type => $va_entity_id) {
						print "<h6>".$va_type."</h6>";
						foreach ($va_entity_id as $va_key => $va_entity_link) {
							print "<div>".$va_entity_link."</div>";
						} 
					}
					print "</div>";
				}
/*
				if ($va_lang_ids = $t_object->get('ca_objects.language', array('returnAsArray' => true))) {
					print "<div class='unit'><h6>Language</h6>";
					foreach ($va_lang_ids as $va_key => $vs_lang) {
						print "<div>".caNavLink($this->request, caGetListItemByIDForDisplay($vs_lang, true), '', '', 'Browse', 'objects', array('facet' => 'lang_facet', 'id' => $vs_lang))."</div>";
					}
					print "</div>";
				}				
				if ($vs_ex_label = $t_object->get('ca_objects.exhibition_label', array('delimiter' => '<br/>'))) {
					print "<div class='unit'><h6>Exhibition Label</h6>".$vs_ex_label."</div>";
				}	
				if ($va_dimensions = $t_object->get('ca_objects.dimensions', array('returnWithStructure' => true, 'convertCodesToDisplayText' => true))) {
					$va_dims = array();
					$vs_dims = "";
					foreach ($va_dimensions as $va_key => $va_dimensions_t) {
						foreach ($va_dimensions_t as $va_key => $va_dimension) {
							if ($va_dimension['dimensions_height']) {
								$va_dims[] = $va_dimension['dimensions_height']." H ";
							}
							if ($va_dimension['dimensions_width']) {
								$va_dims[] = $va_dimension['dimensions_width']." W ";
							}							
							if ($va_dimension['dimensions_depth']) {
								$va_dims[] = $va_dimension['dimensions_depth']." D ";
							}							
							if ($va_dimension['dimensions_length']) {
								$va_dims[] = $va_dimension['dimensions_length']." L ";
							}	
							if (sizeof($va_dims) > 0) {						
								$vs_dims.= "<p>".join(' x ', $va_dims);
								if ($va_dimension['measurement_type']) {
									$vs_dims.= ", ".$va_dimension['measurement_type'];
								}
								print "</p>";
							}
							if ($va_dimension['dimensions_weight']) {
								$vs_dims.= "<p>".$va_dimension['dimensions_weight']." Weight </p>";
							}
							if ($va_dimension['dimensions_diameter']) {
								$vs_dims.= "<p>".$va_dimension['dimensions_diameter']." Diameter </p>";
							}
							if ($va_dimension['dimensions_circumference']) {
								$vs_dims.= "<p>".$va_dimension['dimensions_circumference']." Circumference </p>";
							}
							if ($va_dimension['dimensions_thickness']) {
								$vs_dims.= "<p>".$va_dimension['dimensions_thickness']." Thickness </p>";
							}
							if ($va_dimension['measurement_notes']) {
								$vs_dims.= "<p>".$va_dimension['measurement_notes']."</p>";
							}
																																			
						}
					}
					if ($vs_dims != "") {
						print "<div class='unit'><h6>Dimensions</h6>".$vs_dims."</div>";
					}
				}
				if ($vs_count = $t_object->get('ca_objects.count', array('delimiter' => '<br/>'))) {
					print "<div class='unit'><h6>Count</h6>".$vs_count."</div>";
				}
				if ($vs_accessory = $t_object->get('ca_objects.accessory', array('delimiter' => '<br/>'))) {
					print "<div class='unit'><h6>Accessory</h6>".$vs_accessory."</div>";
				}

				if ($vs_marks = $t_object->get('ca_objects.marks_labels', array('delimiter' => '<br/>'))) {
					print "<div class='unit'><h6>Manufacturer's Mark</h6>".$vs_marks."</div>";
				}	
				if ($vs_collection = $t_object->get('ca_collections.preferred_labels', array('returnAsLink' => true, 'checkAccess' => $va_access_values))) {
					print "<div class='unit'><h6>Part of Collection</h6>".$vs_collection."</div>";
				}
				if ($vs_exhibition = $t_object->get('ca_occurrences.preferred_labels', array('returnAsLink' => true, 'checkAccess' => $va_access_values))) {
					print "<div class='unit'><h6>Related Exhibitions</h6>".$vs_exhibition."</div>";
				}
				if ($vs_objects = $t_object->get('ca_objects.related.preferred_labels', array('returnAsLink' => true, 'checkAccess' => $va_access_values))) {
					print "<div class='unit'><h6>Related Objects</h6>".$vs_objects."</div>";
				}
				if ($va_keyword_ids = $t_object->get('ca_list_items.item_id', array('returnAsArray' => true))) {
					print "<div class='unit'><h6>Keywords</h6>";
					foreach ($va_keyword_ids as $va_key => $vs_keyword) {
						print "<div>".caNavLink($this->request, caGetListItemByIDForDisplay($vs_keyword, true), '', '', 'Browse', 'objects', array('facet' => 'term_facet', 'id' => $vs_keyword))."</div>";
					}
					print "</div>";
				}
				if ($vs_lchs = $t_object->get('ca_objects.lcsh_terms', array('delimiter' => '<br/>'))) {
					print "<div class='unit'><h6>LCHS Terms</h6>".$vs_lchs."</div>";
				}
				if ($vs_technique = $t_object->get('ca_objects.technique', array('delimiter' => '<br/>'))) {
					print "<div class='unit'><h6>Technique</h6>".$vs_technique."</div>";
				}	
				if ($vs_medium = $t_object->get('ca_objects.medium', array('delimiter' => '<br/>'))) {
					print "<div class='unit'><h6>Medium</h6>".$vs_medium."</div>";
				}
				if ($vs_inscription = $t_object->get('ca_objects.inscription', array('delimiter' => '<br/>'))) {
					print "<div class='unit'><h6>Inscription</h6>".$vs_inscription."</div>";
				}
				if ($vs_signature = $t_object->getWithTemplate('<unit>^ca_objects.signature.signedname, ^ca_objects.signature.signloc</unit>')) {
					print "<div class='unit'><h6>Signature</h6>".$vs_signature."</div>";
				}	
				if ($vs_culture = $t_object->get('ca_objects.culture', array('delimiter' => '<br/>'))) {
					print "<div class='unit'><h6>Culture</h6>".$vs_culture."</div>";
				}
				if ($vs_school = $t_object->get('ca_objects.school', array('delimiter' => '<br/>'))) {
					print "<div class='unit'><h6>School</h6>".$vs_school."</div>";
				}	
				if ($vs_style = $t_object->get('ca_objects.style', array('delimiter' => '<br/>'))) {
					print "<div class='unit'><h6>Style</h6>".$vs_style."</div>";
				}
*/

				if ($vs_map = $this->getVar('map')) {
					if ($vn_arch_record_id != $vn_type_id) {
						print "<hr/>";
						print $vs_map;	
					}
				}																																																																						
?>										
			</div><!-- end col -->
		</div><!-- end row --></div><!-- end container -->
	</div><!-- end col -->
	<div class='navLeftRight col-xs-1 col-sm-1 col-md-1 col-lg-1'>
		<div class="detailNavBgRight">
			{{{nextLink}}}
		</div><!-- end detailNavBgLeft -->
	</div><!-- end col -->
</div><!-- end row -->

<script type='text/javascript'>
	jQuery(document).ready(function() {
		$('.trimText').readmore({
		  speed: 75,
		  maxHeight: 120
		});
	});
</script>