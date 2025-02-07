<?php 
/* ----------------------------------------------------------------------
 * themes/default/views/find/Search/ajax_refine_facets_html.php 
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2012 Whirl-i-Gig
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
	$o_browse 				= $this->getVar('browse');
	$va_available_facets 	= $o_browse->getInfoForAvailableFacets();
	$va_criteria 			= $o_browse->getCriteriaWithLabels();
	$va_facet_info 			= $o_browse->getInfoForFacets();
	
	$vs_key 			= $this->getVar('key');
	$vs_view			= $this->getVar('view');
?>

<style>

	#bMorePanel {padding:30px;background-color:#09C;position:fixed;top:70px;right:0px;width:100%;height:calc(100% - 70px);display:none;max-width:400px;font-size:0px}
	#bMorePanel #bMorePanelClose {}
	#bMorePanel #bScrollListLabel {color:#fff;font-weight:normal;font-size:22px;line-height:22px;font-family:"Helvetica Medium";margin: 0;padding: 0;margin-bottom: 20px;}
	#bMorePanel #bScrollListLabel .bFilterCount {font-size: 15px;display: block;border-radius: 4px;padding: 5px 8px;background-color: #fff;color: #09c;margin-top: 10px;}
	#bMorePanel #bLetterBar {width:30px;display:inline-block;vertical-align:top;color:#fff;font-size:12px;font-family:"Helvetica Bold"}
	
	#bMorePanel #bScrollList {overflow:auto;width:calc(100% - 30px); height:calc(100% - 70px); display:inline-block; vertical-align:top; color:#fff; font-size:12px; font-family:"Helvetica Roman"}
	#bMorePanel #bScrollList div {margin:2px;}
	#bMorePanel #bScrollList div strong {margin:15px 0px;font-family:"Helvetica Bold"}
	
</style>

<div id='bMorePanel'><!-- long lists of facets are loaded here --></div>

<?php
	foreach($va_available_facets as $vs_facet_code => $va_facet_info) 
	{
		// Se o facet for "Search/Busca", não queremos exibir
		
		if ($va_facet_info['label_singular'] != "Busca")
		{
			$vURL = "\"" . caNavUrl($this->request, '*', '*', '*', array('getFacet' => 1, 'facet' => $vs_facet_code, 'view' => $vs_view, 'key' => $vs_key));
			$vURL = $vURL . "/uid/" . "\"+(new Date()).getTime()";
			
			$vLink_Facet_Content = "jQuery(\"#caLoadingFacetContentIndicator_" . $vs_facet_code . "\").show(); jQuery(\"#bMorePanel\").load(" . $vURL . ", function(response, status, xhr){ if (status != \"success\") alert(response); jQuery(\"#bMorePanel\").show(); jQuery(\"#caLoadingFacetContentIndicator_" . $vs_facet_code . "\").hide(); jQuery(\"#bMorePanel\").mouseleave(function(){jQuery(\"#bMorePanel\").hide();});}); return false;";
		?>
			<ul>
				<li class='titulo'>
					<a href='#' id='showRefine' onclick='<?php print $vLink_Facet_Content; ?>'>
						<?php print $va_facet_info['label_singular']; ?>
					</a>
				</li>
				
				<div id="caLoadingFacetContentIndicator_<?php print $vs_facet_code; ?>" style="padding: 10px 0px 0px 0px; display:none">
					<i class='caIcon fa fa fa-cog fa-spin fa-1x'></i>
				</div>
						
				<div id="filtro_<?php print $vs_facet_code; ?>">
				</div>
			</ul>
<?php
		}
	}
?>