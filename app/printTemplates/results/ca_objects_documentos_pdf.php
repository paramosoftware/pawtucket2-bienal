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
 * @tables ca_objects
 * @restrictToTypes documents
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

?>

<div id='body'>
	<div>
		<?php
		print $vo_result->numHits();

		if ($vo_result->numHits() > 1)
			print " documentos";
		else
			print " documento";
		?>
	</div>

	<?php
	if ($criterios) {
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

	<table class="" cellpadding="2px" cellspacing="0" style="font-size:8px">
		<thead>
			<tr>
				<th>código de referência</th>
				<th>tipo de documento</th>
				<th>nível/documento</th>
				<th>data</th>
				<th>gênero</th>
				<th>espécie</th>
				<th>evento</th>
			</tr>
		</thead>

		<tbody>
			<?php
			$vo_result->seek(0);

			$cur = 0;
			while ($vo_result->nextHit()) {
				$idno = $vo_result->get('idno');
				$value_type = $vo_result->get("ca_objects.type_id", array('delimiter' => ', ', 'convertCodesToDisplayText' => true));
				$value_hierarchy = str_replace(";", " -> ", $vo_result->get("ca_objects.hierarchy.preferred_labels"));
				$value_date = $vo_result->get("ca_objects.unitdate.date_value", array('delimiter' => ',', 'convertCodesToDisplayText' => true));
				$value_genero = $vo_result->get("ca_objects.document_genre", array('delimiter' => ', ', 'convertCodesToDisplayText' => true));
				$value_especie = $vo_result->get("ca_objects.document_type", array('delimiter' => ', ', 'convertCodesToDisplayText' => true));
				//$value_evento = $vo_result->get("ca_occurrences.hierarchy.preferred_labels", array('delimiter' => ' -> '));
				$value_evento = $vo_result->getWithTemplate('<unit relativeTo="ca_objects_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="production"><unit relativeTo="ca_occurrences" delimiter=" -> ">^ca_occurrences.hierarchy.preferred_labels</unit></unit>');

				print "<tr>";
				print "<td>" . $idno . "</td>";
				print "<td>" . $value_type . "</td>";
				print "<td>" . $value_hierarchy . "</td>";
				print "<td>" . $value_date . "</td>";
				print "<td>" . $value_genero . "</td>";
				print "<td>" . $value_especie . "</td>";
				print "<td>" . $value_evento . "</td>";
				print "</tr>";

				$cur++;
				if($cur%28 == 0) {
					print "<span class='pageBreak'></span>";
				}
			}
			?>
		</tbody>
	</table>
</div>

<?php
print $this->render("footer.php");
print $this->render("pdfEnd.php");
?>