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

	<!-- meta/asset loader do theme default -->
	<?=MetaTagManager::getHTML();?>
	<?=AssetLoadManager::getLoadHTML($this->request);?>

	<title>
		<?=(MetaTagManager::getWindowTitle()) ? MetaTagManager::getWindowTitle() : $this->request->config->get("app_display_name");?>
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
	<div id="skipNavigation"><a href="#main">Skip to main content</a></div>
	<nav class="navbar navbar-default yamm" role="navigation">
		<div class="container menuBar">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<?php
				if ($has_user_links) {
				?>
					<button type="button" class="navbar-toggle navbar-toggle-user" data-toggle="collapse" data-target="#user-navbar-toggle">
						<span class="sr-only">User Options</span>
						<span class="glyphicon glyphicon-user"></span>
					</button>
				<?php
				}
				?>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-main-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<?php
				$vs_bienal_archive = _t("Bienal Archive");
				$vs_db = _t("Database");

				print caNavLink(
					$this->request,
					caHTMLImage(
						"https://bienal.org.br/wp-content/themes/bienal-sp/images/logo-bienal-inverse.svg",
						['alt' => _t("Logo Bienal"), 'class' => 'headerImg']
					) . "<span class='brand-title'>$vs_bienal_archive $vs_db</span>",
					"navbar-brand",
					"",
					"",
					""
				);
				?>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<!-- bs-user-navbar-collapse is the user menu that shows up in the toggle menu - hidden at larger size -->
			<?php
			if ($has_user_links) {
			?>
				<div class="collapse navbar-collapse" id="user-navbar-toggle">
					<ul class="nav navbar-nav" role="list" aria-label="<?= _t("Mobile User Navigation"); ?>">
						<?= join("\n", $user_links); ?>
					</ul>
				</div>
			<?php
			}
			?>
			<div class="collapse navbar-collapse" id="bs-main-navbar-collapse-1">
				<?php
				if ($has_user_links) {
				?>
					<ul class="nav navbar-nav navbar-right" id="user-navbar" role="list" aria-label="<?= _t("User Navigation"); ?>">
						<li class="dropdown" style="position:relative;">
							<a href="#" class="dropdown-toggle icon" data-toggle="dropdown"><span class="glyphicon glyphicon-user" aria-label="<?= _t("User options"); ?>"></span></a>
							<ul class="dropdown-menu" role="list"><?= join("\n", $user_links); ?></ul>
						</li>
					</ul>
				<?php
				}
				?>
				<form class="navbar-form navbar-right" role="search" action="<?= caNavUrl($this->request, '', 'MultiSearch', 'Index'); ?>" aria-label="<?=_t("Search")?>">
					<div class="formOutline">
						<div class="form-group">
							<input type="text" class="form-control" id="headerSearchInput" placeholder="<?=mb_convert_case(_t("Search"), MB_CASE_UPPER, "UTF-8")?>" name="search" autocomplete="off" aria-label="<?= _t("Texto de busca"); ?>" />
						</div>
						<button type="submit" class="btn-search" id="headerSearchButton"><span class="glyphicon glyphicon-search" aria-label="<?= _t("Submit"); ?>"></span></button>
					</div>
				</form>
				<script type="text/javascript">
					$(document).ready(function() {
						$('#headerSearchButton').prop('disabled', true);
						$('#headerSearchInput').on('keyup', function() {
							$('#headerSearchButton').prop('disabled', this.value == "" ? true : false);
						})
					});
				</script>
				<ul class="nav navbar-nav navbar-right menuItems" role="list" aria-label="<?= _t("Primary Navigation"); ?>">
					<li <?= ($this->request->getController() == "Gallery") ? 'class="active"' : ''; ?>><?= caNavLink($this->request, mb_convert_case(_t("Galleries"), MB_CASE_UPPER, "UTF-8"), "", "", "Gallery", "Index"); ?></li>
					<li <?= ($this->request->getController() == "About") ? 'class="active"' : ''; ?>><?= caNavLink($this->request, mb_convert_case(_t("Funds and Collections"), MB_CASE_UPPER, "UTF-8"), "", "", "Detail", "documento/1"); ?></li>

					<?php
						// mb_convert_case('virá', MB_CASE_UPPER, "UTF-8");
						// echo $this->render("pageFormat/browseMenu.php");
					?>

					<li <?php print ($this->request->getController() == "Browse") ? 'class="selecionado"' : ''; ?>>
						<button popovertarget="browse-list" id="btn_browse-list"><?=mb_convert_case(_t("Explore"), MB_CASE_UPPER, "UTF-8")?> <span id="browse-list-arrow" class="arrow"></span></button>
						<ul popover id="browse-list">
							<li><?= caNavLink($this->request, mb_convert_case(_t("Documents"), MB_CASE_UPPER, "UTF-8"), "", "", "Browse", "documentos") ?></li>
							<li><?= caNavLink($this->request, mb_convert_case(_t("Artworks"), MB_CASE_UPPER, "UTF-8"), "", "", "Browse", "obras") ?></li>
							<li><?= caNavLink($this->request, mb_convert_case(_t("Entities"), MB_CASE_UPPER, "UTF-8"), "", "", "Browse", "entidades") ?></li>
							<li><?= caNavLink($this->request, mb_convert_case(_t("Events"), MB_CASE_UPPER, "UTF-8"), "", "", "Browse", "eventos") ?></li>
						</ul>
					</li>

					<li <?php print ($this->request->getController() == "Search") ? 'class="selecionado"' : ''; ?>>
						<button popovertarget="search-list" id="btn_search-list"><?=mb_convert_case(_t("Advanced Search"), MB_CASE_UPPER, "UTF-8")?> <span id="search-list-arrow" class="arrow"></span></button>
						<ul popover id="search-list">
							<li><?= caNavLink($this->request, mb_convert_case(_t("Documents"), MB_CASE_UPPER, "UTF-8"), "", "", "Search", "advanced/documentos") ?></li>
							<li><?= caNavLink($this->request, mb_convert_case(_t("Artworks"), MB_CASE_UPPER, "UTF-8"), "", "", "Search", "advanced/obras") ?></li>
							<li><?= caNavLink($this->request, mb_convert_case(_t("Entities"), MB_CASE_UPPER, "UTF-8"), "", "", "Search", "advanced/entidades") ?></li>
							<li><?= caNavLink($this->request, mb_convert_case(_t("Events"), MB_CASE_UPPER, "UTF-8"), "", "", "Search", "advanced/eventos") ?></li>
						</ul>
					</li>

					<li>
						<button popovertarget="locale-list" id="btn_locale-list"><?=mb_convert_case(_t("en-US"), MB_CASE_UPPER, "UTF-8")?> <span id="locale-list-arrow" class="arrow"></span></button>
						<ul popover id="locale-list">
							<li><a href="#"><?=mb_convert_case(_t("pt-BR"), MB_CASE_UPPER, "UTF-8")?></a></li>
						</ul>
					</li>

					<!-- <li -->
					<?php
					/*(($this->request->getController() == "Search") && ($this->request->getAction() == "advanced")) ? 'class="active"' : ''; ?>><?= caNavLink($this->request, _t("Advanced Search"), "", "", "Search", "advanced/objects");
					*/ ?>
					<!-- </li> -->

				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- end container -->
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<main role="main" id="main">
					<div id="pageArea" <?= caGetPageCSSClasses(); ?>>