<?php
	$collections = $this->getVar('collections');
?>

<section id="home-sec1">
	<div id="home-sec1-content">
		<h1>
			<?= _t("Consult information about the document archive and the São Paulo Biennials.") ?>
		</h1>
		<ul id="home-sec1-main-list">
			<li>
				<h2><?= _t("Documents") ?></h2>
				<hr />
				<h3><?= $this->getVar('document_count')." "._t("Documents") ?></h3>
				<hr />
				<p>
					<?= _t("Records of sets or documentary items, organized in funds or collections") ?>
				</p>
				<a href="<?= $this->request->getBaseUrlPath() ?>/index.php/Browse/documentos"><?= _t("Explore") ?></a>
			</li>
			<li>
				<h2><?= _t("Artworks") ?></h2>
				<hr />
				<h3><?= $this->getVar('artwork_count')." "._t("Artworks") ?></h3>
				<hr />
				<p><?= _t("Information about the artworks and their participation in the Biennials") ?></p>
				<a href="<?= $this->request->getBaseUrlPath() ?>/index.php/Browse/obras"><?= _t("Explore") ?></a>
			</li>
			<li>
				<h2><?= _t("Entities") ?></h2>
				<hr />
				<h3><?= $this->getVar('entity_count')." "._t("Entities") ?></h3>
				<hr />
				<p>
					<?= _t("Data about people and institutions, their relationships with documentation or registered events") ?>
				</p>
				<a href="<?= $this->request->getBaseUrlPath() ?>/index.php/Browse/entidades"><?= _t("Explore") ?></a>
			</li>
			<li>
				<h2><?= _t("Events") ?></h2>
				<hr />
				<h3><?= $this->getVar('event_count')." "._t("Events") ?></h3>
				<hr />
				<p>
					<?= _t("Information about events held by the Bienal Foundation and others related to documentation") ?>
				</p>
				<a href="<?= $this->request->getBaseUrlPath() ?>/index.php/Browse/eventos"><?= _t("Explore") ?></a>
			</li>
		</ul>
		<hr />
          <div id="home-sec1-footer">
            <h1>
              <?= _t("Selecione a edição para consultar as informações referentes a cada Bienal."); ?>
            </h1>
            <div id="home-select-div" class="select-div">
              <button id="home-select-btn" class="select-btn" popovertarget="select-popover">
                <img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/down-chevron.svg" /><?= _t("Selecione um Relatório") ?>
              </button>
              <div popover id="select-popover">
                <ul>
                  <li><a href="#">Opção 1</a></li>
                  <li><a href="#">Opção dois</a></li>
                </ul>
              </div>
            </div>
          </div>
	</div>
</section>

<section class="sec-bg-color">
	<div class="sec-content">
		<div class="home-sec-header">
			<h1><?= _t("Destaques") ?></h1>
			<hr />
		</div>
		<ul class="sec-list">
			<li class="sec-list-item">
				<div class="sec-img-div">
					<img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/img/bienal-book.png" />
				</div>
				<div class="sec-li-info-div">
					<h2>Bienal de Arquitetura de São Paulo</h2>
					<div>
						<span>509 <?=_t("Items")?></span>
						<a href="#"><?= _t("Explore") ?></a>
					</div>
				</div>
			</li>
			<li class="sec-list-item">
				<div class="sec-img-div">
					<img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/img/bienal-book.png" />
				</div>
				<div class="sec-li-info-div">
					<h2>CATÁLOGOS DA BIENAL (1ª ATÉ 25ª)</h2>
					<div>
						<span>509 <?=_t("Items")?></span>
						<a href="#"><?= _t("Explore") ?></a>
					</div>
				</div>
			</li>
			<li class="sec-list-item">
				<div class="sec-img-div">
					<img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/img/bienal-header.png" />
				</div>
				<div class="sec-li-info-div">
					<h2>Bienal de Arquitetura de São Paulo</h2>
					<div>
						<span>509 <?=_t("Items")?></span>
						<a href="#"><?= _t("Explore") ?></a>
					</div>
				</div>
			</li>
			<li class="sec-list-item">
				<div class="sec-img-div">
					<img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/img/bienal-header.png" />
				</div>
				<div class="sec-li-info-div">
					<h2>FUNDO FRANCISCO MATARAZZO SOBRINHO</h2>
					<div>
						<span>509 <?=_t("Items")?></span>
						<a href="#"><?= _t("Explore") ?></a>
					</div>
				</div>
			</li>
		</ul>
	</div>
</section>

<section class="sec-bg-color">
	<div class="sec-content">
		<div class="home-sec-header">
			<h1><?=_t("Funds and Collections")?></h1>
			<hr />
		</div>
		<ul class="sec-list collection-list">
			<?php foreach ($collections as $collecton) : ?>
				<li class="sec-list-item">
					<div class="sec-li-info-div">
						<h2><?= $collecton["name"] ?></h2>
						<div>
							<span><?= ($collecton["type_id"] == 23) ? "Fundo" : "Coleção" ?></span>
							<a href="<?= $this->request->getBaseUrlPath() ?>/index.php/Detail/documento/<?= $collecton["object_id"] ?>"><?= _t("Explore") ?></a>
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
			<h1><?=_t("Galleries")?></h1>
			<hr />
		</div>
		<ul class="sec-list gallery-list">
			<li class="sec-list-item">
				<div class="sec-img-div">
					<img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/img/bienal-book.png" />
				</div>
				<div class="sec-li-info-div">
					<h2>Bienal de Arquitetura de São Paulo</h2>
					<div>
						<span>509 <?=_t("Items")?></span>
						<a href="#"><?= _t("Explore") ?></a>
					</div>
				</div>
			</li>
			<li class="sec-list-item">
				<div class="sec-img-div">
					<img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/img/bienal-book.png" />
				</div>
				<div class="sec-li-info-div">
					<h2>Catálagos da Bienal (1ª até 25ª)</h2>
					<div>
						<span>509 <?=_t("Items")?></span>
						<a href="#"><?= _t("Explore") ?></a>
					</div>
				</div>
			</li>
			<li class="sec-list-item">
				<div class="sec-img-div">
					<img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/img/bienal-header.png" />
				</div>
				<div class="sec-li-info-div">
					<h2>Bienal de Arquitetura de São Paulo</h2>
					<div>
						<span>509 <?=_t("Items")?></span>
						<a href="#"><?= _t("Explore") ?></a>
					</div>
				</div>
			</li>
			<li class="sec-list-item">
				<div class="sec-li-info-div">
					<h2>FUNDO FRANCISCO MATARAZZO SOBRINHO</h2>
					<div>
						<span>509 <?=_t("Items")?></span>
						<a href="#"><?= _t("Explore") ?></a>
					</div>
				</div>
			</li>
		</ul>
	</div>
</section>