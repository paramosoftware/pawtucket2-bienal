<?php
$vn_set_id = $this->getVar("set_id");
$va_set_item = $this->getVar("set_item");
$vs_cover_image = $this->getVar("cover_image");
$vs_cover_image_caption = $this->getVar("cover_image_caption");
$va_set_items = $this->getVar("set_items");

if ($this->getVar("set_list") == 'featured') {
	$set_list_function = 'Featured';
	$set_list_display_name = 'Featured';
} else {
	$set_list_function = 'Index';
	$set_list_display_name = 'Galleries';
}

// FRED 14/03/2024
// Recuperando subsets deste set //

$va_subsets_info = $this->getVar("subsets") ?? array();
$vn_parent_set = $this->getVar("parent_set") ?? "";

// FRED 14/03/2024
// Recuperando subsets deste set //

$itens_por_pagina = 24;

$offset	= (int)$this->getVar('start');
$pagina_atual = (($offset / $itens_por_pagina) + 1);

$paginas_totais = ceil(count($va_set_items) / $itens_por_pagina);

$o_config = Configuration::load();

if (!is_array($va_api_credentials = $o_config->get('resourcespace_apis'))) {
	$va_api_credentials = [];
}


foreach ($va_api_credentials as $vs_instance => $va_instance_api) {
	$vs_rs_url = $va_instance_api['resourcespace_base_api_url'];
	$vs_private_key = $va_instance_api['resourcespace_api_key'];
	$vs_user = $va_instance_api['resourcespace_user'];

	break;
}
?>

<!-- <link rel="stylesheet" type="text/css" href="/pawtucket/assets/bootstrap/css/bootstrap.css" /> -->

<style>
	.container {
		margin: 0;
		max-width: calc(100dvw - 80px);
		display: flex;
		flex-direction: row-reverse;
		width: 100%
	}

	main {
		/* font-size: 0px; */
		display: flex;
		flex-flow: row wrap;
		justify-content: center;
	}

	main #titulo {
		padding: 20px 30px;
		font-family: "Helvetica Heavy";
		font-size: 38px;
		text-transform: uppercase;
		color: #333;
		width: 100%;
		padding-right: 20%;
		position: relative;
		line-height: 38px;
		border-bottom: #555 dashed 1px;
	}

	main #conteudo {
		vertical-align: top;
		font-size: 12px;
		position: relative;
		flex-basis: 50%;
		flex-grow: 2;
	}

	main #descricao {
		padding: 30px;
		vertical-align: top;
		font-size: 12px;
		position: relative;
		flex-basis: 100%;
		flex-grow: 2;
	}

	main #links {
		vertical-align: top;
		/* padding: 20px 0px 5px 30px; */
		display: flex;
		flex-direction: column-reverse;
		justify-content: start;
		width: 100%;
		max-width: fit-content;
		height: fit-content;
		border-block: 2px solid var(--secondary);
	}

	main #links>div {
		vertical-align: top;
		/* padding: 20px 0px 5px 30px; */
		display: flex;
		flex-direction: column;
		width: 100%;
		max-width: fit-content;
	}

	main #links a {
		text-decoration: none;
		font-size: 16px;
		font-family: "Helvetica Neue Bold";

		display: inline-block;
		vertical-align: top;
		padding: 10px;

		color: var(--primary);

		&:hover {
			color: var(--secondary);

		}
	}

	main #links a:nth-child(even) {
		background-color: var(--tertiary2);
	}

	.icon:before {
		font-family: "FontAwesome";
		border: none;
		font-size: inherit;
		color: inherit;
		vertical-align: top
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

	#browseResultsContainer {
		margin-top: 20px;
		height: 100%;
		position: relative;
	}

	.bResultItemCol {
		height: 330px;
		width: 20dvw;
		min-width: 280px;
		border-block: 2px solid var(--secondary);
		padding-top: 40px;
		display: inline flex;
		justify-content: center;
		align-items: center;
	}

	.bResultItemCol *:has(a) {
		height: 100%;
	}

	.bResultItemContent {
		/* height: 260px;
		overflow: hidden; */

		display: inline-flex;
		align-items: center;
		justify-content: center;
	}

	.bResultItem {
		line-height: 1em;
	}


	.bResultItemContent a {
		text-align: center;
		text-decoration: none;
		font-size: 16px;
		font-family: "Helvetica Neue Medium";
		height: 100%;
		display: inline flex;
		flex-direction: column;
		justify-content: space-between;
		align-items: center;
	}

	.bResultItemText {
		display: inline flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		gap: 8px;
		padding-block: 8px;
	}

	.bResultItemText span {
		text-decoration: none !important;
		font-family: "Helvetica Neue Medium";
		font-size: 16px;
		line-height: 1;
		height: 2ch;

		color: var(--secondary);
	}

	.bResultItemText span:first-of-type {
		font-family: "Helvetica Neue Bold";

		color: var(--primary);
	}

	.bResultItemImg {
		width: 100%;
		display: inline flex;
		justify-content: center;
		align-items: center;
	}

	#conteudo .row>div {
		max-width: calc(100dvw - 80px);
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
		gap: 40px;
		margin-bottom: 40px;
	}

	.sec-header,
	.sec-list,
	.sec-footer {
		padding-inline: 40px;
	}
	#sec-header-description	{
		border-block: 2px solid var(--tertiary3);
		display: flex;
		flex-direction: column;
		margin-bottom: 25px;
		padding: 10px 0;
	}
	.sec-header p {
		font-family: "Helvetica Neue Roman";
		font-size: 18px;
		padding-block: 10px;
		margin-bottom: 0;
	}

	.sec-header>div:last-of-type {
		align-items: center;
	}

	.sec-header>div>span {
		text-transform: capitalize;
	}

	#links {
		counter-reset: galleryCounter;
	}

	#links .gallery-link {
		counter-increment: galleryCounter;
	}

	#links span {
		font-family: "Helvetica Neue Medium";
		font-size: 16px;
		text-transform: uppercase;

		background-color: var(--tertiary2);
		padding-left: 8px;
		padding-block: 12px;
	}

	#links span::before {
		font-family: "Helvetica Neue Bold";
		font-size: 16px;
		content: counter(galleryCounter);
	}

	.sec-header>div:first-of-type {
		margin-block: 50px;
		align-items: start;
		justify-content: start;
		gap: 40px;
		flex-direction: column-reverse;
	}

	.sec-header>div:first-of-type>div {
		display: flex;
		flex-direction: column;
		gap: 40px;
	}

	.sec-header>div:first-of-type:not(:has(img))>div>span {
		display: none;
	}

	.sec-header>div:first-of-type img {
		width: 45%;
		max-height: 400px;
		height: fit-content;
		object-fit: contain;
	}

	@media screen and (width < 940px) {
		.sec-header>div:first-of-type img {
			width: 100%;
		}
	}
</style>

<div class="sec-header">
	<span>
		Home / <?= caNavLink($this->request, _t($set_list_display_name), "", "", "Gallery", $set_list_function) ?> / <b><?= $this->getVar("label") ?></b>
	</span>
	<hr />
	<div>
		<?= $vs_cover_image ?>
		<!-- <?= $vs_cover_image_caption ?> -->
		<div>
			<h1><?= $this->getVar("label") ?></h1>
		</div>
	</div>

	<div id="sec-header-description"><?= $this->getVar("description") ?></div>
	
	<div>
		<span><b><?= _t("Gallery") ?></b></span>
		<button>
			<img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/filter-descending.svg" />
		</button>
	</div>
</div>

<div class="container">

	<?php
	// FRED 14/03/2024
	// Exibindo botões de acesso aos subsets //

	if (count($va_subsets_info) || $vn_parent_set) {
	?>
		<div id="links">
			<div id="subgallery-links">
				<?php
				if ($vn_parent_set) {
				?>
					<a href="<?= $this->request->getBaseUrlPath() ?>/index.php/Gallery/getSetInfo/set_id/<?php print $vn_parent_set; ?>">Voltar</a>
				<?php
				}

				foreach ($va_subsets_info as $va_subset) {
				?>
					<a class="gallery-link" href="<?= $this->request->getBaseUrlPath() ?>/index.php/Gallery/getSetInfo/set_id/<?php print $va_subset["set_id"]; ?>/parent/<?php print $vn_set_id; ?>"><?php print $va_subset["set_name"]; ?></a>
				<?php
				}
				?>
			</div>
			<span onclick="toggleVisibilityById('subgallery-links')">&nbsp;Subgalerias</span>

		</div>
	<?php
	}

	// FRED 14/03/2024
	// Exibindo botões de acesso aos subsets //
	?>

	<div id="conteudo">
		<div class="row">
			<div id="">
				<?php

				$contador = 1;

				foreach ($va_set_items as $va_set_item) {
					if ($contador > $offset) {
						$t_object = new ca_objects($va_set_item["row_id"]);

						$vb_external_image_access = $t_object->get('ca_objects.external_image_access');
						//$vb_external_image_access = 0;

						$vs_resource_path = "";
						$vb_resource_found = false;

						if (true && (!isset($vb_external_image_access) || ($vb_external_image_access == 59)) && ($t_object->get('ca_objects.has_external_image') == 227)) {
							$vn_object_location_id = $t_object->get('location_identifier');

							$va_object_locations_ids = explode(";", $vn_object_location_id);
							sort($va_object_locations_ids);

							foreach ($va_object_locations_ids as $vn_object_location_id) {
								// Lendo a imagem via API do ResourceSpace
								// FRED 24/11/2022
								//////////////////////////////////////////

								$vs_query = "user=" . $vs_user . "&function=do_search&search=" . urlencode("cdigodelocalizao:" . $vn_object_location_id) . "&order_by=resourceid&sort=asc";

								// Sign the query using the private key
								$vs_sign = hash("sha256", $vs_private_key . $vs_query);

								$va_resources = json_decode(file_get_contents($vs_rs_url . $vs_query . "&sign=" . $vs_sign));

								if (is_array($va_resources) && count($va_resources)) {
									$vb_resource_found = true;
									break;
								} else
									array_shift($va_object_locations_ids);
							}

							$vs_resource_path = "";

							if (isset($va_resources) && count($va_resources)) {
								/////////////////////////////////////////////////////////
								/// Recupera as permissões de acesso dos recursos do item

								$va_info_resources = explode("|", $t_object->getWithTemplate('<unit relativeTo="ca_objects.info_resource_rs" delimiter="|">^ca_objects.info_resource_rs.info_resource_rs_location_id:^ca_objects.info_resource_rs.info_resource_public_access</unit>'));

								$va_resources_permissions = array();

								foreach ($va_info_resources as $va_info_resource) {
									$va_resources_permissions[explode(":", $va_info_resource)[0]] = explode(":", $va_info_resource)[1];
								}

								//////////////////////////////////////////////////

								foreach ($va_resources as $va_resource) {
									if (isset($va_resources_permissions[$va_resource->field92]) && in_array($va_resources_permissions[$va_resource->field92], ["", "Sim", "Yes"]))
										break;
								}

								//$va_resource = $va_resources[0];

								$vs_query = "user=" . $vs_user . "&function=get_resource_path&ref=" . $va_resource->ref . "&getfilepath=0&size=thm";

								$vs_sign = hash("sha256", $vs_private_key . $vs_query);

								$vs_resource_path = json_decode(file_get_contents($vs_rs_url . $vs_query . "&sign=" . $vs_sign));
							}
						}
				?>
						<div class='bResultItemCol'>
							<div class='bResultItem'>
								<div class='bResultItemContent'>
									<a style="color:unset" href="<?php print $this->request->getBaseUrlPath() . '/index.php/Detail/documento/' . $va_set_item['row_id']; ?>" target="_blank">
										<?php if ($vs_resource_path) {
										?>
											<div class='bResultItemImg'>
												<img src="data:image/png;base64,<?php print base64_encode(file_get_contents($vs_resource_path)); ?>">
											</div>
										<?php
										}
										?>

										<div class='bResultItemText'>
											<span>
												<?php print $t_object->getWithTemplate("^ca_objects.idno"); ?>
											</span>
											<span>
												<?php
												if ($t_object->getWithTemplate("^ca_objects.document_genre") == "Bibliográfico") {
													$vs_object_title = $t_object->getWithTemplate("^ca_objects.preferred_labels");

													print substr($vs_object_title, 0, 75) . ((strlen($vs_object_title) > 75) ? "..." : "");
												} else
													print $t_object->getWithTemplate("^ca_objects.document_type");
												?>
											</span>
										</div>
									</a>
								</div>
							</div>
							</a>
						</div>
				<?php
						if ($contador == $itens_por_pagina + $offset)
							break;
					}

					$contador++;
				}
				?>
			</div>
		</div>

		<div id="paginacao">

			<div class="pagina"><?= _t("Page") . " " . $pagina_atual . " " . _t("Of") . " " . $paginas_totais ?></div>

			<div class="paginas">
				<?php

				$vn_delta = 2;
				$vn_i = (($offset / $itens_por_pagina) + 1) - $vn_delta;
				$vn_i = $vn_i < 1 ? 1 : $vn_i;
				$vn_f = $vn_i + $vn_delta * 2;
				$vn_f = $vn_f > $paginas_totais ? $paginas_totais : $vn_f;
				$html_paginacao = '';
				if ($vn_i > 1) {
					$html_paginacao .= caNavLink($this->request, "", 'nextNav botao icon inicio', '*', '*', '*', array('set_id' => $vn_set_id, 's' => 0));
				}
				if ($vn_i > 10) {
					$html_paginacao .= caNavLink($this->request, "", 'nextNav botao icon anterior', '*', '*', '*', array('set_id' => $vn_set_id, 's' => ($itens_por_pagina * ($vn_i - 1)) - $itens_por_pagina));
				}
				$html_paginacao .= '<ul class="paginas-ul" >';
				while ($vn_i <= $vn_f) {
					$html_paginacao .= "<li " . ($offset == (($itens_por_pagina * $vn_i) - $itens_por_pagina) ? 'class="selecionado"' : "") . ">" . caNavLink($this->request, $vn_i, 'nextNav', '*', '*', '*', array('set_id' => $vn_set_id, 's' => ($itens_por_pagina * $vn_i) - $itens_por_pagina)) . "</li>";
					$vn_i++;
				}
				$html_paginacao .= "</ul>";
				if ($vn_f < $paginas_totais) {
					$html_paginacao .= caNavLink($this->request, "", 'nextNav botao icon proximo', '*', '*', '*', array('set_id' => $vn_set_id, 's' => ($itens_por_pagina * ($vn_i)) - $itens_por_pagina));
				}
				if ($vn_f < $paginas_totais) {
					$html_paginacao .= caNavLink($this->request, "", 'nextNav botao icon final', '*', '*', '*', array('set_id' => $vn_set_id, 's' => ($itens_por_pagina * $paginas_totais) - $itens_por_pagina));
				}
				print $html_paginacao;

				?>
			</div>

			<?php if ($paginas_totais > 1) { ?>
				<div class="jumper">
					<?= _t("Jump to page") ?>
					<input />
				</div>
			<?php } else { ?>
				<script>
					$(".paginas").remove();
				</script>
			<?php } ?>
		</div>
	</div>
</div>

<script>
	$(".jumper input").keypress(function($e) {
		if ($e.which == 13 && $(this).val().trim() != "" && !isNaN($(this).val()) && Number($(this).val()) <= <?= $paginas_totais ?> && Number($(this).val()) > 0) {
			var offset = <?= $itens_por_pagina ?> * ($(this).val() - 1);
			window.location.href = "<?php echo $this->request->getBaseUrlPath(); ?>/index.php/Gallery/getSetInfo/set_id/<?= $vn_set_id ?>/s/" + offset;
		}
	});
</script>

<div class="sec-footer">
	<ul class="sec-footer-social-list <?= $this->request->getAction(); ?>">
		<li>
			<?= _t("Share") ?>
		</li>
		<li>
			<a href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href),'facebook-share-dialog','width=626,height=436');return false;"><img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/facebook.svg" alt="logo facebook" /></a>
		</li>
		<li>
			<a href="#" onclick="window.open('https://twitter.com/intent/tweet?original_referer=' + encodeURIComponent(location.href) + '&amp;tw_p=tweetbutton&amp;url=' + encodeURIComponent(location.href),'twitter-share-dialog','width=626,height=436');return false;"><img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/x-twitter.svg" alt="logo twitter" /></a>
		</li>
		<li>
			<a href="#"><img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/whatsapp.svg" alt="logo whatsapp" /></a>
		</li>
	</ul>
</div>
