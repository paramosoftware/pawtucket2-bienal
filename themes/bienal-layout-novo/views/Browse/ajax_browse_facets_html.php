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
	#bMorePanel {
		position: fixed;
		top: var(--header-height);
		right: 0px;
		background-color: var(--tertiary4);
		padding-left: 40px;
		padding-right: 50px;
		padding-block: 40px;

		max-width: 300px;
		width: 100%;
		height: calc(100% - 70px);
		display: none;
		font-size: 0px
	}

	
	#bMorePanel h1, #bScrollList strong {
		text-transform: uppercase;
	}

	#bMorePanel h1 span, #bScrollList a {
		text-transform: lowercase;
	}


	#bMorePanel #bMorePanelClose {}

	#bMorePanel #bScrollListLabel {
		color: var(--secondary);
		font-family: "Helvetica Neue Bold";
		font-size: 18px;
		font-weight: normal;
		line-height: 22px;
		margin: 0;
		padding: 0;
		margin-bottom: 38px;
	}

	#bMorePanel #bScrollListLabel .bFilterCount {
		background-color: inherit;
		color: var(--secondary);
		font-family: "Helvetica Neue Roman";
		font-size: 18px;
		font-weight: normal;
		display: block;
		border-radius: 4px;
		padding: 5px 8px;
		margin-top: 10px;
	}

	#bMorePanel #bScrollListLabel span {
		padding: 0 !important;
		margin: 0 !important;
	}

	#bMorePanel #bLetterBar {
		font-family: "Helvetica Neue Bold";
		font-size: 18px;
		width: 30px;
		display: inline-block;
		vertical-align: top;
		color: #fff;
	}

	#bMorePanel #bLetterBar a, #bScrollList a {
		color: var(--tertiary);
		font-size: 18px;
		justify-content: start;
		padding-block: 2px;
	}

	#bMorePanel #bScrollList {
		overflow: auto;
		width: calc(100% - 30px);
		height: calc(100% - 70px);
		display: inline-block;
		vertical-align: top;
		color: #fff;
		font-size: 12px;
		font-family: "Helvetica Roman"
	}

	#bMorePanel #bScrollList div {
		margin: 2px;
	}

	#bMorePanel #bScrollList div strong {
		margin: 15px 0px;
		font-family: "Helvetica Neue Roman";
		font-weight: normal;
		font-size: 18px;
		color: var(--secondary);
	}
</style>

<div id='bMorePanel'><!-- long lists of facets are loaded here --></div>

<?php
foreach ($va_available_facets as $vs_facet_code => $va_facet_info) {
	// Se o facet for "Search/Busca", não queremos exibir

	if ($va_facet_info['label_singular'] != "Busca") {
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