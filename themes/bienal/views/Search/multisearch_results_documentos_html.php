<?php
/* ----------------------------------------------------------------------
 * themes/default/views/Search/ca_objects_search_subview_html.php : 
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
 
	$results = $this->getVar('result');
	$block_info = $this->getVar('blockInfo');
	$vn_start		 	= (int)$this->getVar('start');
	$itemsPerPage 	= (int)$this->getVar('itemsPerPage');
	$vs_search 			= (string)$this->getVar('search');
	$vn_init_with_start	= (int)$this->getVar('initializeWithStart');

?>

<?php if ( $results->numHits() > 0) { ?>

			<div class="coluna">
            
            	<div class="cabecalho">
					<?php print $block_info['displayName'] ?> <i><?php print $results->numHits() ?> resultados</i>
				</div>
                
                <div class="itens">
                	
				<?php
                $index = 0;
                while($results->nextHit()) {
                ?>
                
                <div class="item">
                    <a href="<?php echo $this->request->getBaseUrlPath(); ?>/index.php/Detail/documento/<?=$results->getPrimaryKey()?>">
	                    <strong><?php echo $results->get('ca_objects.type_id', array( 'convertCodesToDisplayText' => true ));?></strong> <?php echo $results->get('ca_objects.hierarchy.preferred_labels', array( 'delimiter' => ' -> '));?>
                    </a>
                </div>
                
                <?php
                $index++;
                if ( $index == $itemsPerPage || $index >= $itemsPerPage ) {break;} 
                }
                ?>
                    
                </div> 
                
                <?php print caNavLink($this->request,'veja todos os resultados','','', 'Search','{{{block}}}',array('search' => $vs_search));?>
            
            </div>
            
<?php
}
?>