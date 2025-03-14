<?php
    $vn_set_id = $this->getVar("set_id");
    $va_set_items = $this->getVar("set_items");

    $vn_numero_itens = count($va_set_items);
?>


<div class="sec-header">
    <span>
        Home / <b><?= _t("Biennials") ?></b>
    </span>

    <hr />

    <div>
        <h1><?=_t("Biennials")?></h1>
    </div>

    <div>
        <span><b><?= $vn_numero_itens . ($vn_numero_itens != 1 ? " " . _t("Events") . " " : " " . _t("Evet") . " ") ?></b> <?= _t("available") ?></span>
    </div>
</div>

<ul class="sec-list collection-list">
    <?php foreach ($va_set_items as $va_set_item) : ?>
        <li class="sec-list-item">
            <div class="sec-li-info-div">
                <h2><?= $va_set_item["set_item_label"] ?></h2>
                <div>
                    <span><?= _t("Event") ?></span>
                    <a href="<?= $this->request->getBaseUrlPath() . '/index.php/Detail/evento/' . $va_set_item["row_id"] ?>">Explore</a>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
</ul>

<div class="sec-footer">
    <ul class="sec-footer-social-list">
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