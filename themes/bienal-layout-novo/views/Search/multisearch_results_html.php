<?php
	$results = $this->getVar('results');            
?>

<div class="sec-header">
	<span>
		Home / <b><?= _t("Search results"); ?></b>
	</span>

	<hr/>

	<div>
		<h1>
			<?php print _t("Resultado para pesquisa de "); ?> <i><?php print caUcFirstUTF8Safe( $this->getVar('searchForDisplay') )?></i>
		</h1>
	</div>
</div>

<div class="multisearch-results">
	<?php
	foreach($this->getVar('blockNames') as $block) 
	{
		print $results[$block]['html'];
	} 		
	?>
</div>
