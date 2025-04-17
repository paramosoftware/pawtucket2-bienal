<?php
$va_sets = $this->getVar("sets");
$va_first_items_from_set = $this->getVar("first_items_from_sets");
$acao = $this->request->getAction();

$breadcumb = _t("Galleries");
if(strtolower($acao) == 'featured') {
	$breadcumb = _t("Featured Items");
}

if (is_array($va_sets) && sizeof($va_sets)) { ?>

	<section class="sec-bg-color">
		<div class="sec-content gallery-index">
			<div class="sec-header">
				<span>Home / <b><?= $breadcumb ?></b></span>
				<hr />
				<div>
					<h1><?= $breadcumb ?></h1>
				</div>
				<div>
					<span><b><?= count($va_sets) . " " . $breadcumb ?></b> <?= _t("available") ?></span>
					<button>
						<img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/filter-descending.svg" />
					</button>
				</div>
			</div>

			<ul class="sec-list gallery-list">
				<?php foreach ($va_sets as $vn_set_id => $va_set) { ?>
					<li class="sec-list-item">
						<?php if (!empty($va_set["cover_image"])) : ?>
							<figure class="sec-img-div">
								<a href="<?= caNavUrl($this->request, '', 'Gallery', 'getSetInfo', array('set_id' => $vn_set_id)) ?>">
									<?= $va_set["cover_image"] ?>
								</a>
								<figcaption><?= $va_set["cover_image_caption"] ?></figcaption>
							</figure>
						<?php endif; ?>

						<div class="sec-li-info-div">
							<a href="<?= caNavUrl($this->request, '', 'Gallery', 'getSetInfo', array('set_id' => $vn_set_id)) ?>">
								<h2><?= $va_set["name"] ?></h2>
							</a>

							<p><?= $va_set["caption"] ?></p>

							<div>
								<span><?= $va_set["item_count"] . " " . _t("Items") ?></span>
								<a href="<?= caNavUrl($this->request, '', 'Gallery', 'getSetInfo', array('set_id' => $vn_set_id)) ?>"><?= _t("Explore") ?></a>
							</div>
						</div>
					</li>
				<?php } # CLOSE FOREACH 
				?>
			</ul>

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
		</div>
	</section>


<?php
}
?>