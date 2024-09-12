<?php

$facetas 			= $this->getVar('facets');				// array of available browse facets
$va_criteria 		= $this->getVar('criteria');			// array of browse criteria
$vs_key 			= $this->getVar('key');					// cache key for current browse
$va_access_values 	= $this->getVar('access_values');		// list of access values for this user
$vs_view			= $this->getVar('view');
$vs_browse_type		= $this->getVar('browse_type');
$o_browse			= $this->getVar('browse');
$vn_facet_display_length_initial = 7;
$vn_facet_display_length_maximum = 60;

?>

<style>

	#bMorePanel {padding:30px;background-color:#09C;position:fixed;top:70px;right:0px;width:100%;overflow:auto;height:calc(100% - 70px);display:none;max-width:400px;font-size:0px}
	#bMorePanel #bMorePanelClose {}
	#bMorePanel #bScrollListLabel {color:#fff;font-weight:normal;font-size:22px;line-height:22px;font-family:"Helvetica Medium";margin: 0;padding: 0;margin-bottom: 20px;}
	#bMorePanel #bScrollListLabel .bFilterCount {font-size: 15px;display: block;border-radius: 4px;padding: 5px 8px;background-color: #fff;color: #09c;margin-top: 10px;}
	#bMorePanel #bLetterBar {width:30px;display:inline-block;vertical-align:top;color:#fff;font-size:12px;font-family:"Helvetica Bold"}
	#bMorePanel #bScrollList {width:calc(100% - 30px);display:inline-block;vertical-align:top;color:#fff;font-size:12px;font-family:"Helvetica Roman"}
	#bMorePanel #bScrollList div {margin:2px;}
	#bMorePanel #bScrollList div strong {margin:15px 0px;font-family:"Helvetica Bold"}

</style>

<div id='bMorePanel'><!-- long lists of facets are loaded here --></div>

<?php
if(is_array($facetas) && sizeof($facetas)){
?>	

<!--
<h3>filtrar resultados</h3>
-->

<?php
		foreach($facetas as $vs_facet_name => $faceta_info) {
			
			if ((caGetOption('deferred_load', $faceta_info, false) || ($faceta_info["group_mode"] == 'hierarchical')) && ($o_browse->getFacet($vs_facet_name))) {
				print "<H5>".$faceta_info['label_singular']."</H5>"; 
?>
					<script type="text/javascript">
						jQuery(document).ready(function() {
							jQuery("#bHierarchyList_<?php print $vs_facet_name; ?>").load("<?php print caNavUrl($this->request, '*', '*', 'getFacetHierarchyLevel', array('facet' => $vs_facet_name, 'browseType' => $vs_browse_type, 'key' => $vs_key, 'linkTo' => 'morePanel')); ?>");
						});
					</script>
					<div id='bHierarchyList_<?php print $vs_facet_name; ?>'><?php print caBusyIndicatorIcon($this->request).' '.addslashes(_t('Loading...')); ?></div>
<?php
			} else {				
				
				if (!is_array($faceta_info['content']) || !sizeof($faceta_info['content'])) { continue; }
				
				print "<ul>";				
				print "<li class='titulo'>".$faceta_info['label_singular']."</li>"; 
				
				$vn_facet_size = sizeof($faceta_info['content']);
				$vn_more = $vn_facet_size - $vn_facet_display_length_initial;

				switch($faceta_info["group_mode"]){
					case "alphabetical":
					case "list":
					default: 
						$vn_c = 0;
						foreach($faceta_info['content'] as $va_item) {
							print "<li>" . caNavLink($this->request, $va_item['label'], '', '*', '*','*', array('key' => $vs_key, 'facet' => $vs_facet_name, 'id' => $va_item['id'], 'view' => $vs_view)) . "</li>";
							$vn_c++;
							if ( $vn_c == $vn_facet_display_length_initial ) break;
						}					
						break;
				}
				
				if ($vn_more>0) {
					
					//print '<li class="mais"><a href="">mais ' . $vn_more . '</a></li>';
					
					print "<li class='mais'><a href='#' onclick='jQuery(\"#bMorePanel\").load(\"".caNavUrl($this->request, '*', '*', '*', array('getFacet' => 1, 'facet' => $vs_facet_name, 'view' => $vs_view, 'key' => $vs_key))."\", function(){jQuery(\"#bMorePanel\").show(); jQuery(\"#bMorePanel\").mouseleave(function(){jQuery(\"#bMorePanel\").hide();});}); return false;'>"._t("mais %1", $vn_more )."</a></li>";
					
				}
				
				print "</ul>";
				
			}
		}
	}
?>