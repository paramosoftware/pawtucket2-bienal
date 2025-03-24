</main>

<?php
// echo $this->render("Cookies/banner_html.php"); 
?>

<!-- Accessibility -->
<div class="acess-container">
	<div id="jbbutton" class="balloon" title="Acessibilidade"><span class="balloontext">Acessibilidade</span>
		<img src="<?php echo $this->request->getBaseUrlPath(); ?>/themes/bienal-layout-novo/assets/pawtucket/graphics/jbility/accessibility.png">
	</div>
	<div id="acess-icons">

		<div class="acess-icon balloon"><span class="balloontext">Contraste</span>
			<img id="contrast" src="<?php echo $this->request->getBaseUrlPath(); ?>/themes/bienal-layout-novo/assets/pawtucket/graphics/jbility/contraste42.png" />
		</div>


		<div class="acess-icon balloon"><span class="balloontext">Diminuir Fonte</span>
			<img id="decreaseFont" src="<?php echo $this->request->getBaseUrlPath(); ?>/themes/bienal-layout-novo/assets/pawtucket/graphics/jbility/fontsme42.png" />
		</div>

		<div class="acess-icon balloon"><span class="balloontext">Tamanho normal</span>
			<img id="normalSizeFont" src="<?php echo $this->request->getBaseUrlPath(); ?>/themes/bienal-layout-novo/assets/pawtucket/graphics/jbility/fontsno42.png" />
		</div>

		<div class="acess-icon balloon"><span class="balloontext">Aumentar Fonte</span>
			<img id="increaseFont" src="<?php echo $this->request->getBaseUrlPath(); ?>/themes/bienal-layout-novo/assets/pawtucket/graphics/jbility/fontsma42.png" />
		</div>
	</div>
</div>
<!-- HandTalk -->
<script type="application/javascript" src="//api.handtalk.me/plugin/latest/handtalk.min.js"></script>
<script>
	var ht = new HT({
		token: "1ac1a32959126e7c2aaf00ed89ce3f0b"
	});
</script>

<footer>
	<div id="footer-logo-grid">
		<a id="footer-logo-bienal-link" href="<?= $this->request->getBaseUrlPath() ?>/Front/Index">
			<img id="footer-logo-bienal" src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/logo.svg" />
		</a>
		<div id="footer-logo-social">
			<ul id="footer-logo-list">
				<li>
					<a href="https://www.instagram.com/bienalsaopaulo/"><img
							class="footer-logo"
							src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/instagram.svg"
							alt="instagram logo" /></a>
				</li>
				<li>
					<a href="https://www.facebook.com/bienalsaopaulo/"><img
							class="footer-logo"
							src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/facebook.svg"
							alt="facebook logo" /></a>
				</li>
				<li>
					<a href="https://www.tiktok.com/@bienalsaopaulo/"><img
							class="footer-logo"
							src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/tiktok.svg"
							alt="tiktok logo" /></a>
				</li>
				<li>
					<a href="https://twitter.com/bienalsaopaulo/"><img
							class="footer-logo"
							src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/x-twitter.svg"
							alt="twitter logo" /></a>
				</li>
				<li>
					<a href="https://www.youtube.com/bienalsp/"><img
							class="footer-logo-youtube"
							src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/youtube.svg"
							alt="youtube logo" /></a>
				</li>
			</ul>
		</div>
	</div>
	<hr />
	<div id="footer-main">
		<ul id="footer-main-list">
			<li><a href="#"><?= _t("Historical Archive") ?></a></li>
			<li><a href="#"><?= _t("Collection Guide") ?></a></li>
			<li><a href="#"><?= _t("Research Requests") ?></a></li>
			<li><a href="#"><?= _t("Classification Plan") ?></a></li>
		</ul>
		<div id="footer-disclaimer">
			<img id="footer-bloco-logos" src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/img/bloco-logos.png"
				alt="logo bienal" />
			<div id="footer-disclaimer-logos">
				<img
					src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/img/proac.png"
					alt="logo bienal" />
				<img
					src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/bienal-texto.svg"
					alt="logo Proac, logo São Paulo" />
				<img
					src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/img/sp-cultura.png"
					alt="logo Proac, logo São Paulo" />
				<img
					src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/img/cultsp.png"
					alt="logo Proac, logo São Paulo" />
				<img
					src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/img/secretaria-sp.png"
					alt="logo Proac, logo São Paulo" />
			</div>
		</div>
		<div id="footer-info">
			<div>
				<p>
					<?= _t("The AHWS database was supported by Proac and is under continuous development.") ?>
				</p>
				<h4><?= _t("Wanda Svevo Historical Archive") ?></h4>
				<p>
					Parque Ibirapuera – Portão 3 Pavilhão Ciccillo Matarazzo - 2º
					<?= _t("Floor") ?><br />
					CEP 04094-000 - São Paulo / SP
				</p>
			</div>
			<div>
				<h4><?= _t("Contact Us") ?></h4>
				<p>
					+55 11 5576 7635<br />
					<a href="mailto:arquivo.historico@bienal.org.br">arquivo.historico@bienal.org.br</a>
				</p>
			</div>
		</div>
	</div>
</footer>
</body>
</body>

</html>