<?php
$va_sets = $this->getVar("sets");
$va_first_items_from_set = $this->getVar("first_items_from_sets");

if (is_array($va_sets) && sizeof($va_sets)) { ?>

	<section class="sec-bg-color">
		<div class="sec-content">
			<div class="sec-header">
				<span>Home / <b><?=_t("Galleries")?></b></span>
				<hr />
				<div>
					<h1><?=_t("Galleries")?></h1>
				</div>
				<div>
					<span><b><?=count($va_sets) . " "._t("Galleries")?></b> <?=_t("available")?></span>
					<button>
						<img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/filter-descending.svg" />
					</button>
				</div>
			</div>

			<ul class="sec-list gallery-list">
			<?php foreach($va_sets as $vn_set_id => $va_set) { ?>
				<li class="sec-list-item">
					<!-- <div class="sec-img-div">
						<img src="<?php 
						// echo $this->request->getBaseUrlPath()
						?>/themes/bienal-layout-novo/assets/svg/bienal-book.png" />
					</div> -->
					<div class="sec-li-info-div">
						<h2><?=$va_set["name"]?></h2>
						<div>
							<span><?=$va_set["item_count"]." "._t("Items")?></span>
							<a href="<?= caNavUrl($this->request, '', 'Gallery', 'getSetInfo', array('set_id' => $vn_set_id))?>"><?=_t("Explore")?></a>
						</div>
					</div>
				</li>
				<?php } # CLOSE FOREACH ?>
			</ul>

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
	</section>


<?php
}
?>