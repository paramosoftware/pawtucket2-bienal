<style>
	/* #home {
		grid-area: home;
		padding-inline: 40px;
	}


	#titulo {
		grid-area: titulo;
	} */

	.sec-header {
		grid-area: sec-header;
		padding-inline: 40px;
	}

	/* #criterios {
		grid-area: criterios;
	} */

	.browse-results {
		grid-area: browse-results;
	}

	.browse-results-facets {
		grid-area: browse-results-facets;
	}

	.sec-footer {
		grid-area: sec-footer;
		padding-right: 40px;
	}

	main {
		display: grid;
		grid-template-columns: 85% 15%;
		grid-template-areas:
			"sec-header sec-header"
			"browse-results browse-results-facets"
			"sec-footer sec-footer"
	}

	/* main #titulo {
		padding: 20px 30px;
		font-family: "Helvetica Heavy";
		font-size: 38px;
		text-transform: uppercase;
		color: #333;
	} */

	.sec-header>div:has(#criterios) {
		justify-content: start;
		align-items: center;
	}

	main #criterios {
		height: 30px;
	}

	main #criterios a {
		text-decoration: none;
		font-family: "Helvetica Neue Bold";
		background-color: var(--bienal_primary);
		color: var(--secondary);
		font-size: 16px;

		display: inline-block;
		height: 30px;
		border: 1px solid var(--tertiary3);
		border-radius: 4px;
		padding-left: 9px;
		padding-right: 5px;
		padding-top: 2px;

		margin-left: 20px;
	}

	main #criterios a:first-of-type {
		margin-left: 40px;
	}


	main #criterios span {
		font-family: "Helvetica Neue Roman";
		background-color: var(--tertiary);
		color: var(--secondary);
		/* padding: 9px 16px 9px 10px; */
		font-size: 16px;
		/* margin-right: 5px */
	}

	main #criterios a:before {
		content: "\f00d";
		font-family: "FontAwesome";
		margin-right: 5px;
		opacity: .5
	}

	/*
	main #facetas {border-top:#555 dashed 1px;display:inline-block;vertical-align:top;width:250px;font-size:12px;height:100%;border-left:#aaa solid 1px;position:relative;}
	*/

	#filtros a {
		color: var(--tertiary4);
		padding-block: 6px;
		display: flex;
		align-items: center;
		justify-content: center;
		text-align: center;
	}

	/* main #facetas li.mais {
		margin-top: 10px
	} */

	main #facetas li.titulo {
		font-family: "Helvetica Bold";
		width: 100%
	}

	/* main #facetas li.mais {
		display: inline-block;
		color: var(--bienal_primary);
		border: var(--bienal_primary) solid 1px;
		color: var(--bienal_primary);
		padding: 7px 11px;
		font-family: "Helvetica Roman";
		border-radius: 4px
	}

	main #facetas li.mais:before {
		content: "\f067";
		font-family: "FontAwesome";
		margin-right: 5px
	} */

	/* main #resultado {
		margin-left: 40px;
		padding-right: 15px;
		padding-bottom: 32px;
		border-top: 1px solid var(--secondary);
		display: inline-block;
		vertical-align: top;
		/* width: calc(100% - 250px); */
		/* width: 100%; */
		font-size: 12px;
		height: 100%;
		position: relative;
	} */

	/* main #ferramentas {
		padding-block: 30px;
		height: 90px;
		text-align: right;

		display: flex;
		align-items: center;
		justify-content: space-evenly;
	} */

	main #ferramentas select {
		height: 30px;
		line-height: 30px;
		padding: 5px;
		border: #999 solid 1px;
		border-radius: 4px;
		font-size: 14px;
		font-family: "Helvetica Roman";
		vertical-align: top
	}

	main #ferramentas select:last-child {
		margin: 0
	}

	main #ferramentas .icon {
		line-height: 30px;
		margin: 0px 8px;
		font-size: 22px
	}

	main #ferramentas .botao {
		margin-left: 3px;
		font-family: "Helvetica Medium";
		font-size: 11px;
		text-transform: uppercase
	}

	/* main #cabecalho {
		/* font-family: "Helvetica Neue Bold";
		font-size: 16px;
		text-transform: uppercase; */
		height: 94px;

		color: var(--secondary);
		background-color: var(--tertiary2);
		border-block: 2px solid var(--secondary);

		display: flex;
		align-items: center;
		justify-content: space-between;
	} */

	/* main #itens {
		font-family: "Helvetica Neue Roman";
		font-size: 16px;
		color: var(--secondary);
		border-bottom: 1px solid var(--secondary);
		height: max-content;
	} */

	/* main #itens a {
		text-decoration: none;
		font-family: "Helvetica Neue Bold";
		
		color: var(--primary);
		&:hover {
			color: var(--secondary);
		}
	} */

	/* main #cabecalho {
		font-family: "Helvetica Neue Bold";
		font-size: 16px;
		text-transform: uppercase;
	} */

	/* main #itens .item {
		height: 100%;

		display: flex;
		align-items: center;
		justify-content: space-between;
	} */

	/* main #itens .item:nth-child(even) {
		background-color: var(--tertiary2);
	} */

	main #itens .item:last-child {
		border: none
	}

	/* main #paginacao {
		font-family: "Helvetica Neue Bold";
		font-size: 18px;
		text-align: center;
		padding-top: 25px;
		padding-bottom: 30px;
		border-bottom: 2px solid var(--tertiary3);

		display: flex;
		align-items: center;
		justify-content: space-between;
	} */

	/* main #paginacao * {
		font-family: "Helvetica Neue Bold";
	} */

	main #paginacao .pagina {
		padding-left: 0;
	}

	/* main #paginacao .paginas {
		display: flex;
		align-items: center;
	} */

	main #paginacao .jumper {
		color: var(--secondary);
		margin-left: auto;
	}

	main #paginacao .jumper input {
		background-color: var(--tertiary);
		color: var(--tertiary4);
		border: 1px solid var(--tertiary3);
		border-radius: 4px;
		padding-left: 5px;
		padding-right: 11px;
		padding-top: 7px;
		padding-bottom: 3px;

		width: 90px;
		height: 30px;
		margin-left: 4px;

		font-size: 16px;
		text-align: end;
	}

	/* main #paginacao .paginas .botao {
		width: 30px;
		height: 30px;
		margin-right: 3px;
	} */

	/* main #paginacao .paginas ul {
		margin: 0;
		padding: 0;
		list-style: none;
	}

	main #paginacao .paginas ul li {
		display: inline-block;
		font-size: 16px;
		padding: 0px;
	} */

	/* main #paginacao .paginas ul li a {
		color: inherit
	} */

	main #vocequisdizer {
		border-top: #666 dashed 1px;
		font-size: 16px;
		padding: 30px;
		font-family: "Helvetica Roman";
		color: var(--bienal_primary)
	}

	main #vocequisdizer a {
		color: inherit
	}

	.botao {
		padding: 7px 10px;
		border-radius: 4px;
		background-color: var(--tertiary);
		border: 1px solid var(--primary);
		color: var(--primary) !important;
		display: inline-block;
		vertical-align: top;
		font-size: 16px !important;
	}

	/* main #paginacao .paginas a {
		text-decoration: none;
		color: var(--primary);
		background-color: var(--tertiary);
		border: 1px solid var(--primary);
		border-radius: 4px;
		padding: 0;
		margin-left: 20px;

		width: 30px;
		height: 30px;

		display: inline-block;
		align-content: center;
		font-size: 16px;
	} */

	main #paginacao .paginas li:first-of-type a {
		margin-left: 0;
	}

	main #paginacao .paginas ul a {
		padding-top: 3px;
	}

	main #paginacao .paginas ul li.selecionado a {
		border: 1px solid var(--primary);
		background-color: var(--primary);
		color: var(--tertiary);
	}

	/* .pagina {
		float: left;
		height: 30px;
		line-height: 30px;
		display: inline-block;
		font-family: "Helvetica Neue Bold";
		font-size: 18px;
		color: var(--secondary);
		padding-left: 15px;
		margin-right: auto;
	} */

	/* .col {
		padding: 20px 10px;
		display: inline-block;
		/* font-size: 13px; */
		width: 20%;
		vertical-align: top;
		border-left: 1px solid var(--tertiary3);

		height: 100%;
	} */

	/* .col:first-child {
		border: none
	} */

	.icon {
		color: inherit
	}

	.icon:before {
		font-family: "FontAwesome";
		border: none;
		font-size: inherit;
		color: inherit;
		vertical-align: top
	}

	.icon.download:before {
		content: "\f019"
	}

	.icon.layout:before {
		content: "\f0ca"
	}

	.icon.inicio:before {
		content: "\f100"
	}

	.icon.final:before {
		content: "\f101"
	}

	.icon.proximo:before {
		content: "\f105"
	}

	.icon.anterior:before {
		content: "\f104"
	}

	.icon.ordenacao-asc:before {
		content: "\f160"
	}

	.icon.ordenacao-desc:before {
		content: "\f161"
	}

	/* LOADING COG ICON & ANIMATION*/
	.fa {
		display: inline-block;
		font: normal normal normal 14px/1 FontAwesome;
		font-size: inherit;
		text-rendering: auto;
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale
	}

	.fa-spin {
		-webkit-animation: fa-spin 2s infinite linear;
		animation: fa-spin 2s infinite linear
	}

	.fa-cog:before {
		content: "\f013"
	}

	@-webkit-keyframes fa-spin {
		0% {
			-webkit-transform: rotate(0deg);
			transform: rotate(0deg)
		}

		100% {
			-webkit-transform: rotate(359deg);
			transform: rotate(359deg)
		}
	}

	@keyframes fa-spin {
		0% {
			-webkit-transform: rotate(0deg);
			transform: rotate(0deg)
		}

		100% {
			-webkit-transform: rotate(359deg);
			transform: rotate(359deg)
		}
	}

	/* LOADING COG END */

	/* jQuery-SelectBox */
	.selectBox-dropdown {
		padding: 0;
		margin: 0;
		margin-left: 20px;
		height: 50px;
		cursor: pointer;

		color: var(--primary);
		background-color: var(--tertiary);
		border: 1px solid var(--primary);
		border-radius: 4px;

		font-family: "Helvetica Neue Medium";
		font-size: 18px;

		display: flex !important;
		align-items: center;
	}

	.selectBox-dropdown:hover {
		color: var(--tertiary);
		background-color: var(--primary);
		border: 1px solid var(--primary);
	}

	.selectBox-dropdown:focus {
		border: 1px solid var(--primary);
	}

	.selectBox-dropdown .selectBox-arrow {
		display: none;
		/* filter: var(--filter-bienal-pink); */
	}

	.selectBox-dropdown>.selectBox-label {
		margin: 0;
		padding-block: 0;
		padding-right: 20px;
		padding-left: 10px;
	}

	.selectBox-dropdown>.selectBox-label::before {
		font-family: "FontAwesome";
		border: none;
		font-size: inherit;
		color: inherit;
		vertical-align: top;
	}

	.selectBox-dropdown:last-of-type>.selectBox-label::before {
		content: "\f0ca";
		margin-right: 10px;
	}

	.selectBox-dropdown:first-of-type>.selectBox-label::before {
		content: "\f019";
		margin-right: 10px;
	}

	.selectBox-dropdown-menu {
		border-top: 1px solid var(--primary) !important;
	}

	.selectBox-dropdown-menu li a {
		font-family: "Helvetica Neue Medium" !important;
		/* font-size: 16px !important; */
		color: var(--primary);
		background-color: var(--tertiary);
	}

	.selectBox-dropdown-menu li a:hover {
		color: var(--tertiary);
		background-color: var(--primary);
	}

	.selectBox-options li a {
		padding-top: 2px;
	}
</style>

<?php
	$acesso = $this->getVar('access_values');
	$tabela = $this->getVar('table');
	$resultado = $this->getVar('result');
	$itens_por_pagina = (int)$this->getVar('hits_per_block');
	$offset	= (int)$this->getVar('start');
	$pagina_atual = (($offset / $itens_por_pagina) + 1);
	$paginas_totais = ceil($resultado->numHits() / $itens_por_pagina);
	$browse_info = $this->getVar("browseInfo");

	$o_browse = $this->getVar('browse');
	$browse_type = $this->getVar("browse_type");

	$instance = $this->getVar('t_instance');
	$ordenacao_direcao = $this->getVar('sort_direction');
	$ordenacoes = $this->getVar('sortBy');
	$ordenacao_atual = $this->getVar('sort');
	$views = $this->getVar('views');
	$view = $this->getVar('view');
	$key = $this->getVar('key');
	$is_advanced = (int)$this->getVar('is_advanced');
	$is_search = ($this->request->getController() == 'Search');
	$exportacao_formatos = $this->getVar('export_formats');
	$criterios = $this->getVar('criteria');
	$acao = $this->request->getAction();
	//$total_resultado = ( sizeof($criterios) > 0 ) ? $resultado->numHits() : $this->getVar('totalRecordsAvailable');
	$total_resultado = $resultado->numHits();
	$label = $browse_info["labelPlural"] ? $browse_info["labelPlural"] : $instance->getProperty('NAME_PLURAL');
	$label_singular = $browse_info["labelSingular"] ? $browse_info["labelSingular"] : $instance->getProperty('NAME_SINGULAR');
	$found_plural = $browse_info["foundPlural"];
	$found_singular = $browse_info["foundSingular"];
	$negative_word = "nenhum" . (substr($found_singular, -1) == "a" ? "a" : "");
?>

<div id="home" class="sec-header">
	<span>Home / <b><?= _t(_t($label)) ?></b></span>
	<hr />

	<div id="titulo">
		<?php
		if ($total_resultado > 0) {
			$h1_text =  _t(_t($label));
		} else {
			$h1_text =  "$negative_word $label_singular $found_singular";
		}
		?>
		<h1><?= $h1_text ?></h1>
	</div>

	<div>
		<span><b><?= $total_resultado . " " . _t(_t($label)) ?></b> <?= _t("available") ?></span>

		<?php if (sizeof($criterios) > 0) : ?>
			<div id="criterios">
				<?php
				foreach ($criterios as $filtro) 
				{
					if ($filtro['facet_name'] != '_search') {
						$removalLinkElement = caNavLink($this->request, $filtro['value'], 'browseRemoveFacet', '*', '*', '*', array('removeCriterion' => $filtro['facet_name'], 'removeID' => $filtro['id'], 'view' => $view, 'key' => $key));
						$removalLinkElement_prefix = substr($removalLinkElement, 0, 1 + strpos($removalLinkElement, '>'));
						$removalLinkElement_suffix = substr($removalLinkElement, strlen($removalLinkElement_prefix));

						print $removalLinkElement_prefix . "<span>" . $filtro['facet'] . ":&nbsp;</span>" . $removalLinkElement_suffix;

						// print "<span>" . $filtro['facet'] . ": $removalLinkElement</span>";
					} else {
						$termo_busca = $filtro['value'];
						if ($is_advanced) {
							print "<span>" . $termo_busca . "</span>";
						} else {
							print "<span>Palavra chave: " . $termo_busca . "</span>";
						}
					}
				}
				?>
			</div>
		<?php endif; ?>
	</div>
</div>

<!-- <div class="browse-main-content"> -->
	<?php if ($total_resultado > 0) : ?>

		<div class="browse-results">
			<div class="browse-results-toolbar">

				<div class="pagination-bar-summary"><?= _t("Page") . " " . $pagina_atual . " " . _t("of") . " " . $paginas_totais ?></div>

				<?php if (sizeof($exportacao_formatos)) { ?>
					<select id="download">
						<option data-type='none' value='none'><?= _t("Select a Report") ?></option>
						<?php
						foreach ($exportacao_formatos as $formato) 
						{
							print "<option data-type='" . $formato["type"] . "' value='" . $formato["code"] . "'>" . $formato["name"] . "</option>";
						}
						?>
					</select>

					<script>
						$("#download").change(function($a, $b) {
							var selected_options = $(this).find("option:selected");
							var view = selected_options.data("type");
							var code = $(this).val();
							window.open("<?php echo $this->request->getBaseUrlPath(); ?>/index.php/<?= $this->request->getController() ?>/<?= $acao ?>/view/" + view + "/download/1/export_format/" + code + "/key/<?= $key ?>", "_self");
						});
					</script>
				<?php } ?>

				<select id="layout">
					<option data-type='none' value='none'><?= _t("Select a View") ?></option>
					<?php
					foreach ($views as $layout => $layout_info) 
					{
						print "<option value='" . $layout . "'>" . $layout_info["title"] . "</option>";
					}
					?>
				</select>

				<script>
					$("#layout").change(function($a, $b) {
						var code = $(this).val();
						window.open("<?php echo $this->request->getBaseUrlPath(); ?>/index.php/<?= $this->request->getController() ?>/<?= $acao ?>/view/" + code + "/key/<?= $key ?>", "_self");
					});
				</script>
			</div>

			<div class="browse-results-sort-bar">
				<ul>
					<li><?= _t("Order by") ?></li>

					<?php
					foreach ($ordenacoes as $ordenacao => $campo_ordenacao) 
					{
						if ($ordenacao_atual === $ordenacao) {
							print "<li class='selecionado'>" . _t(_t($ordenacao)) . "</li>\n";
						} else {
							print "<li>" . caNavLink($this->request, $ordenacao, '', '*', '*', '*', array('view' => $view, 'key' => $key, 'sort' => $ordenacao, '_advanced' => $is_advanced ? 1 : 0)) . "</li>\n";
						}
					}
					?>
				</ul>

				<?php
					print caNavLink($this->request, '', 'botao icon ordenacao-' . $ordenacao_direcao, '*', '*', '*', array('view' => $view, 'key' => $key, 'sort' => $ordenacao_atual, '_advanced' => $is_advanced ? 1 : 0, 'direction' => $ordenacao_direcao == 'asc' ? 'desc' : 'asc'));
				?>
			</div>

			<?php
				print $this->render("Browse/browse_results_{$view}_{$acao}_html.php");
			?>

			<div class="pagination-bar">
				
				<div class="pagination-bar-summary"><?= _t("Page") . " " . $pagina_atual . " " . _t("of") . " " . $paginas_totais ?></div>

				<div class="pagination-bar-page-numbers">
				<?php
					$vn_i = (($offset / $itens_por_pagina) + 1) - 3;
					$vn_i = $vn_i < 1 ? 1 : $vn_i;
					$vn_f = $vn_i + 6;
					$vn_f = $vn_f > $paginas_totais ? $paginas_totais : $vn_f;
					$html_paginacao = '';

					if ($vn_i > 1) {
						$html_paginacao .= caNavLink($this->request, "", 'nextNav botao icon inicio', '*', '*', '*', array('s' => 0, 'view' => $view, 'key' => $key));
					}

					if ($vn_i > 3) {
						$html_paginacao .= caNavLink($this->request, "", 'nextNav botao icon anterior', '*', '*', '*', array('s' => ($itens_por_pagina * ($vn_i - 1)) - $itens_por_pagina, 'view' => $view, 'key' => $key));
					}

					$html_paginacao .= '<ul>';
					while ($vn_i <= $vn_f) {
						$html_paginacao .= "<li " . ($offset == (($itens_por_pagina * $vn_i) - $itens_por_pagina) ? 'class="selecionado"' : "") . ">" . caNavLink($this->request, $vn_i, 'nextNav', '*', '*', '*', array('s' => ($itens_por_pagina * $vn_i) - $itens_por_pagina, 'view' => $view, 'key' => $key)) . "</li>";
						$vn_i++;
					}

					$html_paginacao .= "</ul>";
					
					if ($vn_f < $paginas_totais) {
						$html_paginacao .= caNavLink($this->request, "", 'nextNav botao icon proximo', '*', '*', '*', array('s' => ($itens_por_pagina * ($vn_i)) - $itens_por_pagina, 'view' => $view, 'key' => $key));
					}

					if ($vn_f < $paginas_totais) {
						$html_paginacao .= caNavLink($this->request, "", 'nextNav botao icon final', '*', '*', '*', array('s' => ($itens_por_pagina * $paginas_totais) - $itens_por_pagina, 'view' => $view, 'key' => $key));
					}

					print $html_paginacao;
				?>
				</div>

				<?php if ($paginas_totais > 1) { ?>
					<div class="jumper">
						<?= _t("Jump to page") ?>
						<input />
					</div>
				<?php } ?>

			</div>

		</div>

		<div class="browse-results-facets">
			<!-- Linha transferida de Browse/browse_facets_html.php -->

			<h3>
				<?php
				$v_url_facets_list = "/mandic/pawtucket/index.php/Browse/" . $browse_type . "/getFacetsList/1/key/" . $key;
				?>

				<a href='#' id='showRefine' onclick='jQuery("#caLoadingFacetsListIndicator").show(); jQuery("#filtros").load("<?php print $v_url_facets_list; ?> "); return false'>
					<?= _t("Filter Results") ?>
				</a>
			</h3>

			<div id="filtros">

				<?php
				// Adicionando estas três linhas para que os filtros sejam carregados junto
				// com a listagem de resultados
				// FRED 22/11/2021

				$o_browse->loadFacetContent(array('checkAccess' => $va_access_values));
				$vs_key = $this->request->getParameter('key', pString);

				print $this->render("Browse/ajax_browse_facets_html.php");

				// FIM
				?>

				<div id="caLoadingFacetsListIndicator" style="padding: 10px 0px 0px 30px; display:none">
					<i class='caIcon fa fa fa-cog fa-spin fa-1x'></i>
				</div>
			</div>
		</div>

		<script>
			$(".jumper input").keypress(function($e) {
				if ($e.which == 13 && $(this).val().trim() != "" && !isNaN($(this).val()) && Number($(this).val()) <= <?= $paginas_totais ?> && Number($(this).val()) > 0) {
					var offset = <?= $itens_por_pagina ?> * ($(this).val() - 1);
					window.location.href = "<?php echo $this->request->getBaseUrlPath(); ?>/index.php/Search/<?= $acao ?>/s/" + offset + "/view/<?= $view ?>/key/<?= $key ?>";
				}
			});
		</script>
	<?php endif; ?>
<!-- </div> -->

<div class="sec-footer">
	<ul class="sec-footer-social-list">
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