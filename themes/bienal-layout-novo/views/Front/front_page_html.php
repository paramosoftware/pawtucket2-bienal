<?php
$collections = $this->getVar('collections');
$bienal_editions = $this->getVar('bienal_editions');
$sets = $this->getVar('sets');
$highlight_sets = $this->getVar('highlight_sets');
?>

<section id="home-sec1">
	<div id="home-sec1-content">
		<h1>
			<?= _t("Consult information about the document archive and the São Paulo Biennials.") ?>
		</h1>
		<ul id="home-sec1-main-list">
			<li id="li_documents">
				<h2><?= _t("Documents") ?></h2>
				<hr />
				<h3><?= $this->getVar('document_count') . " " . _t("Documents") ?></h3>
				<hr />
				<p>
					<?= _t("Records of sets or documentary items, organized in funds or collections") ?>
				</p>
				<a href="<?= $this->request->getBaseUrlPath() ?>/index.php/Browse/documentos"><?= _t("Explore") ?></a>
			</li>
			<li id="li_artworks">
				<h2><?= _t("Artworks") ?></h2>
				<hr />
				<h3><?= $this->getVar('artwork_count') . " " . _t("Artworks") ?></h3>
				<hr />
				<p><?= _t("Information about the artworks and their participation in the Biennials") ?></p>
				<a href="<?= $this->request->getBaseUrlPath() ?>/index.php/Browse/obras"><?= _t("Explore") ?></a>
			</li>
			<li id="li_entities">
				<h2><?= _t("Entities") ?></h2>
				<hr />
				<h3><?= $this->getVar('entity_count') . " " . _t("Entities") ?></h3>
				<hr />
				<p>
					<?= _t("Data about people and institutions, their relationships with documentation or registered events") ?>
				</p>
				<a href="<?= $this->request->getBaseUrlPath() ?>/index.php/Browse/entidades"><?= _t("Explore") ?></a>
			</li>
			<li id="li_events">
				<h2><?= _t("Events") ?></h2>
				<hr />
				<h3><?= $this->getVar('event_count') . " " . _t("Events") ?></h3>
				<hr />
				<p>
					<?= _t("Information about events held by the Bienal Foundation and others related to documentation") ?>
				</p>
				<a href="<?= $this->request->getBaseUrlPath() ?>/index.php/Browse/eventos"><?= _t("Explore") ?></a>
			</li>
		</ul>

		<hr />
		<ul id="home-sec1-main-list-tracker">
			<li onclick="jumpToListItemById('li_documents');"></li>
			<li onclick="jumpToListItemById('li_artworks');"></li>
			<li onclick="jumpToListItemById('li_entities');"></li>
			<li onclick="jumpToListItemById('li_events');"></li>
		</ul>

		<div id="home-sec1-footer">
			<h1>
				<?= _t("Select a Biennal by edition"); ?>.
			</h1>

			<div id="home-select-div" class="select-div">
				<button id="home-select-btn" class="select-btn" popovertarget="select-popover">
					<img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/down-chevron.svg" /><?= _t("Editions") ?>
				</button>

				<div popover class="select-popover" id="select-popover">
					<ul>
						<?php foreach ($bienal_editions as $event_id => $bienal_edition) : ?>
							<li>
								<?= caDetailLink($this->request, $bienal_edition, '', 'ca_occurrences', $event_id); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="sec-bg-color">
	<div class="sec-content">
		<div class="home-sec-header">
			<h1><?= _t("Featured") ?></h1>
			<div class="home-gallery-hr-row">
				<hr />
				<!-- <?= caNavLink($this->request, _t("Acessar Galerias"), "", "", "Gallery", "Index") ?> -->
			</div>
		</div>

		<ul class="sec-list gallery-list">
			<?php foreach ($highlight_sets as $set_id => $set) : ?>
				<li class="sec-list-item">
					<?php if (!empty($set["cover_image"])) : ?>
						<figure class="sec-img-div">
							<a href="<?= caNavUrl($this->request, '', 'Gallery', 'getSetInfo', array('set_id' => $set_id)) ?>">
								<?= $set["cover_image"] ?>
							</a>
							<figcaption>Lorem ipsum dolor sit amet consectetur adipisicing elit.</figcaption>
						</figure>
					<?php endif; ?>

					<div class="sec-li-info-div">
						<a href="<?= caNavUrl($this->request, '', 'Gallery', 'getSetInfo', array('set_id' => $set_id)) ?>">
							<h2><?= $set["name"] ?></h2>
						</a>
						<p>
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia saepe facere iusto reprehenderit nihil. Blanditiis illum amet quaerat est, expedita, nisi aliquid quod tempora corrupti totam, vitae porro voluptatum eius.
							<?php # echo $set["description"] 
							?>
						</p>
						<div>
							<span><?= $set["item_count"] . " " . _t("Items") ?></span>
							<a href="<?= caNavUrl($this->request, '', 'Gallery', 'getSetInfo', array('set_id' => $set_id)) ?>"><?= _t("Explore") ?></a>
						</div>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<section class="sec-bg-color">
	<div class="sec-content">
		<div class="home-sec-header">
			<h1><?= _t("Galleries") ?></h1>
			<!-- <hr /> -->
			<div class="home-gallery-hr-row">
				<hr /><?= caNavLink($this->request, _t("Access Galleries"), "", "", "Gallery", "Index") ?>
			</div>
		</div>

		<ul class="sec-list gallery-list">
			<?php foreach ($sets as $set_id => $set) : ?>
				<li class="sec-list-item">
					<?php if (!empty($set["cover_image"])) : ?>
						<figure class="sec-img-div">
							<a href="<?= caNavUrl($this->request, '', 'Gallery', 'getSetInfo', array('set_id' => $set_id)) ?>">
								<?= $set["cover_image"] ?>
							</a>
							<figcaption><?= $set["cover_image_caption"] ?></figcaption>
						</figure>
					<?php endif; ?>

					<div class="sec-li-info-div">
						<a href="<?= caNavUrl($this->request, '', 'Gallery', 'getSetInfo', array('set_id' => $set_id)) ?>">
							<h2><?= $set["name"] ?></h2>
						</a>
						<p>
							<!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia saepe facere iusto reprehenderit nihil. Blanditiis illum amet quaerat est, expedita, nisi aliquid quod tempora corrupti totam, vitae porro voluptatum eius. -->
							<?= $set["caption"] ?>
						</p>
						<div>
							<span><?= $set["item_count"] . " " . _t("Items") ?></span>
							<a href="<?= caNavUrl($this->request, '', 'Gallery', 'getSetInfo', array('set_id' => $set_id)) ?>"><?= _t("Explore") ?></a>
						</div>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<!-- <section class="sec-bg-color">
	<div class="sec-content">
		<div class="home-sec-header">
			<h1><?php # echo _t("Funds and Collections") 
				?></h1>
			<hr />
		</div>

		<ul class="sec-list collection-list">
			<?php # foreach ($collections as $collecton) : 
			?>
				<li class="sec-list-item">
					<div class="sec-li-info-div">
						<h2><?php # echo $collecton["name"] 
							?></h2>

						<div>
							<span><?php # echo ($collecton["type_id"] == 23) ? _t("Fond") : _t("Collection") 
									?></span>
							<a href="<?php # echo $this->request->getBaseUrlPath() 
										?>/index.php/Detail/documento/<?php # echo $collecton["object_id"] 
																		?>"><?php # echo _t("Explore") 
																			?></a>
						</div>
					</div>
				</li>
			<?php # endforeach; 
			?>
		</ul>
	</div>
</section> -->