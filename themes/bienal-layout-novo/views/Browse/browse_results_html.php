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

<div class="browse-results-table-grid">
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

				<div class="browse-results-toolbar-buttons">
					<?php if (sizeof($exportacao_formatos)) : ?>
						<div class="select-div">
							<button class="select-btn" popovertarget="report-list-popover">
								<img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/download.svg" /><?= _t("Select a Report") ?>
							</button>

							<div popover class="select-popover" id="report-list-popover">
								<ul>
									<?php
									foreach ($exportacao_formatos as $formato) 
									{
										print '<li><a target="_blank" href="' . $this->request->getFullUrlPath() . '/view/' . $formato["type"] . '/download/1/export_format/' . $formato["code"] . '">' . $formato["name"] . '</a></li>';
									}
									?>
								</ul>
							</div>
						</div>
					<?php endif; ?>

					<div class="select-div">
						<button class="select-btn" popovertarget="view-list-popover">
							<img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/download.svg" /><?= _t("Select a View") ?>
						</button>

						<div popover class="select-popover" id="view-list-popover">
							<ul>
								<?php foreach ($views as $layout => $layout_info) : ?>
									<li>
										<a href="<?= $this->request->getBaseUrlPath(); ?>/index.php/<?= $this->request->getController() ?>/<?= $acao ?>/view/<?= $layout ?>/key/<?= $key ?>">
											<?= $layout_info["title"] ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
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

			<div class="browse-results-table-wrapper">
			<?php
				print $this->render("Browse/browse_results_{$view}_{$acao}_html.php");
			?>
			</div>

			<div class="pagination-bar">
				<div class="pagination-bar-summary"><?= _t("Page") . " " . $pagina_atual . " " . _t("of") . " " . $paginas_totais ?></div>

				<div class="pagination-bar-page-numbers">
				<?php
					$vn_i = (($offset / $itens_por_pagina) + 1) - 3;
					$vn_i = $vn_i < 1 ? 1 : $vn_i;
					$vn_f = $vn_i + 4;
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
						$html_paginacao .= "<li " . ($offset == (($itens_por_pagina * $vn_i) - $itens_por_pagina) ? 'class="pagination-bar-selected-page"' : "") . ">" . caNavLink($this->request, $vn_i, 'nextNav', '*', '*', '*', array('s' => ($itens_por_pagina * $vn_i) - $itens_por_pagina, 'view' => $view, 'key' => $key)) . "</li>";
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

				<?php if ($paginas_totais > 1) : ?>
					<div class="pagination-bar-page-jumper">
						<?= _t("Jump to page") ?>
						<input />
					</div>
				<?php endif; ?>
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
			$(".pagination-bar-page-jumper input").keypress(function($e) {
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
</div>
