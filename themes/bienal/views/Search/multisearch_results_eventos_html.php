<?php

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
                    <a href="<?php echo $this->request->getBaseUrlPath(); ?>/index.php/Detail/evento/<?=$results->getPrimaryKey()?>">
	                    <?php echo $results->get('ca_occurrences.hierarchy.preferred_labels', array( 'delimiter' => ' -> '));?>
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