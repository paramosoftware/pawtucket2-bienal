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

<div class="sec-footer">
		<ul class="sec-footer-social-list">
			<li>
				<?= _t("Share") ?>
			</li>
			<li>
				<a href="#"><img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/facebook.svg" alt="logo facebook" /></a>
			</li>

			<li>
				<a href="#"><img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/x-twitter.svg" alt="logo twitter" /></a>
			</li>

			<li>
				<a href="#"><img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/whatsapp.svg" alt="logo whatsapp" /></a>
			</li>
		</ul>
	</div>
