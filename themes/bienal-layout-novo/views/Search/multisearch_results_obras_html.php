<?php
	$results = $this->getVar('result');
	$block_info = $this->getVar('blockInfo');
	$vn_start = (int)$this->getVar('start');
	$itemsPerPage = (int)$this->getVar('itemsPerPage');
	$vs_search = (string)$this->getVar('search');
	$vn_init_with_start	= (int)$this->getVar('initializeWithStart');

?>

<?php if ($results->numHits() > 0) : ?>

    <div class="sidebar">    
        <div class="sidebar-header">
            <?= _t($block_info['displayName']); ?> 
            <br>
            <span class="sidebar-header-results-counter"><?= $results->numHits() . " " . _t("resultados") ?></span>
        </div>      
            
        <div class="sidebar-items">
        <?php
            $index = 0;
            while($results->nextHit()) 
            {
            ?>
                
                <div class="sidebar-item">
                    <a href="<?php echo $this->request->getBaseUrlPath(); ?>/index.php/Detail/documento/<?=$results->getPrimaryKey()?>">
                        <?php echo $results->get('ca_objects.preferred_labels', array( 'delimiter' => ' '));?>
                    </a>

                    <p><?php echo $results->get('ca_entities.preferred_labels.displayname', array( 'delimiter' => ' ')); ?></p>
                </div>
                
            <?php
                $index++;
                if ( $index == $itemsPerPage || $index >= $itemsPerPage ) {break;}
            }
        ?>
        </div>

        <?php print caNavLink($this->request, 'Veja todos os resultados', 'all-results-button', '', 'Search', '{{{block}}}', array('search' => $vs_search)); ?>
    </div>

<?php endif; ?>