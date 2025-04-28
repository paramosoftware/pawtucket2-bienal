<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-22818412-4"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config', 'UA-22818412-4');
	</script>



	<!-- CSS Reset -->
	<link rel="stylesheet" type="text/css" href="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/css/reset.css" />
	<!-- Global CSS -->
	<link rel="stylesheet" type="text/css" href="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/css/global.css" />
	<!-- Header CSS -->
	<link rel="stylesheet" type="text/css" href="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/css/header.css" />
	<!-- Footer CSS -->
	<link rel="stylesheet" type="text/css" href="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/css/footer.css" />

	<!-- Accessibility -->
	<link rel="stylesheet" type="text/css" href="<?php echo $this->request->getBaseUrlPath(); ?>/themes/bienal-layout-novo/assets/pawtucket/css/jbility.css" />
	<!-- jQuery selectBox -->
	<link rel="stylesheet" type="text/css" href="<?php echo $this->request->getBaseUrlPath(); ?>/themes/bienal-layout-novo/assets/pawtucket/css/jquery.selectBox.css" />

	<!-- jQuery 2.2.2 -->
	<script type="application/javascript" src="<?php echo $this->request->getBaseUrlPath(); ?>/themes/bienal-layout-novo/assets/pawtucket/js/jquery-2.2.2.min.js"></script>
	<!-- jQuery-ui -->
	<script type="application/javascript" src="<?php echo $this->request->getBaseUrlPath(); ?>/themes/bienal-layout-novo/assets/pawtucket/js/jquery-ui.min.js"></script>

	<!-- Accessibility -->
	<script type="application/javascript" src="<?php echo $this->request->getBaseUrlPath(); ?>/themes/bienal-layout-novo/assets/pawtucket/js/jbility.js"></script>
	<!-- jQuery selectBox -->
	<script type="application/javascript" src="<?php echo $this->request->getBaseUrlPath(); ?>/themes/bienal-layout-novo/assets/pawtucket/js/jquery.selectBox.js"></script>

	<!-- JS das páginas do site -->
	<script defer type="application/javascript" src="<?php echo $this->request->getBaseUrlPath(); ?>/themes/bienal-layout-novo/assets/js/global.js"></script>

	<!-- meta/asset loader do theme default -->
	<?php
	// echo MetaTagManager::getHTML();
	// echo AssetLoadManager::getLoadHTML($this->request);
	?>

	<title>
		<?php
		echo $this->request->getController(). "/" . $this->request->getAction();
		//echo (MetaTagManager::getWindowTitle()) ? MetaTagManager::getWindowTitle() : $this->request->config->get("app_display_name");
		?>
	</title>

	<!-- <script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery('#browse-menu').on('click mouseover mouseout mousemove mouseenter', function(e) {
				e.stopPropagation();
			});
		});
	</script> -->
	<?php
	if (Debug::isEnabled()) {
		//
		// Pull in JS and CSS for debug bar
		// 
		$o_debugbar_renderer = Debug::$bar->getJavascriptRenderer();
		$o_debugbar_renderer->setBaseUrl(__CA_URL_ROOT__ . $o_debugbar_renderer->getBaseUrl());
		print $o_debugbar_renderer->renderHead();
	}
	?>
	<!-- fim do meta/asset loader do theme default -->
</head>

<body>
	<!-- <div id="skipNavigation"><a href="#main">Skip to main content</a></div> -->
	<header>
		<div id="header-logo-div">
			<a id="header-logo-link" href="<?= $this->request->getBaseUrlPath() ?>">
				<img
					id="header-logo-img"
					src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/logo.svg"
					alt="bienal logo" />
			</a>
		</div>
		<button id="hamburger-btn" onclick="toggleById('header-main', 'flex')"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
				<path d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z" />
			</svg></button>
		<div id="header-main">
			<ul id="header-link-list" role="list" aria-label="<?= _t("Primary Navigation"); ?>">

				<li><?= caNavLink($this->request, _t("Featured"), "", "", "Gallery", "Featured") ?></li>
				<li><a href="<?= caNavUrl($this->request, '', 'Gallery', 'getSetInfo', array('set_id' => '3288')) ?>">Bienais</a></li>
				<li <?= ($this->request->getController() == "About") ? 'class="active"' : ''; ?>><?= caNavLink($this->request, _t("Funds and Collections"), "", "", "Detail", "documento/1") ?></li>
				<li <?= ($this->request->getController() == "Gallery") ? 'class="active"' : ''; ?>><?= caNavLink($this->request, _t("Galleries"), "", "", "Gallery", "Index") ?></li>
				<li id="browse-popover-wrapper">
					<button id="browse-popover-btn" popovertarget="browse-popover-list"><?= _t("Browse") ?></button>
					<ul id="browse-popover-list" popover>
						<li><?= caNavLink($this->request, _t("Documents"), "", "", "Browse", "documentos") ?></li>
						<li><?= caNavLink($this->request, _t("Artworks"), "", "", "Browse", "obras") ?></li>
						<li><?= caNavLink($this->request, _t("Entities"), "", "", "Browse", "entidades") ?></li>
						<li><?= caNavLink($this->request, _t("Events"), "", "", "Browse", "eventos") ?></li>
					</ul>
				</li>

				<?php
				$fullPath = $this->request->getFullUrlPath();
				if (str_ends_with($fullPath, "index.php")) {
					$fullPath = $fullPath . "/Front/Index"; # /lang/<idioma> não funciona no index.php; mas funciona no /Front/Index, que mostra a mesma tela.
				} elseif (str_contains($fullPath, "lang/")) {
					$fullPath = substr($fullPath, 0, strlen($fullPath) - (strlen("/lang/") + 5)); # remove "/lang/<idioma>" redundantes do final para evitar chamadas redundantes de /lang como "/lang/en_US/lang/pt_BR"
				}
				?>

				<li id="header-lang-desktop">
					<button popovertarget="lang-popover-div"><?= _t("en") ?></button>
					<div id="lang-popover-div" popover>
						<a href="<?= $fullPath . "/lang/" . _t("pt_BR") ?>"><?= _t("pt") ?></a>
					</div>
				</li>
				<li id="header-lang-mobile"><a href="<?= $fullPath . "/lang/pt_BR" ?>">pt</a>&nbsp; &nbsp;|&nbsp; &nbsp;<a href="<?= $fullPath . "/lang/en_US" ?>">en</a></li>
			</ul>

			<div id="header-form">
				<button
					id="header-adv-search-btn"
					popovertarget="header-adv-search-popover">
					<img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/folder-search.svg" />
					<?= _t("Advanced Search") ?>
				</button>

				<div popover id="header-adv-search-popover">
					<ul>
						<li><?= caNavLink($this->request, _t("Documents"), "", "", "Search", "advanced/documentos") ?></li>
						<li><?= caNavLink($this->request, _t("Artworks"), "", "", "Search", "advanced/obras") ?></li>
						<li><?= caNavLink($this->request, _t("Entities"), "", "", "Search", "advanced/entidades") ?></li>
						<li><?= caNavLink($this->request, _t("Events"), "", "", "Search", "advanced/eventos") ?></li>
					</ul>
				</div>

				<hr>

				<form id="header-search-form" role="search" action="<?= caNavUrl($this->request, '', 'MultiSearch', 'Index'); ?>" aria-label="<?= _t("Search") ?>">
					<input id="headerSearchInput" type="text" placeholder="<?= _t("Search") ?>" name="search" autocomplete="off" aria-label="<?= _t("Texto de busca"); ?>" />
					<button id="headerSearchButton" type="submit" aria-label="<?= _t("Submit"); ?>">
						<img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/magnifying-glass.svg" />
					</button>
				</form>

				<script type="text/javascript">
					$(document).ready(function() {
						$('#headerSearchButton').prop('disabled', true);
						$('#headerSearchInput').on('keyup', function() {
							$('#headerSearchButton').prop('disabled', this.value == "" ? true : false);
						})
					});
				</script>
			</div>
		</div>
	</header>

	<main role="main">