<?php
/* ----------------------------------------------------------------------
 * app/templates/thumbnails.php
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
 * @name PDF 
 * @type page
 * @pageSize letter
 * @pageOrientation portrait
 * @tables ca_entities
 *
 * ----------------------------------------------------------------------
 */
 
 	$t_display				= $this->getVar('t_display');
	$va_display_list 		= $this->getVar('display_list');
	$vo_result 				= $this->getVar('result');
	$vn_items_per_page 		= $this->getVar('current_items_per_page');
	$vs_current_sort 		= $this->getVar('current_sort');
	$vs_default_action		= $this->getVar('default_action');
	$vo_ar					= $this->getVar('access_restrictions');
	$vo_result_context 		= $this->getVar('result_context');
	$acesso 				= $this->getVar('access_values');
	$vn_start 				= 0;

	$criterios = $this->getVar('criteria_summary');
	
	print $this->render("pdfStart.php");
	print $this->render("header.php");
	print $this->render("footer.php");
	
?>

	<div id='body'>
		<div>
			<?php 
				print $vo_result->numHits();

				if ($vo_result->numHits() > 1)
					print " entidades";
				else
					print " entidade";
			?>
		</div>
		
		<?php 
			if ($criterios) 
			{
			?>
				<div id="criterios"> 
				<?php
					print $criterios;
				?>
				<br>
				</div>
			<?php
			}
		?>
		
    <table class="" width="100%" cellpadding="2px" cellspacing="0" style="font-size:8px">
		<thead>
		<tr>
			<th>nome da entidade</th>
			<th>tipo</th>
			<th>categoria</th>
			<th>participação bienal</th>
		</tr>
		</thead>
		
		<tbody>
<?php
		
		$vo_result->seek(0);

		while( $vo_result->nextHit() ) {
			
			$vs_displayname_link = $vo_result->get("ca_entities.preferred_labels.displayname");
			$vs_entity_type = $vo_result->get("ca_entities.type_id", array('delimiter' => ', ', 'convertCodesToDisplayText' => true));
			$vs_entity_category = $vo_result->get("ca_entities.entity_category", array('delimiter' => ', ', 'convertCodesToDisplayText' => true));
			$vs_bienal_artist = $vo_result->get("ca_occurrences.preferred_labels", array('restrictToRelationshipTypes' => array('participation') ));
			$vs_bienal_artist = $vs_bienal_artist == "" ? "Não" : "Sim";
			
			print "<tr>";
			print "<td>" . $vs_displayname_link . "</td>";
			print "<td>" . $vs_entity_type . "</td>";
			print "<td>" . $vs_entity_category . "</td>";
			print "<td>" . $vs_bienal_artist . "</td>";
			print "</tr>";
		}
		
?>
		</tbody>
    </table>
	</div>
    
<?php
	print $this->render("pdfEnd.php");
?>