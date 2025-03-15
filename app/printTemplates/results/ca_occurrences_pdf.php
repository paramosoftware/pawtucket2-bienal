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
 * @tables ca_occurrences
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
					print " eventos";
				else
					print " evento";
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
			<th>código de identificação</th>
			<th>nome do evento</th>
			<th>data</th>
			<th>local</th>
			<th>evento bienal</th>
			<th>tipo</th>
		</tr>
		</thead>
		
		<tbody>
<?php
		
		$vo_result->seek(0);

		while( $vo_result->nextHit() ) {
			
			$idno = $vo_result->get('idno');
			$preferredlabels = $vo_result->get('preferred_labels');
			
			$value_date_start = $vo_result->get("ca_occurrences.event_period.event_period_startdate", array('delimiter' => ', '));
			$value_date_end = $vo_result->get("ca_occurrences.event_period.event_period_enddate", array('delimiter' => ', '));
			
			$value_date = $value_date_start ? $value_date_start : "";
			$value_date .= $value_date_end ? ( $value_date_start ? " - " . $value_date_end : $value_date_end ) : "";
			
			$value_local = $vo_result->get("ca_entities.preferred_labels", array('delimiter' => ', ', 'convertCodesToDisplayText' => true , 'restrictToRelationshipTypes' => array('realizacao') ) );
			$value_bienal = $vo_result->get("ca_occurrences.event_type.event_type_bienal", array('delimiter' => ', ', 'convertCodesToDisplayText' => true));	
			$value_occurrence_type = $vo_result->get("ca_occurrences.event_type.event_type_value", array('delimiter' => ', ', 'convertCodesToDisplayText' => true));
			
			print "<tr>";
			print "<td>" . $idno . "</td>";
			print "<td>" . $preferredlabels . "</td>";
			print "<td>" . $value_date . "</td>";
			print "<td>" . $value_local . "</td>";
			print "<td>" . $value_bienal . "</td>";
			print "<td>" . $value_occurrence_type . "</td>";
			print "</tr>";
		}
		
?>
		</tbody>
    </table>
	</div>
    
<?php
	print $this->render("pdfEnd.php");
?>